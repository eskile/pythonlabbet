<!DOCTYPE html>
<html class="lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lär dig programmera i Python | pythonlabbet.se</title>
        <meta name="description" content="Lär dig grunderna i Python med hjälp av vår interaktiva kurs. Passar både i skolan eller om du vill lära dig programmera på fritiden.">        
        @include('css')
        
        @include('analytics')
    </head>

    <body class="antialiased bg-gray-800  border-b min-h-screen">
        @include('nav')
        
        @include('small-screen-warning')
    
        <div class="px-2 sm:px-8 lg:px-48 text-center py-8 sm:py-24 bg-gray-800">
            <div class="max-w-screen-xl mx-auto text-white">
                <h1>Lär dig programmera i Python</h1>
                <p>Välkommen till pythonlabbet.se!</p>
                @guest
                <p>Du är <b>inte</b> inloggad.</p>
                <div class="flex justify-center mt-10 mb-10">
                    <div>
                        <a href="/login" class="p-2 m-2 sm:m-5 sm:p-5 run-button rounded-md border border-green-600 bg-green-600 text-white select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50">Logga in</a>
                    </div>
                    <div>
                        <a href="/register" class="p-2 m-2 sm:m-5 sm:p-5 run-button rounded-md border border-green-600 bg-green-600 text-white select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50">Skapa konto</a>
                    </div>
                </div>
                <p>Pythonlabbet fungerar bäst inloggad. Med det sagt, får du gärna kika in.</p>
                @endguest

                
                <div class="flex justify-center mt-10 mb-4">
                    <div>
                        <a href="/kurser" class="p-2 m-2 sm:m-5 sm:p-5 run-button rounded-md border border-green-600 bg-green-600 text-white select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50">Kurser</a>
                    </div>
                    <div>
                        <a href="/problemlosning" class="p-2 m-2 sm:m-5 sm:p-5 run-button rounded-md border border-green-600 bg-green-600 text-white select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50">Problem</a>
                    </div>
                </div>
            </div>
        </div>
        @guest
        <div class="px-2 sm:px-8 lg:px-48 text-center py-8 sm:py-24 bg-gray-100">
            <div class="max-w-screen-xl mx-auto">
                <img class="mx-auto m-5 max-h-20" src="/img/python.svg">
                <h2>Pythonlabbet är ett interaktivt läromedel i programmering</h2>
                <p class="px-2 sm:px-24">Här kan du lära dig <b>programmera i Python</b> utan att installera något.
                <br>Allt du behöver är en webbläsare och internet.
                </p>
                
            </div>
        </div>
        @endguest

        @auth
        <div class="px-2 sm:px-8 lg:px-48 pb-2 pt-8 sm:py-4 text-center bg-white">
            <p class=""2><b>Snabblänkar:</b> 
                <a class="text-green-500 hover:underline" href="/grundkurs">Grundkursen</a> | 
                <a class="text-green-500 hover:underline" href="/grundkurs-del-2">Grundkurs del 2</a> |
                <a class="text-green-500 hover:underline" href="/turtle">Turtle-kursen</a> |
                <a class="text-green-500 hover:underline" href="/mina-sidor">Mina sidor</a>
            </p>
        </div>
        

        <div class="px-2 sm:px-8 lg:px-48 text-center py-4 sm:pb-24 bg-white">
        @endauth
        @guest
        <div class="px-2 sm:px-8 lg:px-48 text-center py-8 sm:py-24 bg-white">
        @endguest
            <div class="max-w-screen-xl mx-auto">
            <img class="mx-auto m-5 max-h-40" src="/img/e-book.svg">
                <h2>Kurser för nybörjare</h2>
                <div class="flex justify-center flex-wrap">
                    <div class="text-left w-96 px-5">
                        <div class="text-center font-medium"><p>Rita med turtle</p></div>
                        @include('turtle-links')
                    </div>

                    <div class="text-left w-96 px-5">
                        <div class="text-center font-medium"><p>Grundkurs del 1</p></div>
                        @include('basics-links')
                    </div>
                </div>
                <div style="margin-top:50px">
                    <a href="/kurser" class="p-2 m-2 sm:m-5 sm:p-5 run-button rounded-md border border-green-600 bg-green-600 text-white select-none hover:bg-green-700 focus:outline-none focus:ring disabled:opacity-50">Alla kurser</a>
                </div>
            </div>
        </div>

        <div class="px-2 sm:px-8 lg:px-48 text-center py-8 sm:py-24 bg-gray-100">
            <div class="max-w-screen-xl mx-auto">
                <img class="mx-auto m-5 max-h-40" src="/img/keyboard.svg">
                <h2>Så använder du Pythonlabbet</h2>
                <p>Det är <b>viktigt</b> att du använder en enhet med tangentbord. <br>Det går inte att programmera ordentligt utan ett riktigt tangentbord!</p>
                <p>I avsnitten är <b>texten och uppgifterna</b> viktigast. Videoklippen ska ses som ett komplement. </p>
                <p>På sidan för <a class="text-green-500 hover:underline" href="/problemlosning">problemlösning</a> kan du testa vad du lärt dig. Lär dig gärna grunderna i del 1 först.</p>

            </div>
        </div>

        <div class="px-2 sm:px-8 lg:px-48 text-center py-8 sm:py-24 bg-white">
            <div class="max-w-screen-xl mx-auto">
                <img class="mx-auto m-5 max-h-40" src="/img/teacher.svg">
                <h2>För lärare</h2>
                <p><b>Verifierade lärare</b> får tillgång till funktionalitet som är bra vid arbete med en klass.</p>
                <p>En lärare kan snabbt och enkelt skapa elevkonton till en hel klass som är kopplade till läraren. Läraren får också en översikt av hur det går för eleverna och det går att granska och kommentera elevers lösningar med mera.</p>
                <p><a class="text-green-500 hover:underline" href="/larare">Läs mer om lärarkonto</a></p>

            </div>
        </div>

        <div class="px-2 sm:px-8 lg:px-48 text-center py-8 sm:py-24 bg-gray-100">
        <div class="max-w-screen-xl mx-auto">
            <img class="mx-auto m-5 max-h-40" src="/img/universitet.svg">
                <h2>Inspirerat av PRIMM och UMC</h2>
                <p class="px-2 sm:px-24">
                PRIMM<sup>1</sup> (<b>P</b>redict <b>R</b>un <b>I</b>nvestigate <b>M</b>odify <b>M</b>ake) och UMC<sup>2</sup> (<b>U</b>se <b>M</b>odify <b>C</b>reate) är två modeller för att lära ut programmering.
                Båda syftar till att undvika att eleven skriver kod direkt. Istället ska eleven börja läsa kod i färdigskrivna program, testa att köra dem och kanske försöka förutsäga vad de gör. 
                Senare får eleven modifiera befintlig kod och behöver då inte själv ta ansvaret för att koden är korrekt. Till slut skriver eleven egen kod.
                </p>
                <ol class="text-xs">
                    <li>1. <a class="hover:underline" href="https://dl.acm.org/doi/abs/10.1145/3287324.3287477">Teachers' Experiences of using PRIMM to Teach Programming in School</a> - Sue Sentance et al.</li>
                    <li>2. <a class="hover:underline" href="https://dl.acm.org/doi/abs/10.1145/3304221.3319786">Use, Modify, Create: Comparing Computational Thinking Lesson Progressions for STEM Classes</a> - Nicholas Lytle et al.</li>
                </ol>
            </div>
        </div>
        @include('footer')
    </body>
</html>

