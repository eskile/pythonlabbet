<!--Modal-->
<div class="ref-modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center z-10">
    <div id="ref-modal-overlay" class="absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="ref-modal-container bg-white w-11/12 md:max-w-screen-xl mx-auto rounded shadow-lg z-50 overflow-y-auto h-5/6">
    
        <div class="ref-modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <!-- <span class="text-sm">(Esc)</span> -->
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="ref-modal-content py-4 text-left px-6 h-full flex flex-col">
            <!--Title-->
            <div class="flex justify-between items-center flex-none">
                <div>    
                    <p class="text-2xl font-bold">Referens</p>
                    <!-- <p>Info-text</p> -->
                </div>
                <div class="ref-modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>

            <!--Body-->
            <div class="flex flex-col flex-1">
                <div class="text-sm p-1">Klicka på en funktion för att läsa mer.</div>
                @isset($basics1)
                    @include('reference-basics-1')
                @endisset
                @isset($basics2)
                    @include('reference-basics-2')
                @endisset
                @isset($turtle)
                    @include('reference-turtle')
                @endisset
            </div>

            <!--Footer-->
            <div class="flex justify-end py-2 flex-none">
                <button type="button" class="ref-modal-close border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:shadow-outline">Stäng</button>
            </div>
            
        </div>
    </div>
</div>

<div class='fixed right-0 hidden lg:block'>
    <button id="ref-open" class='bottom-0 px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-bold tracking-wide focus:outline-none transform rotate-90 translate-x-8 translate-y-16'>Referens</button>
</div>

<script>
    var refOpen = document.getElementById('ref-open')
    
    refOpen.addEventListener('click', function(event){
        event.preventDefault();
        toggleRefModal();
    })
    
    const refOverlay = document.getElementById('ref-modal-overlay');
    refOverlay.addEventListener('click', toggleRefModal);
    
    var refCloseModal = document.querySelectorAll('.ref-modal-close')
    for (var i = 0; i < refCloseModal.length; i++) {
        refCloseModal[i].addEventListener('click', toggleRefModal);
    }
    
    /*document.onkeydown = function(evt) {
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
    };*/    
    
    function toggleRefModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.ref-modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        //body.classList.toggle('modal-active')
    }

    function toggleInfo(id) {
        let el = document.getElementById(id);
        let title = document.getElementById(id + '-title');
        let short = document.getElementById(id + '-short');
        let wrapper = document.getElementById(id + '-div');
        el.classList.toggle('hidden');
        title.classList.toggle('font-bold');
        title.classList.toggle('text-2xl');
        wrapper.classList.toggle('shadow-2xl');
        short.classList.toggle('hidden')
    }
</script>
