<div class="flex justify-between text-sm text-gray-500">
    <div class="m-2">
        @isset($prev)
        <a class="hover:underline" href="{{ $prev }}"><< Föregående</a>
        @endisset
    </div>
    <div class="m-2">
        @isset($home)
        <a class="hover:underline" href="{{ $home }}">Hem</a>
        @endisset
    </div>
    <div class="m-2">
        @isset($next)
        <a class="hover:underline" href="{{ $next }}">Nästa >></a>
        @endisset
    </div>
</div>