<div class="my-5">
    @if(!$sent)
    <h1>Lägg till användare till en klass</h1>
    <p>Lägg in <b>befintliga</b> användare (e-postadresser) i rutan nedanför. <b>En e-postadress per rad</b>. 
    <p>Varje e-postadress som läggs in måste finnas hos en befintlig användare. Varje användare har sedan 
        möjlighet att bekräfta att de läggs in i klassen.</p>
    <p>Av säkerhetsskäl uppkommer inget felmeddelande om e-postadressen inte finns.</p>
    <div class="w-full">
        <div class="md:flex md:items-center mb-6">
                <div class="w-36">
                    <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="class">
                        Klassnamn*
                    </label>
                </div>
                <div>
                    <input wire:model="class" class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="class" type="text" value="">
                </div>
                <div>
                    @if(count($classes) > 0)
                    <select wire:model="selectedClass" class="px-4 py-2 mx-2">
                        <option value="" selected>Befintliga klasser</option>
                        @foreach($classes as $class)
                            <option value="{{$class}}">{{$class}}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
        </div>
    </div>
    
    <textarea wire:model="text" id="students" rows="15" class="w-1/2 block border p-2 focus:border-green-500 focus:outline-none" placeholder="En e-post per rad här..."></textarea>
    @if($error_text)
        <p class="bg-red-700 text-white p-3">{{ $error_text }}</p>
    @endif
    <button wire:click="createNew()" type="button" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Bjud in</button>
    
    @else
    <p>&#9989; Inbjudan skapad (klass: {{ $class }}).</p>
    <p>Be eleven/eleverna att gå till 
    <a class="text-green-500 hover:underline" href="https://pythonlabbet.se/min-klass">pythonlabbet.se/min-klass</a>
    för att verifiera sin plats i klassen.
    @endif
</div>
