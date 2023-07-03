<div class="my-4 bg-gray-100 p-8">
    <div class="pb-4">
        <h2 wire:ignore class="text-2xl">{{ $title }}</h2>
        <p wire:ignore class="text-lg pt-2">Elev: {!! $studentName !!}</p>
        @if($is_problem)
        <span wire:ignore class="text-lg pt-2">{!! $text !!}</span>
        @else
        <p wire:ignore class="text-lg pt-2">{!! $text !!}</p>
        @endif
        @if($need_help)
        <p><em>Eleven vill ha hjälp!</em></p>
        @endif
        

    </div>
    <div wire:ignore id="monaco_editor-{{$editorId}}" class="bg-white py-4 overflow-hidden"></div>
    <div id="control-buttons-{{$editorId}}">
        <button type="button" id="run-{{$editorId}}" class="run-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Kör</button>
        <button type="button" id="stop-{{$editorId}}" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Stopp</button>
        @if($showReset)
        <button wire:click="resetCode" type="button" id="reset-{{$editorId}}" class="reset-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Återställ</button>
        @endif

    </div>
    
    @if($use_canvas)
    <div class="w-full">
        <div wire:ignore id="canvas-{{$editorId}}" class="bg-white border">
            <canvas class="border w-full h-full bg-white">
        </div>
    </div>
    <div class="">
        <pre wire:ignore id="output-{{$editorId}}" class="bg-gray-600 p-4 pl-8 text-white text-lg overflow-y-auto"><span class="text-gray-400 italic">-- Programmets utskrifter --</span></pre>
    </div>
    @else
    <pre wire:ignore id="output-{{$editorId}}" class="bg-gray-600 p-4 pl-8 text-white text-lg overflow-y-auto" style="max-height: 50rem;"><span class="text-gray-400 italic">-- Programmets utskrifter --</span></pre> 
    @endif

    <div class="pt-8">
        @if($solved)
            <p class="text-lg">&#9989; {!! $correct_text !!}</p>
        @elseif($solved === false)
            <p class="text-lg">❌ {!! $wrong_text !!}</p>
        @endif
    </div>
    <textarea wire:model="feedback" id="feedback-text" rows="8" class="w-full border p-2 focus:border-green-500 focus:outline-none" placeholder="Skriv kommentar till eleven här..."></textarea>
    @if($saveIsDisabled)
    <button  type="button" id="save-feedback" class="border border-green-200 bg-green-100 text-white px-4 py-2 select-none focus:outline-none focus:ring">Spara kommentar</button>
    <span class="px-3">Kommentaren är sparad.</span>
    <button wire:click="editFeedback" type="button" id="edit-feedback" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Ändra</button>
    @else
    <button wire:click="saveFeedback" type="button" id="save-feedback" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Spara kommentar</button>
    @endif


<script>
document.addEventListener('livewire:load', () => {
    var h_div = document.getElementById('monaco_editor-{{$editorId}}');
    var txt = document.createElement("textarea");
    let nrLines;
    @if($code)
        txt.innerHTML = {!! $code !!}.join('\n');
        nrLines = {!! $code !!}.length;
    @endif
    @if($rows)
        nrLines = {{ $rows }}
    @endif
    let height = nrLines*20+100;
    height = Math.max(350, height);
    h_div.style.height = height+"px";

    editors['{{$editorId}}'] = monaco.editor.create(h_div, {
        value: txt.value,
        automaticLayout: true,
        language: 'python',
        fontSize: 16,
        minimap: {
            enabled: false
        },
        scrollbar: {
            vertical: "hidden",
            handleMouseWheel: false,
        }
    });
    
});
    
</script>
</div>
