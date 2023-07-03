/*
* Scripts for handling Liviwire events on client
* Run npm run dev or npm run prod to compile
*/

const { start } = require('alpinejs');
require('./bootstrap');
require('alpinejs');

// Fade in control buttons when answer is selected in quiz
Livewire.on('answerSelected', (id) => {
    const btns = document.getElementById('control-buttons-'+id);
    if(btns.style.display != 'block')
      fadeIn( btns );
})

// For reset button - start over
Livewire.on('reset', (id, code) => {
  code = JSON.parse(code);
  editors[id].getModel().setValue(code.join("\n") );
})

// For regret answer button in quizes
Livewire.on('resetOutput', (id) => {
  const out = document.getElementById('output-'+id);
  out.innerHTML = '<span class="text-gray-400 italic">-- Programmets utskrifter --</span><br>';   
})

// For "Rätta" button - inserts random seed, possibly "add_code" and calls correctRun
var correctOutput = [];
Livewire.on('correct-click', (id, input, add_code) => {
  correctOutput = [];
  const run = document.getElementById('run-'+id);
  const stop = document.getElementById('stop-'+id);
  const editor = editors[id];
  var prog = editor.getValue();
  prog = "import random\nrandom.seed(42)\n" + prog;
  prog = prog + '\n' + add_code;
  run.disabled = true;
  stop.disabled = false;
  StopExecution = false;
  
  correctRun(id, input, prog, 0, input.length-1, run, stop);
})

// runs Python code based on input in inputArray. Recursively runs through inputArray
// Emits the output as an array of array of output lines. 
function correctRun(currId, inputArray, prog, instance, lastInstance, run, stop) {
  outputLines = [];
  console.log('Running instance ' + instance + ' last: ' + lastInstance )
  let inputArrayIdx = -1; //-1 because adding 1 before usage
  let runSuccess = true;
  nextIsNewline = true;
  // Sk.pre = "output-"+currId;
  Sk.configure({
    __future__: Sk.python3,
    inputfun: () => { 
      inputArrayIdx += 1;
      return inputArray[instance][inputArrayIdx];
    },  
    inputfunTakesPrompt: true,
    output:correctOutf,
    killableWhile: true,
    killableFor: true,
    read:builtinRead,
    timeoutMsg: () => 'Timeout',
    yieldLimit: 250,
  }); 

  Sk.misceval.asyncToPromise(() =>
    Sk.importMainWithBody("<stdin>", false, prog, true), {
      "*": () => {
        if (StopExecution) throw "Execution interrupted"
      }
    },
  ).catch(err => {
    runSuccess = false;
  }).finally(() => {
    console.log('runSuccess = ' + runSuccess);
    correctOutput.push( outputLines );
    if(!runSuccess || instance == lastInstance) {
      run.disabled = false;
      stop.disabled = true;

      const editor = editors[currId];
      let model = editor.getModel();
      let editorLines = [];
      for (let i = 1; i <= model.getLineCount(); i++) {
          let line = model.getLineContent(i);
          editorLines.push(line);
      }
      //this is the last (or only) run, emit output
      Livewire.emit('correct-output', currId, JSON.stringify(correctOutput), JSON.stringify(editorLines));
    }
    else {
      //re-run with next inputs
      correctRun(currId, inputArray, prog, instance+1, lastInstance, run, stop);
    }
  })
 }

function resetCode(id) {
  currId = id.substr(4);
  const run = document.getElementById(id);
  const editor = editors[currId];
}

