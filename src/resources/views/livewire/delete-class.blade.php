<div>
    @if(count($classes) > 0)
        <div class="my-5">Använd rullistan för att välja en klass att ta bort. <em>En borttagen klass går inte att återställa.</em></div>
        <select name="class-selector" wire:model="selectedClass" class="px-4 py-2 mx-2">
            <option value="-1" selected>Välj klass</option>
            @foreach($classes as $id => $class)
                <option value="{{$id}}">{{$class}}</option>
            @endforeach
        </select>
    @else
        <div>Det finns inga klasser på kontot.</div>
    @endif

    @if($showAccounts && !$deleteComplete && !$continueWithDeletion)
        <div class="mt-5">Konto som kommer att tas bort:</div>

        @foreach($students as $student)
            <div class="pl-5"><em>{{ $student->name }}, {{ $student->email }}</em></div>
        @endforeach

        <div class="mt-5">Vill du fortsätta med att ta bort alla konto? (Går inte att återställa)</div>

	    <button type="button" wire:click="continueDelete" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Gå vidare med borttagning</button>
    @elseif($continueWithDeletion)
        <div class="mt-5">Bekräfta borttagning av klassen <b>{{ $selectedClassName }}</b> genom att klicka på "Ta bort".</div>
	    <button type="button" wire:click="doDelete" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Ta bort</button>
	    <button type="button" onclick="location.reload()" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Avbryt</button>

    @elseif($deleteComplete)
        <div>Alla konto i klass <b>{{ $selectedClassName }}</b> är nu borttagna.</div>
    @endif
    
</div>
