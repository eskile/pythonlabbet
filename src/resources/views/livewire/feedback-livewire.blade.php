<div>
@auth
    <hr class="mt-10">
    <div class="m-10">
        @if(!$ratingIsSet)
        <div class="text-center"><p><b>Vad tyckte du om det här avsnittet?</b></p>
        <p class="text-4xl">
            <span wire:click="rate(1)" class="mx-3 cursor-pointer">&#128577;</span>
            <span wire:click="rate(2)" class="mx-3 cursor-pointer">&#128533;</span>
            <span wire:click="rate(3)" class="mx-3 cursor-pointer">&#128528;</span>
            <span wire:click="rate(4)" class="mx-3 cursor-pointer">&#128522;</span>
            <span wire:click="rate(5)" class="mx-3 cursor-pointer">&#128512;</span></p>
        </div>
        @elseif(!$textIsSet)
        <div class="text-center"><p><b>
            @if($rating <= 3)
            Vad är du inte nöjd med?
            @else
            Tack! Finns det något du tycker kan bli ännu bättre?
            @endif
            </b> </p>
        </div>
        <textarea wire:model="text" id="feedback-text" rows="4" class="w-full border p-2" placeholder="Skriv din feedback här..."></textarea>
        <div class="flex flex-row justify-between">
            <span wire:click="hideTextArea()" class="text-sm text-gray-500 underline cursor-pointer">Nej tack, dölj rutan</span>
            <button wire:click="submitFeedback()" type="button" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Skicka</button>
        </div>  
        @else
        <p class="text-center">Tack för din feedback!</p>
        @endif
    </div>
@endauth
</div>
