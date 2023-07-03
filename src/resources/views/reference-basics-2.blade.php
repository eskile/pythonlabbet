<div class="mt-3">
    <div class="text-xl">Grunder del 2</div>
    <div class="flex p-1">                
        <div class="w-36 font-bold">Syntax</div>
        <div class="font-bold">Kort beskrivning</div>
    </div>

    <!-- abs -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="abs-div">
        <div id="abs-main" class="flex cursor-pointer"  onclick="toggleInfo('abs')">
            <div class="w-36" id="abs-title">abs</div>
            <div id="abs-short">Absolutbeloppet</div>
        </div>
        <div id="abs" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">a = abs(5) # a = 5
b = abs(-5.2) # b = 5.2
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>abs</i> tar absolutbeloppet av ett tal och returnerar därmed alltid ett positivt tal.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>abs(number)</i></div>
            
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>number</i></div>
                <div>Obligatorisk. Ett giltigt tal, heltal, flyttal eller komplexa tal.</div>
            </div>
        </div>
    </div>

    <!-- append -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="append-div">
        <div id="append-main" class="flex cursor-pointer"  onclick="toggleInfo('append')">
            <div class="w-36" id="append-title">append</div>
            <div id="append-short">Lägger till ett element till en lista</div>
        </div>
        <div id="append" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">lista = [1,2,3]
lista.append(4) # nu [1,2,3,4]
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">lista = ["ett",2,3.0] # i Python kan en lista bestå av olika typer
lista.append([1,2,3,4]) # nu ["ett",2,3.0,[1,2,3,4]]
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>append</i> lägger till ett element sist i en lista. Listan måste redan finnas. Den kan vara tom.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>lista.append(element)</i></div>
            
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>element</i></div>
                <div>Obligatorisk. Elementet som ska läggas till sist i listan.</div>
            </div>
        </div>
    </div>

    <!-- def -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="def-div">
        <div id="def-main" class="flex cursor-pointer"  onclick="toggleInfo('def')">
            <div class="w-36" id="def-title">def</div>
            <div id="def-short">Definierar en funktion</div>
        </div>
        <div id="def" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">def skriv_ut_hej():
    print('Hej!')
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">def hej_namn(namn):
    print('Hej ' + namn)

hej_namn('Tanja') #Skriver ut "Hej Tanja"
hej_namn('Emil') #Skriver ut "Hej Emil"
            </code></pre>
            <div class="mt-4 font-bold">Exempel #3</div>
            <pre><code class="language-python">def omkrets_rektangel(bredd, höjd):
    omkrets = 2*bredd + 2*höjd
    return omkrets
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>def</i> definierar en ny funktion. En funktion kan ha argument som du kan använda för att skicka data till funktionen.
            Funktionen kan också returnera data med hjälp av <i>return</i>.</div>
        </div>
    </div>

    <!-- for -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="for-div">
        <div id="for-main" class="flex cursor-pointer"  onclick="toggleInfo('for')">
            <div class="w-36" id="for-title">for</div>
            <div id="for-short">for används för att repetera kod</div>
        </div>
        <div id="for" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">for i in range(10):  # i går från 0 till 9
    print(i) # körs tio gånger
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">for tecken in 'pythonlabbet.se':
    print(tecken)
            </code></pre>
            <div class="mt-4 font-bold">Exempel #3</div>
            <pre><code class="language-python">for element in [1,3,3,7]:
    print(element)
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>for</i> repeterar koden i blocket för alla element i ett objekt. Objektet är till exempel en range, lista eller sträng.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>for variable in object:</i></div>
            <div class="flex mt-3">
                <div class="w-36"><i>variable</i></div>
                <div>Obligatorisk. Variabeln ändrar innehåll till nuvarande element för varje iteration.</div>
            </div>
            <div class="flex mt-3">
                <div class="w-36"><i>object</i></div>
                <div>Obligatorisk. Objektet som ska itereras över. Exempelvis en lista.</div>
            </div>
        </div>
    </div>

    <!-- len -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="len-div">
        <div id="len-main" class="flex cursor-pointer"  onclick="toggleInfo('len')">
            <div class="w-36" id="len-title">len</div>
            <div id="len-short">Ger antal element i ett objekt</div>
        </div>
        <div id="len" class="mt-2 mb-5 hidden pr-5 pl-10">
        <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">lista = [1,2,3]
