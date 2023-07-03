<!--Modal-->
<div wire:ignore class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto h-5/6">
    
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
                <p  class=""></p>
                <p id="modal-title"></p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>

            <div id="canvas-wrapper" class="w-full h-full">
                <div wire:ignore id="canvas-{{$editorId}}">
                    <canvas class="w-full h-full">
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    /*var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            console.log(event.target.id)
            toggleModal()
        })
    }*/
    
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
        if (isEscape && document.body.classList.contains('dialog-modal-active')) {
            toggleDialogModal()
        }
    };
    
    
    function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')        
        if(modal) {
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
        showDim();
    }

    const runBtn = document.getElementById('run-{{$editorId}}');
    if(!runBtn.classList.contains('hasEventListener')) {
        runBtn.addEventListener("click", toggleModal);
        runBtn.classList.add('hasEventListener');
    }

    function showDim() {
        const canvasModal = document.getElementById('canvas-wrapper');
        if(canvasModal) { //only if big canvas is active
            var computedStyle = getComputedStyle(canvasModal);
            const canvasHeight = canvasModal.clientHeight - parseFloat(computedStyle.paddingTop) - parseFloat(computedStyle.paddingBottom);
            const canvasWidth = canvasModal.clientWidth - parseFloat(computedStyle.paddingLeft) - parseFloat(computedStyle.paddingRight);
            document.getElementById('modal-title').innerHTML = '<span class="text-sm">Använd <i>Screen().setup(' + canvasWidth + ',' + canvasHeight + ')</i> för maximal yta.';
        }

    }
</script>
