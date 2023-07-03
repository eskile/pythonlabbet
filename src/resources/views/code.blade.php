<!DOCTYPE html>
<html class="h-full bg-gray-200" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Koda fritt i Python 3</title>
        <meta name="description" content="Skriv kod i Python 3 och kör den direkt på webbsajten. Ingen installation krävs.">
        @include('css')
        <link rel="stylesheet" type="text/css" href="/css/prism-vs.css">
        <link rel="stylesheet" data-name="vs/editor/editor.main" href="/monaco-editor/package/min/vs/editor/editor.main.css">
        @livewireStyles
        <style>
            .token.builtin { color: #0000ff; }
        </style>
        <script>
            let editors = {};
        </script>        
    </head>

    <body class="h-full antialiased max-w-screen-xl mx-auto bg-white border-b min-h-screen">
        @include('nav')

        @include('small-screen-warning')
        @include('reference', ['basics1' => true, 'turtle' => true, 'basics2' => true])
        <div class="lg:flex lg:flex-col">
            @livewire('free-code',[
                'editorId' => 'free-code'
                ])

        </div>

        <!-- Open/Save Modal-->
        <div wire:ignore class="dialog-modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center z-10">
            <div class="dialog-modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            
            <div class="dialog-modal-container bg-white mx-auto rounded shadow-lg z-50 overflow-y-auto" style="width:480px;">
            
                <div class="dialog-modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                    <span class="text-sm">(Esc)</span>
                </div>

                <!-- Add margin if you want to see some of the overlay behind the modal-->
                <div class="modal-content py-4 text-left px-6 h-full flex flex-col">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3 flex-none">
                        <p id="dialog-modal-title" class="text-2xl font-bold"></p>
                        <div class="dialog-modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                        </div>
                    </div>

                    <div id="dialog-modal-content">
                        
                    </div> 

                    <!--Footer-->
                    <div id="dialog-modal-button" class="flex justify-end py-2 flex-none">
                        
                    </div>
                </div>
            </div>
        </div>


        @include('footer')

        <!-- <script src="/js/prism.js"></script> -->
        @include('all-scripts')
        <script>
        const overlay = document.querySelector('.dialog-modal-overlay')
        overlay.addEventListener('click', toggleDialogModal)
        
        var closemodal = document.querySelectorAll('.dialog-modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleDialogModal);
        }
        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('dialog-modal-active')) {
                toggleDialogModal()
            }
        };
        
        
        function toggleDialogModal () {
            const body = document.querySelector('body')
            const modal = document.querySelector('.dialog-modal')        
            if(modal) {
                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
                body.classList.toggle('dialog-modal-active')
            }
        }
        </script>

    </body>
</html>