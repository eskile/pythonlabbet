<div class="mb-4 {{ ($solved === True) ? 'bg-green-100' : 'bg-blue-100' }} p-8">
    <div class="">
        @guest
        <p class="pb-2"><span class="italic"><a class="hover:text-gray-700 underline" href="/login">Logga in</a> eller <a class="hover:text-gray-700 underline" href="/register">skapa konto</a> för att spara dina framsteg och din kod.</span></p>
        @endguest
        <h2 class="text-2xl">Vad gör koden?</h2>
        
        <p wire:ignore id="control-text-{{$editorId}}" class="text-lg py-4 pt-2">{!! $text !!}</p>
    </div>
    <div wire:ignore id="monaco_editor-{{$editorId}}" class="bg-white py-4 overflow-hidden"></div>
    <div id="control-buttons-{{$editorId}}" class="{{ $ans == 0 ? 'hidden' : '' }}">
        <button type="button" id="run-{{$editorId}}" class="run-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50">Kör programmet</button>
        <button type="button" id="stop-{{$editorId}}" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Stopp</button>
    </div>
    <pre wire:ignore id="output-{{$editorId}}" class="bg-gray-600 p-4 pl-8 text-white text-lg overflow-y-auto" style="max-height: 50rem;"><span class="text-gray-400 italic">-- Programmets utskrifter --</span></pre> 
    
    <p class="text-lg py-2"><b>Fråga:</b> Vad kommer programmet ovan att skriva ut?</p> 
    @if($ans != 0)
        <p class="text-lg pt-2">Du svarade att programmet skriver ut</p>
        <div id="selected-answer-div" class="text-lg border p-4 bg-gray-500 text-white">{!! nl2br($options[$ans-1]) !!}</div>
        <p class="text-gray-500 text-xs cursor-pointer hover:underline pt-1" wire:click="regret">Ångra val</p>
        @if($solved === '')
        <p id="answers-run-{{$editorId}}" class="text-lg">Klicka på "Kör programmet" och se om du fick rätt.</p>
        @endif
        @if($solved === True)
            <p id="answers-result-correct-{{$editorId}}" class="text-lg">&#9989; {!! $correct_text !!}</p>
        @elseif($solved === False)
            <p id="answers-result-wrong-{{$editorId}}" class="text-lg">❌ {{$wrong_text}}</p>
            <button type="button" wire:click="regret" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Prova igen</button>
        @endif
        <script>
        //document.getElementById('contol-'+{$q_id}).style.display = 'block';
        </script>
    @else
        @foreach($options as $i => $option)
            <div id="option-{{$editorId}}-{{$i}}" class="text-lg border p-4 my-2 bg-gray-500 text-white cursor-pointer transition duration-500 hover:bg-gray-600" wire:click="select({{$loop->iteration}})">{!! nl2br($option) !!}</div>
        @endforeach
    @endif

<script>
document.addEventListener('livewire:load', () => {
    @if($solved)
    Livewire.emit('registerTask', '{{ $editorId }}', true);
    @else
    Livewire.emit('registerTask', '{{ $editorId }}', false);
    @endif
    console.log('register {{ $editorId }}');

    var h_div = document.getElementById('monaco_editor-{{$editorId}}');
    
    var txt = document.createElement("textarea");
    txt.innerHTML = "{{ $code }}";
    let nrLines = txt.value.split("\n").length;
    console.log('nrLines = ' + nrLines);
    let height = nrLines*20+50;
    h_div.style.height = height+"px";

    editors['{{$editorId}}'] = monaco.editor.create(h_div, {
        value: txt.value,
        automaticLayout: true,
        language: 'python',
        fontSize: 16,
        readOnly: true,
        minimap: {
            enabled: false
        },
        scrollbar: {
            vertical: "hidden",
            handleMouseWheel: false,
        },
        overviewRulerLanes: 0,
        hideCursorInOverviewRuler: true,
        overviewRulerBorder: false,

    });
    
});
    
</script>
</div>
