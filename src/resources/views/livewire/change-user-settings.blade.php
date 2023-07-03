<div>
    <div class="bold text-2xl">Lösningar</div>
    <p>Ska eleverna kunna se ett lösningsförslag på uppgifterna?</p>
    <div class="mb-5">
        <button type="button" wire:click="solutionAll(1)" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Visa för alla</button>
        <button type="button" wire:click="solutionAll(0)" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Visa för ingen</button>
    </div>
    @foreach($settings as $i => $user)
    <div class="mb-5">
    <label for="solution{{ $i }}" class="inline-flex relative items-center cursor-pointer">
    <input type="checkbox" value="{{ $i }}" id="solution{{ $i }}" class="sr-only peer" wire:change="solutionCheckboxUpdate({{ $i }}, $event.target.checked)"
    @if($user->show_solutions)
    checked
    @endif
    >
    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $user->name }}</span>
    </label>
    </div>
    @endforeach
    <hr>

    <div class="bold text-2xl mt-5">Videos</div>
    <p>Välj om videoklippen i början av vissa avsnitt ska visas.</p>
    <div class="mb-5">
        <button type="button" wire:click="videoAll(1)" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Visa för alla</button>
        <button type="button" wire:click="videoAll(0)" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Visa för ingen</button>
    </div>
    @foreach($settings as $i => $user)
    <div class="mb-5">
    <label for="video{{ $i }}" class="inline-flex relative items-center cursor-pointer">
    <input type="checkbox" value="{{ $i }}" id="video{{ $i }}" class="sr-only peer" wire:change="videoCheckboxUpdate({{ $i }}, $event.target.checked)"
    @if($user->show_videos)
    checked
    @endif
    >
    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $user->name }}</span>
    </label>
    </div>
    @endforeach
    <hr>

    <div class="bold text-2xl mt-5">Enkelt läge</div>
    <p>Med enkelt läge aktiverat är de svårare uppgifterna förenklade. Framförallt uppgifter där eleven ska skapa kod själv förenklas genom att det finns mer kod från start.</p>
    <p>Enkelt läge påverkar i nuläget endast grundkurs del 1.</p>
    <div class="mb-5">
        <button type="button" wire:click="easymodeAll(1)" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Visa för alla</button>
        <button type="button" wire:click="easymodeAll(0)" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Visa för ingen</button>
    </div>
    @foreach($settings as $i => $user)
    <div class="mb-5">
    <label for="easymode{{ $i }}" class="inline-flex relative items-center cursor-pointer">
    <input type="checkbox" value="{{ $i }}" id="easymode{{ $i }}" class="sr-only peer" wire:change="easymodeCheckboxUpdate({{ $i }}, $event.target.checked)"
    @if($user->easy_mode)
    checked
    @endif
    >
    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $user->name }}</span>
    </label>
    </div>
    @endforeach
    <hr>
</div>
