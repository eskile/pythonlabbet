<div class="my-5">
    @if(!$sent)

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
    <div class="w-full">
        <div class="md:flex md:items-center mb-6">
            <div  class="w-36">
                <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="school">
                    Skola
                </label>
            </div>
            <div>
                <input wire:model="school" class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="school" type="text" placeholder="">
            </div>
        </div>
        
    </div>
    
    <textarea wire:model="text" id="students" rows="30" class="w-full border p-2 focus:border-green-500 focus:outline-none" placeholder="En elev per rad här..."></textarea>
    @if($error_text)
        <p class="bg-red-700 text-white p-3">{{ $error_text }}</p>
    @endif
    <button wire:click="createNew()" type="button" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Skapa konton</button>
    
    @else
    <h2>Följande användare är skapade i klass {{ $class }}</h2>
    @foreach($new_users as $new_user)
        <p>Namn: {{ $new_user[0] }}<br>
        E-post: {{ $new_user[1] }}<br>
        Lösenord: {{ $new_user[2] }}</p>
    @endforeach
    
    <p><b>Spara uppgifterna. Lösenorden går endast att se nu.</b></p>
    @endif
</div>
