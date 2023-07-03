<div class="h-full lg:flex">
    <div class="overflow-hidden lg:w-1/2">
        <div class="mb-3 flex flex-row">
            <button type="button" id="new-code-button" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50 mr-2">Ny</button>    
            @auth
            <button type="button" id="open-code-button" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50 mr-2">Öppna</button>
            @endauth
            <button type="button" id="save-code-button" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50 mr-2">Spara</button>
            @auth
            <button type="button" id="save-as-code-button" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50 mr-2">Spara som</button>
            @endauth
            <button type="button" id="reset-code-button" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50 mr-2" style="display:none;">Återställ</button>
            <span class="pl-2 align-middle m-2 text-gray-500" id="save-code-text"></span> 
            
        </div>  
        @if($projectName != '')
            <p class="ml-2"><b>Projekt</b>: {{ $projectName }}</p>
        @endif
        <div wire:ignore id="monaco_editor-{{$editorId}}" class="lg:h-auto border-l-4 border-green-400"></div>
    </div>
    <div class="lg:flex lg:flex-col lg:w-1/2">
        <div id="control-buttons-{{$editorId}}">
            <button wire:ignore type="button" id="run-{{$editorId}}" class="run-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50">Kör</button>
            <button wire:ignore type="button" id="stop-{{$editorId}}" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50" disabled>Stopp</button>
            <span style="height: 42px;" class="ml-auto p-2 pl-8"><input class="m-2 align-middle" wire:click="toggleCanvas" type="checkbox" {{ $canvas ? 'checked' : '' }}>Liten rityta</input></span>
            <span style="height: 42px;" class="ml-auto p-2 pl-8"><input class="m-2 align-middle" wire:click="toggleLargeCanvas" type="checkbox" {{ $largeCanvas ? 'checked' : '' }}>Stor rityta</input></span>
        </div>
        <div class="lg:h-full border">
            @if($canvas)
            <div class="w-full h-1/2">
                <div wire:ignore id="canvas-{{$editorId}}">
                    <canvas class="w-full h-full">
                </div>
            </div>
            <div class="h-1/2">
                <pre wire:ignore id="output-{{$editorId}}" class="bg-gray-600 p-4 pl-8 text-white text-lg overflow-y-auto"><span class="text-gray-400 italic">-- Programmets utskrifter --</span></pre>
            </div>
            @else
            <div class="h-full">
                <pre wire:ignore id="output-{{$editorId}}" class="h-full bg-gray-600 p-4 pl-8 text-white text-lg overflow-y-auto"><span class="text-gray-400 italic">-- Programmets utskrifter --</span></pre>
            </div>
            @endif
        </div>
    </div>

<script>
let codeHasChanged = false;
let lastChangeMs = null;
let projectName = '{{ $projectName }}';
document.addEventListener('livewire:load', () => {
    var h_div = document.getElementById('monaco_editor-{{$editorId}}');
    
    var txt = document.createElement("textarea");
    @if($code)
    txt.innerHTML = {!! $code !!}.join('\n');
    @else
    txt.innerHTML = "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
    if (typeof(Storage) !== "undefined") {
        let savedCode = localStorage.getItem('free-code');
        if(savedCode) {
            txt.innerHTML = JSON.parse(savedCode).join('\n');
        }
    }
    @endif
    
    if(window.innerWidth < 1024) {
        h_div.style.minHeight = "45vh";    
    }
    else
        h_div.style.minHeight = "90vh";

    editors['{{$editorId}}'] = monaco.editor.create(h_div, {
        value: txt.value,
        automaticLayout: true,
        language: 'python',
        fontSize: 16,
        minimap: {
            enabled: false
        },
        scrollbar: {
            // vertical: "hidden",
            // handleMouseWheel: false,
        }
    });

    //check for missing click drawing area
    const runBtn = document.getElementById('run-{{$editorId}}');
    runBtn.addEventListener("click", checkCanvasError);

    editors['{{$editorId}}'].focus();
    editors['{{$editorId}}'].getModel().onDidChangeContent( () => { 
        codeHasChanged = true;
        lastChangeMs = Date.now();
    });
    setInterval( () => {
        if(lastChangeMs != null && Date.now() - lastChangeMs > 5000) {
            lastChangeMs = null;
            if (typeof(Storage) !== "undefined") {
                let model = editors['{{$editorId}}'].getModel();
                let editorLines = [];
                for (let i = 1; i <= model.getLineCount(); i++) {
                    let line = model.getLineContent(i);
                    editorLines.push(line);
                }
                console.log('Saving backup to localStorage.');
                localStorage.setItem('free-code-backup', JSON.stringify(editorLines));
                document.getElementById('reset-code-button').style.display = 'none';
            }
        }
    }, 1000)
    if(typeof(Storage) !== "undefined" && "free-code-backup" in localStorage) {
        document.getElementById('reset-code-button').style.display = 'block';
        document.getElementById("reset-code-button").addEventListener("click", resetCode);

    }
    if(window.innerWidth >= 1024) {
        const outputEl = document.getElementById('output-{{$editorId}}');
        outputEl.style.maxHeight = String(outputEl.offsetHeight) + "px";
    }
});

