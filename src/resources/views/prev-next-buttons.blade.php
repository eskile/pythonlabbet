<div class="px-8">
    <div class="flex justify-between text-sm text-gray-500">    
        <div class="mb-4">
            @isset($prev)
            <a href="{{ $prev }}"><button class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring"><< Föregående</button></a>
            @endisset
        </div>
        <div class="mb-4">
            @isset($home)
            <a href="{{ $home }}"><button class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Till kursens startsida</button></a>
            @endisset
        </div>
        <div class="mb-4">
            @isset($next)
            <a href="{{ $next }}"><button class="border border-green-600 bg-green-600 text-white px-4 py-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Nästa >></button></a>
            @endisset
        </div>
    </div>
</div>