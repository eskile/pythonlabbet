<div class="mt-3">
    <div class="text-xl">Grunder del 1</div>
    <div class="flex p-1">                
        <div class="w-36 font-bold">Syntax</div>
        <div class="font-bold">Kort beskrivning</div>
    </div>

    <!-- break -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="break-div">
        <div id="break-main" class="flex cursor-pointer"  onclick="toggleInfo('break')">
            <div class="w-36" id="break-title">break</div>
            <div id="break-short">break avbryter kod som repeteras</div>
        </div>
        <div id="break" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">while True:
    print('Du är fin!')
    svar = input('Ska jag sluta säga det? Skriv ja i så fall.')
    if svar == 'ja':
        break
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>break</i> avbryter kod som repeteras. Till exempel när <i>while</i> används. </div>
            
        </div>
    </div>
    
    <!-- continue -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="continue-div">
        <div id="continue-main" class="flex cursor-pointer"  onclick="toggleInfo('continue')">
            <div class="w-36" id="continue-title">continue</div>
            <div id="continue-short">continue avbryter en repetition och påbörjar nästa</div>
        </div>
        <div id="continue" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">i = 0
while i < 100: 
    if i % 2 == 0: # fortsätt med nästa repetition om i är delbart med 2
        continue
    print(i,'är ett udda tal')
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>continue</i> avbryter körningen i nuvarande repetition/iteration och fortsätter med nästa repetition. Används i while-satser och for-satser.</div>
            
        </div>
    </div>

    <!-- elif -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="elif-div">
        <div id="elif-main" class="flex cursor-pointer"  onclick="toggleInfo('elif')">
            <div class="w-36" id="elif-title">elif</div>
            <div id="elif-short">elif är en kombination av else och if</div>
        </div>
        <div id="elif" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">temp = int(input('Vad är temperaturen?'))
if temp > 20:
    print('Varmt och skönt!')
elif temp > 0: #om temp <= 20 och temp > 0
    print('Inte jättekallt, men inte så varmt heller.')
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">tal = int(input('Skriv in ett heltal'))
if tal == 0:
    print('Du skrev in talet 0.')
elif tal > 0:
    print('Du skrev in ett positivt tal.')
else:
    print('Du skrev in ett negativt tal.')
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>elif</i> används enbart efter <i>if</i>. Det är en kombination av <i>else</i> och <i>if</i>, det vill säga ANNARS (det ovan är falskt) och OM (ifall det nya villkoret är sant). Villkoret vid <i>elif</i> testas endast om villkoret vid <i>if</i> är falskt.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>elif villkor:</i></div>
            <div class="flex mt-3">
                <div class="w-36"><i>villkor</i></div>
                <div>Obligatorisk. Något som är <i>True</i> eller <i>False</i>.</div>
            </div>
        </div>
    </div>

<!-- else -->
<div class="odd:bg-white even:bg-gray-100 p-1" id="else-div">
        <div id="else-main" class="flex cursor-pointer"  onclick="toggleInfo('else')">
            <div class="w-36" id="else-title">else</div>
            <div id="else-short">else kan användas sist i en if-sats</div>
        </div>
        <div id="else" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">ålder = int(input('Hur gammal är du?'))
if ålder >= 18:
    print('Du är vuxen!')
else:
    print('Du är inte vuxen.')
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>else</i> används enbart i slutet av ett block som startar med <i>if</i> och koden under <i>else</i> körs endast om villkort vid <i>if</i> är falskt.</div>
        </div>
    </div>

    

    <!-- float() -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="float-div">
        <div id="float-main" class="flex cursor-pointer"  onclick="toggleInfo('float')">
            <div class="w-36" id="float-title">float()</div>
            <div id="float-short">Konverterar till typen float (decimaltal)</div>
        </div>
        <div id="float" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">float('0.01')  #konverterar strängen '0.01' till 0.01