document.getElementById("save-code-button").addEventListener("click", saveCode);
document.getElementById("new-code-button").addEventListener("click", newCode);
@auth
document.getElementById("open-code-button").addEventListener("click", openCode);
document.getElementById("save-as-code-button").addEventListener("click", saveAsCode);
@endauth

function newCode() {
    if(codeHasChanged) {
        let ans = confirm('Är du säker? Koden har ändrats sedan du sparade senast.');
        if(!ans) return;
    }
    editors['{{$editorId}}'].setValue('\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n');
    codeHasChanged = false;
    projectName = '';
    Livewire.emit('new-code-event');
}

function openCode() {
    const body = document.querySelector('body')
    const modal = document.querySelector('.dialog-modal')        
    if(modal) {
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('dialog-modal-active')
    }
    document.getElementById('dialog-modal-title').innerHTML = 'Öppna projekt...';
    document.getElementById('dialog-modal-content').innerHTML = `
        <label for="project-name" class="block mb-2 font-medium text-gray-900 dark:text-white">Välj ett projekt</label>
        <select id="open-select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></select>
        `;        
    Livewire.emit('get-projects');
}

function doOpen() {
    const selected = document.getElementById('open-select').value;
    Livewire.emit('open-project', selected);
    toggleDialogModal();
}

function saveCode() {
    if(projectName == '') {
        saveAsCode();
        return;
    }
    let model = editors['{{$editorId}}'].getModel();
    let editorLines = [];
    for (let i = 1; i <= model.getLineCount(); i++) {
        let line = model.getLineContent(i);
        editorLines.push(line);
    }
    @if($user_logged_in)
    Livewire.emit('save-code-event', JSON.stringify(editorLines), projectName, true );
    @else
    if (typeof(Storage) !== "undefined") {
        localStorage.setItem('free-code', JSON.stringify(editorLines));
        document.getElementById('save-code-text').innerHTML = 'Koden är sparad i webbläsaren.';
        codeHasChanged = false;
        setTimeout(() => {
            document.getElementById('save-code-text').innerHTML = '';
        }, 3000);
    }
    @endif
}

function saveAsCode() {
    const body = document.querySelector('body')
    const modal = document.querySelector('.dialog-modal')        
    if(modal) {
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('dialog-modal-active')
    }
    document.getElementById('dialog-modal-title').innerHTML = 'Spara som...';
    document.getElementById('dialog-modal-content').innerHTML = `
        <p>Skriv ett namn på ditt projekt för att spara.</p>
        <label for="project-name" class="block mb-2 font-medium text-gray-900 dark:text-white">Namn</label>
        <input type="text" id="project-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        `;
    document.getElementById('dialog-modal-button').innerHTML = '<button onclick="doSave();" type="button" class="dialog-modal-close border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Spara</button>';

    
}

function doSave() {
    let name = document.getElementById('project-name').value;
    if(name == '') {
        alert('Skriv in ett namn.')
        return;
    }
    let model = editors['{{$editorId}}'].getModel();
    let editorLines = [];
    for (let i = 1; i <= model.getLineCount(); i++) {
        let line = model.getLineContent(i);
        editorLines.push(line);
    }
    Livewire.emit('save-code-event', JSON.stringify(editorLines), name, false );
    toggleDialogModal();
    projectName = name;
}

function resetCode() {
    let savedCode = localStorage.getItem('free-code-backup');
    if(savedCode) {
        editors['{{$editorId}}'].setValue( JSON.parse(savedCode).join('\n') );
    }

}

document.addEventListener("DOMContentLoaded", function(event) {
    
    Livewire.on('code-saved', () => {
        codeHasChanged = false;
        document.getElementById('save-code-text').innerHTML = 'Koden är sparad.';
        setTimeout(() => {
            document.getElementById('save-code-text').innerHTML = '';
        }, 3000);
    });

    Livewire.on('project-names', (projects) => {
        const select = document.getElementById('open-select');
        if(Object.keys(projects).length == 0) {
            alert('Det finns inga projekt sparade.')
            toggleDialogModal();
            return;
        }
        for(let id in projects) {
            let opt = document.createElement('option');
            opt.value = id;
            if(projects[id] == null)
                opt.innerHTML = 'Ej namngett';
            else
                opt.innerHTML = projects[id];
            select.add(opt);
        }
        document.getElementById('dialog-modal-button').innerHTML = '<button onclick="doOpen();" type="button" class="dialog-modal-close border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Öppna</button>';
    });

    Livewire.on('update-code', (code, name) => {
        editors['{{$editorId}}'].setValue( JSON.parse(code).join('\n') );
        projectName = name;
    });

    Livewire.on('message', (msg) => {
        alert(msg);
    });
});

function checkCanvasError() {
    setTimeout(() => {
        if( document.getElementById('output-{{$editorId}}').innerHTML.includes("ExternalError: TypeError: Cannot read properties of null (reading 'firstChild') on") )
            alert('Klicka i "Liten rityta" eller "Stor rityta" för att kunna rita med turtle.');
    }, 500);
}

</script>
@if($largeCanvas)
@include('free-code-modal')
@endif

</div>