längd = len(lista) # längd = 3
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">land = 'Sverige'
längd = len(land) # längd = 7
            </code></pre>
            <div class="mt-4 font-bold">Exempel #3</div>
            <pre><code class="language-python">tupel = ('Sverige', 22472, 'Lund')
längd = len(tupel) # längd = 3
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>len</i> returnerar längden eller antal element i ett objekt som till exempel en sträng, lista, tupel, lexikon eller en range. </div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>len(object)</i></div>
            
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>object</i></div>
                <div>Obligatorisk. Objektet vars längd som ska returneras.</div>
            </div>
        </div>
    </div>

    <!-- max -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="max-div">
        <div id="max-main" class="flex cursor-pointer"  onclick="toggleInfo('max')">
            <div class="w-36" id="max-title">max</div>
            <div id="max-short">Returnerar det största elementet</div>
        </div>
        <div id="max" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">lista = [1,2,3,4]
störst = max(lista) # störst = 4
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">max(a,0) # 0 om a är negativt, annars a
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>max</i> letar upp det största elementet.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>max(object)</i></div>
            
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>object</i></div>
                <div>Obligatorisk. Ett objekt som det går att iterera över.</div>
            </div>
            
        </div>
    </div>

    <!-- min -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="min-div">
        <div id="min-main" class="flex cursor-pointer"  onclick="toggleInfo('min')">
            <div class="w-36" id="min-title">min</div>
            <div id="min-short">Returnerar det minsta elementet</div>
        </div>
        <div id="min" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">lista = [1,2,3,4]
minst = min(lista) # minst = 1
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">min(a,0) # 0 om a är positivt, annars a
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>min</i> letar upp det minsta elementet.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>min(object)</i></div>
            
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>object</i></div>
                <div>Obligatorisk. Ett objekt som det går att iterera över.</div>
            </div>
            
        </div>
    </div>

    <!-- pop -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="pop-div">
        <div id="pop-main" class="flex cursor-pointer"  onclick="toggleInfo('pop')">
            <div class="w-36" id="pop-title">pop</div>
            <div id="pop-short">Tar bort ett element från en lista</div>
        </div>
        <div id="pop" class="mt-2 mb-5 hidden pr-5 pl-10">
        <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">lista = [1,2,3]
lista.pop() # nu [1,2]
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">lista = [1,2,3]
lista.pop(0) # nu [2,3]
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>pop</i> tar bort ett element på en given plats från en lista. </div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>lista.pop(element)</i></div>
            
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>element</i></div>
                <div>Valfri. Index på elementet som ska tas bort ur listan. Standardvärde är -1 (sista elementet).</div>
            </div>
        </div>
    </div>

    <!-- return -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="return-div">
        <div id="return-main" class="flex cursor-pointer"  onclick="toggleInfo('return')">
            <div class="w-36" id="return-title">return</div>
            <div id="return-short">Returnerar data från en funktion</div>
        </div>
        <div id="return" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel</div>
            <pre><code class="language-python">def kvadrera_addera(x,y):
    return x**2 + y**2

resultat = kvadrera_addera(5,7)
print('Kvadrera och addera 5 och 7 ger', resultat)
            </code></pre>
            
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>return</i> skickar tillbaka data från en funktion till platsen där den anropades.</div>
        </div>
    </div>

    <!-- sum -->
    <div class="odd:bg-white even:bg-gray-100 p-1" id="sum-div">
        <div id="sum-main" class="flex cursor-pointer"  onclick="toggleInfo('sum')">
            <div class="w-36" id="sum-title">sum</div>
            <div id="sum-short">Summerar elementen i ett objekt</div>
        </div>
        <div id="sum" class="mt-2 mb-5 hidden pr-5 pl-10">
            <div class="mt-4 font-bold">Exempel #1</div>
            <pre><code class="language-python">lista = [1,2,3,4]
summa = sum(lista) # summa = 10
            </code></pre>
            <div class="mt-4 font-bold">Exempel #2</div>
            <pre><code class="language-python">tupel = (1,2,3)
summa = sum(tupel) # summa = 6
            </code></pre>
            <div class="mt-4 font-bold">Förklaring</div>
            <div><i>sum</i> adderar alla element i ett objekt till en summa.</div>
            <div class="mt-4 font-bold">Syntax</div>
            <div><i>sum(object)</i></div>
            
            <div class="mt-4 font-bold">Argument</div>
            <div class="flex">
                <div class="w-36"><i>object</i></div>
                <div>Obligatorisk. Ett objekt som det går att iterera över.</div>
            </div>
            
        </div>
    </div>
        
</div>