// ** FADE OUT FUNCTION ** //Not used at the moment
function fadeOut(el) {
    el.style.opacity = 1;
    (function fade() {
        if ((el.style.opacity -= .1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
};

// ** FADE IN FUNCTION **
function fadeIn(el, display) {
    el.style.opacity = 0;
    el.style.display = display || "block";
    (function fade() {
        var val = parseFloat(el.style.opacity);
        if (!((val += .02) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
};

//Add event listeners for buttons
document.addEventListener("DOMContentLoaded", function(){
    const runButtons = document.getElementsByClassName("run-button");
    const stopButtons = document.getElementsByClassName("stop-button");
    Array.from(runButtons).forEach(element => {
        document.getElementById(element.id).addEventListener("click", () => { runit(element.id) });
    });
    Array.from(stopButtons).forEach(element => {
        document.getElementById(element.id).addEventListener("click", () => { stopit(); });
    });
})

var StopExecution = false;
var currId;
var outputLines;
var nextIsNewline;

function correctOutf(text) {
    let lines = text.split('\n');
    let startAtNewLine = nextIsNewline;
    if(lines.length > 1 && lines[lines.length-1] == '') { //remove last line if empty
      lines.pop();
      nextIsNewline = true;
    }
    else {
      nextIsNewline = false;
    }
    if(startAtNewLine) {
      outputLines = outputLines.concat(lines);
    }
    else
      outputLines[outputLines.length - 1] += lines[0];
}

function outf(text) { 
    var mypre = document.getElementById("output-"+currId);
    text = text.replace("<","&lt;").replace(">","&gt;"); 
    mypre.innerHTML = mypre.innerHTML + text;
    let lines = text.split('\n');
    let startAtNewLine = nextIsNewline;
    if(lines.length > 1 && lines[lines.length-1] == '') { //remove last line if empty
      lines.pop();
      nextIsNewline = true;
    }
    else {
      nextIsNewline = false;
    }
    if(startAtNewLine) {
      outputLines = outputLines.concat(lines);
    }
    else
      outputLines[outputLines.length - 1] += lines[0];
}

function stopit() {
  StopExecution = true;
}

function builtinRead(x) {
    if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
            throw "File not found: '" + x + "'";
    return Sk.builtinFiles["files"][x];
}

//Run Python code and Livewire emit the output
// using outf as output function to print result to user
function runit(runId) {
  outputLines = [];
  nextIsNewline = true;
  currId = runId.substr(4);
  const run = document.getElementById(runId);
  const stop = document.getElementById('stop-'+currId);
  const editor = editors[currId];
  let runSuccess = true;
  run.disabled = true;
  stop.disabled = false;
  StopExecution = false;
  var prog = editor.getValue();
  var mypre = document.getElementById("output-"+currId); 
  mypre.innerHTML = '<span class="text-gray-400 italic">-- Programmets utskrifter --</span><br>'; 
  Sk.pre = "output-"+currId;
  Sk.canvas = "canvas-"+currId;
  (Sk.TurtleGraphics || (Sk.TurtleGraphics = {})).target = "canvas-"+currId;
  Sk.configure({
    __future__: Sk.python3,
    // debugging: true, //time counts on input prompt
    // debugout: outf,
    // execLimit: 2000,
    inputfun: function (args) {
      return new Promise((resolve, reject) => {
        setTimeout(function() {
          resolve(window.prompt(args))
        }, 250)
      })
    },  
    inputfunTakesPrompt: true,
    // nonreadopen: true,
    output:outf,
    killableWhile: true,
    killableFor: true,
    read:builtinRead,
    timeoutMsg: () => 'Timeout',
    yieldLimit: 250,
  }); 

  Sk.misceval.asyncToPromise(() =>
    Sk.importMainWithBody("<stdin>", false, prog, true), {
      // handle a suspension of the executing code
      // "*" says handle all types of suspensions
      "*": () => {
        if (StopExecution) throw "Execution interrupted"
      }
    },
  ).catch(err => {
    runSuccess = false;
    outf("\n" + err.toString());
  }).finally(() => {
    console.log('runSuccess = ' + runSuccess);
    run.disabled = false;
    stop.disabled = true;

    if(runSuccess) {
      let model = editor.getModel();
      let editorLines = [];
      for (let i = 1; i <= model.getLineCount(); i++) {
          let line = model.getLineContent(i);
          editorLines.push(line);
      }
      Livewire.emit('output', currId, JSON.stringify(editorLines), JSON.stringify(outputLines) );
    }
  })
 } 