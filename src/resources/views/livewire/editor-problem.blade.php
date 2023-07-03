<div class="mb-4 {{ $solved ? 'bg-green-100' : 'bg-red-100' }} p-8">
    <div class="pb-4">
        @guest
        <p class="pb-2"><span class="italic"><a class="hover:text-gray-700 underline" href="/login">Logga in</a> eller <a class="hover:text-gray-700 underline" href="/register">skapa konto</a> för att spara dina framsteg och din kod.</span></p>
        @endguest
        <h2 wire:ignore class="text-2xl">{{ $title }}</h2>
        <p wire:ignore id="control-text-{{$editorId}}" class="text-lg pt-2">{!! $text !!}</p>
        

    </div>
    <div wire:ignore id="monaco_editor-{{$editorId}}" class="bg-white py-4 overflow-hidden"></div>
    <div id="control-buttons-{{$editorId}}">
        <button type="button" id="run-{{$editorId}}" class="run-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Kör</button>
        @if($useDoneButton && !$solved)
        <button wire:click="markDone" type="button" id="done-{{$editorId}}" class="done-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Klarmarkera</button>
        @elseif($useDoneButton && $solved)
        <button wire:click="unMarkDone" type="button" id="done-{{$editorId}}" class="done-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Ta bort klarmarkering</button>
        @else
        <button wire:click="correctClick" type="button" id="correct-{{$editorId}}" class="correct-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Rätta</button>
        @endif
        <button type="button" id="stop-{{$editorId}}" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Stopp</button>
        @if($showReset)
        <button wire:click="resetCode" type="button" id="reset-{{$editorId}}" class="reset-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Återställ</button>
        @endif
        @if($help_requested)
            <span class="pl-3">Hjälp begärd. (<a wire:click="abortHelp" class="text-green-500 hover:underline" href="javascript:void(0);">avbryt</a>)</span>
        @elseif($help_button)
            <button wire:click="help" type="button" id="help-{{$editorId}}" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Begär hjälp</button>
        @endif
    </div>
    <pre wire:ignore id="output-{{$editorId}}" class="bg-gray-600 p-4 pl-8 text-white text-lg overflow-y-auto" style="max-height: 50rem;"><span class="text-gray-400 italic">-- Programmets utskrifter --</span></pre> 
    @if(!$useDoneButton)
    <div class="pt-8">
        @if($solved)
            <p class="text-lg">&#9989; {!! $correct_text !!}</p>
        @elseif($solved === false)
            <p class="text-lg">❌ {!! $wrong_text !!}</p>
        @endif
    </div>
    @endif
    @auth
    <div @if($help_requested) wire:poll.visible.5000ms="updateFeedback" @endif>
        @if($feedback && $feedback->feedback && $feedback->view)
        <p><b>Kommentar</b> (<a wire:click="hideFeedback" class="text-green-500 hover:underline" href="javascript:void(0);">dölj</a>)<br>{!! nl2br($feedback->feedback) !!}</p>
        @endif
    </div>
    @endauth

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
    @if($saveTextToDatabase)
        var problemText = document.getElementById('problem-text').innerHTML;
        Livewire.emit('problemText', problemText);
    @endif    

    Livewire.on('help-request', () => {
        let model = editors['{{$editorId}}'].getModel();
        let editorLines = [];
        for (let i = 1; i <= model.getLineCount(); i++) {
            let line = model.getLineContent(i);
            editorLines.push(line);
        }
        Livewire.emit('help-request-save-code', '{{$editorId}}', JSON.stringify(editorLines) );
        console.log('Hjälp begärd.');
        
    });

    
});
    
</script>   

</div>
