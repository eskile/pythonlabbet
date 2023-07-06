<div>
    @if($userIsTeacher)
    <p>Användaren är lärare.</p>
    @endif

    <p>
        Användare: {{ $userName }}<br>
        E-post: {{ $userEmail }}
    </p>

    <button type="button" wire:click="makeTeacher" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Till lärare</button>
    <button type="button" wire:click="unMakeTeacher" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Ta bort lärare</button>
    @if($sendEmailAllowed)
    <button type="button" wire:click="sendEmail" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Skicka e-post</button>
    @endif
</div>
