<div>
    <p>Inställningar för dig som lärare. Välj om du vill se videos och enkelt läge. Observera att dessa inställningar inte påverkar elever.</p>
    <div class="my-5">
        <label for="video" class="inline-flex relative items-center cursor-pointer">
        <input type="checkbox" value="{{ $show_videos }}" id="video" class="sr-only peer" wire:change="videoCheckboxUpdate($event.target.checked)"
        @if($show_videos)
        checked
        @endif >
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Visa videos</span>
        </label>
    </div>

    <div class="my-5">
        <label for="easy_mode" class="inline-flex relative items-center cursor-pointer">
        <input type="checkbox" value="{{ $easy_mode }}" id="easy_mode" class="sr-only peer" wire:change="easymodeCheckboxUpdate($event.target.checked)"
        @if($easy_mode)
        checked
        @endif >
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Enkelt läge</span>
        </label>
    </div>

    <p class="text-sm">Lösningar visas alltid för lärare.</p>
    
</div>
