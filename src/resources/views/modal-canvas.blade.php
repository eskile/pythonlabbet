<!--Modal-->
<style>
    .canvas canvas { margin-left: auto; margin-right: auto; outline: gray 2px solid;}
</style>
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-screen-xl mx-auto rounded shadow-lg z-50 overflow-y-auto h-5/6">
    
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6 h-full flex flex-col">
            <!--Title-->
            <div class="flex justify-between items-center pb-3 flex-none">
                <p class="text-2xl font-bold">Testa exempel</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>

            <!--Body-->

            <div class="flex flex-col lg:flex-row flex-1">
                <div id="monaco_editor-modal" class="flex-1 pt-4 border" style="min-height:300px;"></div>
                <div id = "modal-right-side" class="lg:flex-1 lg:flex lg:flex-col">
                    <div id="control-buttons-modal" class="flex-none">
                        <button type="button" id="run-modal" class="run-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Kör programmet</button>
                        <button type="button" id="stop-modal" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Stopp</button>
                    </div>
                    <div id="canvas-modal" class="canvas flex-1 text-center bg-white py-3 relative" style="min-height:424px;"></div>
                    <pre id="output-modal" class="bg-gray-600 p-4 pl-8 text-white text-lg overflow-y-auto overflow-x-auto flex-none hidden" style="min-height: 12rem; max-height: 24rem;"></pre> 
                </div>
            </div>

            <!--Footer-->
            <div class="flex justify-end my-5 flex-none">
                <button type="button" class="modal-close border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Stäng</button>
            </div>
            
            <script>
                document.addEventListener("DOMContentLoaded", function(){
                    var h_div = document.getElementById('monaco_editor-modal');
                    
                    var txt = document.createElement("textarea");
                    @if(isset($code))
                    txt.innerHTML = "{{ $code }}";
                    @endif
                    let nrLines = txt.value.split("\n").length;
                    console.log('nrLines = ' + nrLines);
                    // let height = nrLines*20+50;
                    // h_div.style.height = height+"px";
                    // h_div.style.height = "50vh";

                    editors['modal'] = monaco.editor.create(h_div, {
                        language: 'python',
                        fontSize: 16,
                        automaticLayout: true,
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
    </div>
</div>

<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            //console.log(event.target.id)
            const canvasModal = document.getElementById('canvas-modal');
            canvasModal.innerHTML = '';
            
            var computedStyle = getComputedStyle(canvasModal);
            const canvasHeight = canvasModal.clientHeight - parseFloat(computedStyle.paddingTop) - parseFloat(computedStyle.paddingBottom);
            const canvasWidth = canvasModal.clientWidth - parseFloat(computedStyle.paddingLeft) - parseFloat(computedStyle.paddingRight);
            canvasModal.innerHTML = '<div id="canvas-text" class="absolute top-1/2 left-1/2 text-gray-500" style="transform: translate(-50%, -50%);"><div class="text-6xl">Rityta</div><div>Standardstorlek: 400 x 400</div><div>Maximalt: ' + canvasWidth + 'x' + canvasHeight + '</div></div>';

            editors['modal'].setValue( document.getElementById(event.target.id+"-code").textContent)
            console.log(editors)
            for(editor in editors) {
                if(editor != 'modal') {
                    showDim(editor);
                }
            }
            toggleModal()
        })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal);
    }
    
    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };
    
    
    function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        // document.getElementById('output-modal').innerHTML = '<span class="text-gray-400 italic">-- Programmets utskrifter --</span>';
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }

    // Observe #output-modal and show only if code prints.
    const elementToObserve = window.document.getElementById('output-modal');
    observer = new MutationObserver(function(mutationsList, observer) {
        const outputModal = document.getElementById('output-modal');
        if(outputModal.textContent != '' && outputModal.textContent != '-- Programmets utskrifter --') {
            console.log(document.getElementById('modal-right-side').scrollWidth);
            outputModal.style.maxWidth = document.getElementById('modal-right-side').scrollWidth + 'px';
            outputModal.classList.remove('hidden');
            
            
        }
        else {
            outputModal.classList.add('hidden');
        }
    });
    observer.observe(elementToObserve, {characterData: false, childList: true, attributes: false});
</script>
