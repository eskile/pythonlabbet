<div class="h-full lg:flex">
    <div class="overflow-hidden lg:w-1/2">
        <div class="mb-3 flex flex-row">
           
        </div>  
        @if($projectName != '')
            <p class="ml-2"><b>Projekt</b>: {{ $projectName }} ({{ $name }})</p>
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
let projectName = '{{ $projectName }}';
document.addEventListener('livewire:load', () => {
    var h_div = document.getElementById('monaco_editor-{{$editorId}}');
    
    var txt = document.createElement("textarea");
    @if($code)
    txt.innerHTML = JSON.parse({!! $code !!}).join('\n'); //need JSON.parse due to pluck('code') in TeacherController.php
    @else
    txt.innerHTML = "# Ingen kod hittades :(";
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

    if(window.innerWidth >= 1024) {
        const outputEl = document.getElementById('output-{{$editorId}}');
        outputEl.style.maxHeight = String(outputEl.offsetHeight) + "px";
    }
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
