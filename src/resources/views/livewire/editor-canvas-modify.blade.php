<div class="mb-4 {{ $solved ? 'bg-green-100' : 'bg-red-100' }} p-8">
    <div class="pb-4">
            @guest
            <p class="pb-2"><span class="italic"><a class="hover:text-gray-700 underline" href="/login">Logga in</a> eller <a class="hover:text-gray-700 underline" href="/register">skapa konto</a> för att spara dina framsteg och din kod.</span></p>
            @endguest
            <h2 wire:ignore class="text-2xl">{{ $title }}</h2>
            <p wire:ignore id="control-text-{{$editorId}}" class="text-lg pt-2">{!! $text !!}</p>
    </div>
    <div class="flex flex-col lg:flex-row flex-1"  style="min-height:400px;">

        <div wire:ignore id="monaco_editor-{{$editorId}}" class="bg-white py-4 overflow-hidden flex-1 border-b lg:border-b-0 lg:border-r"  style="min-height:400px;"></div>
        <div wire:ignore id="canvas-{{$editorId}}" class="canvas flex-1 text-center bg-white py-3 relative"  style="min-height:400px;"></div>
    </div>
    <div id="control-buttons-{{$editorId}}" class="">
        <button type="button" id="run-{{$editorId}}" class="run-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Kör</button>
        <button wire:click="correctClick" type="button" id="correct-{{$editorId}}" class="correct-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">
            @if($solved)
            Markera ej klar
            @else
            Markera klar
            @endif
        </button>
        <button type="button" id="stop-{{$editorId}}" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Stopp</button>
        @if($showReset)
        <button wire:click="resetCode" type="button" id="reset-{{$editorId}}" class="reset-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Återställ</button>
        @endif
        @if($help_requested)
            <span class="pl-3">Hjälp begärd. (<a wire:click="abortHelp" class="text-green-500 hover:underline" href="javascript:void(0);">avbryt</a>)</span>
        @elseif($help_button)
            <button wire:click="help" type="button" id="help-{{$editorId}}" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Begär hjälp</button>
        @endif
        <button onclick="changeSize('{{$editorId}}');" type="button" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Förstora</button>
        @if($tip_text != '' && !$show_tip)
        <button wire:click="$set('show_tip', true)" type="button" id="tip-{{$editorId}}" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Tips</button>
        @endif
        @if(isset($show_solution) && $solution_code && request()->session()->get('show_solutions') && !$show_solution)
        <button wire:click="showSolution('{{$editorId}}')" type="button" id="show-solution-{{$editorId}}" class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Lösning</button>
        @endif
    </div>
    <pre wire:ignore id="output-{{$editorId}}" class="hidden bg-gray-600 flex-none p-4 pl-8 text-white text-lg overflow-y-auto" style="max-height: 50rem;"><span class="text-gray-400 italic">-- Programmets utskrifter --</span></pre> 
    <div class="pt-8">
        @if($show_tip)
            <p><b>Tips:</b> {!! $tip_text !!}
        @endif
        @if(isset($show_solution) && $show_solution)
        <div class="text-lg">Lösningsförslag</div>
        <div class="mb-5">
            <pre wire:ignore><code id="solution-{{$editorId}}" class="language-python">
            </code></pre>
        </div>
        @endif
        @auth
        <div @if($help_requested) wire:poll.visible.5000ms="updateFeedback" @endif>
            @if($feedback && $feedback->feedback && $feedback->view)
            <p><b>Kommentar</b> (<a wire:click="hideFeedback" class="text-green-500 hover:underline" href="javascript:void(0);">dölj</a>)<br>{!! nl2br($feedback->feedback) !!}</p>
            @endif
        </div>
        @endauth
    </div>

<script>
document.addEventListener('livewire:load', () => {
    @if($solved)
    Livewire.emit('registerTask', '{{ $editorId }}', true);
    @else
    Livewire.emit('registerTask', '{{ $editorId }}', false);
    @endif
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
        },
        overviewRulerLanes: 0,
        hideCursorInOverviewRuler: true,
        overviewRulerBorder: false,
    });
    
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

    @if($solution_code)
    Livewire.on('show-solution-{{$editorId}}', () => {
        let solutionEl = document.getElementById('solution-{{$editorId}}');
        solutionEl.innerHTML = {!! $solution_code !!}.join('\n');
        Prism.highlightElement(solutionEl);
    });
    @endif

    showDim('{{$editorId}}');


    // Observe #output-modal and show only if code prints.
    const elementToObserve = window.document.getElementById('output-{{$editorId}}');
    observer = new MutationObserver(function(mutationsList, observer) {
        const outputModal = document.getElementById('output-{{$editorId}}');
        if(outputModal.textContent != '' && outputModal.textContent != '-- Programmets utskrifter --') {
            outputModal.classList.remove('hidden');
        }
        else {
            outputModal.classList.add('hidden');
        }
    });
    observer.observe(elementToObserve, {characterData: false, childList: true, attributes: false});
    
    
});

if(!changeSize) {
    function changeSize(editorId) {
        const el = document.getElementById('monaco_editor-'+editorId);
        const style = window.getComputedStyle(el);
        const f = 1.2;
        el.style.minHeight = (parseInt(style.getPropertyValue('min-height'))*f).toString() + 'px';
        showDim();
    }
}

if(! showDim) {
    function showDim(editorId) {
        const canvasModal = document.getElementById('canvas-'+editorId);
        canvasModal.innerHTML = '';
        
        var computedStyle = getComputedStyle(canvasModal);
        const canvasHeight = canvasModal.clientHeight - parseFloat(computedStyle.paddingTop) - parseFloat(computedStyle.paddingBottom);
        const canvasWidth = canvasModal.clientWidth - parseFloat(computedStyle.paddingLeft) - parseFloat(computedStyle.paddingRight);
        canvasModal.innerHTML = '<div id="canvas-text" class="absolute top-1/2 left-1/2 text-gray-500" style="transform: translate(-50%, -50%);"><div class="text-6xl">Rityta</div><div>Standardstorlek: 400 x 400</div><div>Maximal bredd: ' + canvasWidth + '</div></div>';

    }
}
</script>
</div>