float(10)  #konverterar heltalet 10 till 10.0
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div>Funktionen <i>float()</i> konverterar argumentet till typen float (decimaltal). Vanligtvis är argumentet en textsträng eller ett heltal.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>float(number)</i></div>
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>number</i></div>
                <div>Ett tal på formen av en textsträng eller ett heltal.</div>
            </div>
        </div>
    </div>

    <!-- if -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="if-div">
        <div id="if-main" class="flex cursor-pointer"  onclick="toggleInfo('if')">
            <div class="w-36" id="if-title">if</div>
            <div id="if-short">if styr koden att göra olika beroende på ett villkor</div>
        </div>
        <div id="if" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">tal = 10
if tal == 10:
    print('Talet är lika med 10.') #detta kommer skrivas ut
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">tal = int(input('Skriv in ett heltal'))
if tal == 0:
    print('Du skrev in talet 0.')
elif tal > 0:
    print('Du skrev in ett positivt tal.')
else:
    print('Du skrev in ett negativt tal.')
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>if</i> används för att styra vad programmet gör beroende på ett villkor. Om villkoret är <em>sant</em> körs koden i if-blocket. För att styra
            vad som händer om villkoret inte är sant, kan <i>elif</i> och <i>else</i> användas.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>if villkor:</i></div>
            <div class="flex mt-3">
                <div class="w-36"><i>villkor</i></div>
                <div>Obligatorisk. Något som är <i>True</i> eller <i>False</i>.</div>
            </div>
        </div>
    </div>

    <!-- input() -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="input-div">
        <div id="input-main" class="flex cursor-pointer"  onclick="toggleInfo('input')">
            <div class="w-36" id="input-title">input()</div>
            <div id="input-short">Tar emot indata från användaren</div>
        </div>
        <div id="input" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">svar = input('Vad heter du?')  #Användarens svar sparas i variablen svar
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div>Funktionen <i>input()</i> låter användaren skriva indata till programmet. Det går att skicka med en text som beskriver vad som ska skrivas in.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>input(prompt)</i></div>
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>prompt</i></div>
                <div>En valfri text användaren får se.</div>
            </div>
        </div>
    </div>

    <!-- int() -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="int-div">
        <div id="int-main" class="flex cursor-pointer"  onclick="toggleInfo('int')">
            <div class="w-36" id="int-title">int()</div>
            <div id="int-short">Konverterar till typen int (heltal)</div>
        </div>
        <div id="int" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">int(42)  #konverterar strängen '42' till 42
int(3.94)  #konverterar decimaltalet 3.94 till 3
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div>Funktionen <i>int()</i> konverterar argumentet till typen int (heltal). Vanligtvis är argumentet en textsträng eller ett decimaltal.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>int(number)</i></div>
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>number</i></div>
                <div>Ett tal på formen av en textsträng eller ett decimaltal.</div>
            </div>
        </div>
    </div>

    <!-- print() -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="print-div">
        <div id="print-main" class="flex cursor-pointer"  onclick="toggleInfo('print')">
            <div class="w-36" id="print-title">print()</div>
            <div id="print-short">Skriver ut text eller en variabels innehåll på skärmen</div>
        </div>
        <div id="print" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">print('Hello World')  #skriver ut "Hello World"
print(1+1) #skriver ut talet 2
print(x)  #skriver ut innehållet i variablen x
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">print('Hello World', end='')  #skriver ut "Hello World" utan att göra ny rad
            </code></pre>
            <div class="mt-4 font-bold">Exempel #3</div>
            <pre><code class="language-python">print('Hej','på','dig')  #Skriver ut "Hej på dig"
