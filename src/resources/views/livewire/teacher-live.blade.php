<div>
    <div wire:poll.10000ms="refresh" class='fixed right-0 hidden lg:block' style="top:22rem">
        @if($nr_students > 0)
        <a href="/larare/behover-hjalp">
            <button id="ref-open" class='bottom-0 px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold tracking-wide focus:outline-none transform rotate-90' style="transform:translateX(6rem) rotate(90deg);">
                <div class="w-48">Elever behöver hjälp ({{ $nr_students }})</div>
            </button>
        </a>
        @endif
    </div>
</div>
