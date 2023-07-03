<style>
    .modal {
        transition: opacity 0.25s ease;
    }
    body.modal-active {
        overflow-x: hidden;
        overflow-y: visible !important;
    }
</style>
<header class="flex">
    <nav id="site-menu" class="flex flex-col sm:flex-row w-full justify-between items-center px-4 sm:px-6 py-1 bg-gray-100 shadow sm:shadow-none border-b-2 border-gray-200">
        
        <div class="w-full sm:w-auto self-start sm:self-center flex flex-row sm:flex-none flex-nowrap justify-between items-center">
            <a href="/" class="no-underline pt-1">
                <img class="h-11" src="/img/logo-text.svg">
            </a>
            <button id="menuBtn" class="hamburger block sm:hidden focus:outline-none" type="button" onclick="navToggle();">
                <span class="hamburger__top-bun"></span>
                <span class="hamburger__bottom-bun"></span>
            </button>
        </div>
        <div id="menu" class="w-full sm:w-auto self-end sm:self-center sm:flex flex-col sm:flex-row items-center h-full py-1 pb-4 sm:py-0 sm:pb-0 hidden">
            <!-- <a class="text-dark text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 hover:text-green-600" href="/blogg/advent-of-code-2021">Advent of Code</a> -->
            <a class="text-dark text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 hover:text-green-600" href="/kurser">Alla kurser</a>
            <a class="text-dark text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 hover:text-green-600" href="/problemlosning">Problem</a>
            <a class="text-dark text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 hover:text-green-600" href="/koda">Koda</a>
            <a class="text-dark text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 hover:text-green-600" href="/larare">Lärare</a>

            @guest
            <a class="text-dark text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 hover:text-green-600" href="/login">Logga in</a>
            @endguest
            @auth
            <!-- <a class="text-dark hover:text-red text-lg w-full no-underline sm:w-auto sm:px-4 py-2 sm:py-1 hover:text-green-600" href="/dashboard">{{ Auth::user()->name }}</a> -->
            <span class="text-dark italic text-lg w-full no-underline sm:w-auto sm:pl-4 py-2 sm:py-1"><a class="hover:underline" href="/mina-sidor">{{ Auth::user()->name }}</a></span>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                <img class="ml-2 w-4" src="/img/logout.svg">
            </a>
            </form>

            @endauth

        </div>
    </nav>
</header>
<script>
    function navToggle() {
    var btn = document.getElementById('menuBtn');
    var nav = document.getElementById('menu');

    btn.classList.toggle('open');
    nav.classList.toggle('flex');
    nav.classList.toggle('hidden');
}
    
</script>