print('Hej','på','dig',sep=' | ',end='!')  #skriver ut "Hej | på | dig!" utan ny rad på slutet.
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div>Funktionen <i>print()</i> skriver ut en textsträng på skärmen. Försöker automatiskt omvandla det som ska skrivas ut till text.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>print(*object, sep=' ', end='\n')</i></div>
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>*object</i></div>
                <div>Obligatorisk. Ett eller flera objekt som ska skrivas ut. Separera objekten med kommatecken.</div>
            </div>
            <div class="flex">
                <div class="w-36"><i>sep</i></div>
                <div>Tecken för att avskilja objekten som skrivs ut. Som standard mellanrum.</div>
            </div>
            <div class="flex">
                <div class="w-36"><i>end</i></div>
                <div>Tecken som avslutar texten som skrivs ut. Som standard "\n" - vilket betyder ny rad.</div>
            </div>
        </div>
    </div>

    <!-- randint() -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="randint-div">
        <div id="randint-main" class="flex cursor-pointer"  onclick="toggleInfo('randint')">
            <div class="w-36" id="randint-title">randint()</div>
            <div id="randint-short">Konverterar till typen randint (heltal)</div>
        </div>
        <div id="randint" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">from random import randint
kast = randint(1,6)  #ett slumptal 1-6
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div>Funktionen <i>randint()</i> genererar ett slumptal mellan två heltalsvärden a och b så att a <= N <= b. <i>randint</i> finns i module random.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>randint(a,b)</i></div>
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>a</i></div>
                <div>Det minsta slumptal som kan genereras.</div>
            </div>
            <div class="flex">
                <div class="w-36"><i>b</i></div>
                <div>Det största slumptal som kan genereras.</div>
            </div>
        </div>
    </div>

    <!-- round() -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="round-div">
        <div id="round-main" class="flex cursor-pointer"  onclick="toggleInfo('round')">
            <div class="w-36" id="round-title">round()</div>
            <div id="round-short">Avrundar ett tal</div>
        </div>
        <div id="round" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">round(7.89)  #avrundar till 8
round(1.23)  #avrundar till 1
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">round(1.23456,2)  #avrundar 1.23
round(1.23456,4)  #avrundar till 1.2346
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div>Funktionen <i>round()</i> avrundar ett decimaltal. Som standard till ett heltal, det går att ställa in round() till att avrunda till godtyckligt antal decimaler.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>round(number, decimalplaces = 0)</i></div>
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>number</i></div>
                <div>Obligatoriskt. Talet som ska avrundas.</div>
            </div>
            <div class="flex">
                <div class="w-36"><i>decimalplaces</i></div>
                <div>Antal decimaler som talet ska avrundas till. Som standard satt till 0.</div>
            </div>
        </div>
    </div>

    <!-- str() -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="str-div">
        <div id="str-main" class="flex cursor-pointer"  onclick="toggleInfo('str')">
            <div class="w-36" id="str-title">str()</div>
            <div id="str-short">Konverterar till typen sträng</div>
        </div>
        <div id="str" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">str(2.71)  #konverterar decimaltalet 2.71 till strängen '2.71'
str(10)  #konverterar heltalet 10 till '10'
            </code></pre>

            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">ålder = 15
print('Du är ' + str(ålder) + ' år gammal.')
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div>Funktionen <i>str()</i> konverterar argumentet till en sträng. Ofta är argumentet ett heltal eller ett decimaltal. Det kan också vara betydligt mer komplexa datatyper som går att konvertera till strängar.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>str(object)</i></div>
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>object</i></div>
                <div>Ett objekt som kan konverteras till en sträng.</div>
            </div>
        </div>
    </div>

    <!-- while -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="while-div">
        <div id="while-main" class="flex cursor-pointer"  onclick="toggleInfo('while')">
            <div class="w-36" id="while-title">while</div>
            <div id="while-short">while används för att repetera kod</div>
        </div>
        <div id="while" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">n = int(input('Hur många tal vill du skriva ut?'))
i = 1
while i <= n:
    print(i)
    i = i + 1
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>while</i> repeterar koden i blocket så länge villkoret är sant.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>while villkor:</i></div>
            <div class="flex mt-3">
                <div class="w-36"><i>villkor</i></div>
                <div>Obligatorisk. Något som är <i>True</i> eller <i>False</i>. Måste bli falskt någon gång för att while-blocket ska lämnas.</div>
            </div>
        </div>
    </div>

</div>