@extends('template-section')
@section('title', 'Mer om listor - lär dig om dellistor, listbyggare och 2D-listor i Python | pythonlabbet.se')
@section('description', 'Det är lätt att skapa en del av en lista eller sträng i Python med hjälp av en speciell syntax. Vi tittar också på vi skapar listor på enkla sätt.')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])

<h1>Mer om listor</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Läsa delar av en lista eller sträng</li>
    <li>Skapa listor enkelt med Pythons listbyggare</li>
    <li>Använda listor inuti listor</li>
</ul>

<h2>Dellistor eller del av en sträng</h2>
<p>I Python är det enkelt att skapa en <b>dellista</b> av en lista eller en <b>delsträng</b> av en sträng. På engelska heter det <em>slicing</em>.
    Syntaxen som används är <i>variabel[start:slut]</i> där <i>start</i> är det index som delen börjar på och <i>slut</i> är där delen slutar. Indexet <i>slut</i> är <b>inte inkluderat</b>.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Några exempel på hur syntaxen kan användas för att skapa en delsträng.</p>
  <pre><code class="language-python">idag = '<?php echo date("Y-m-d") ?>'
år = idag[0:4] #index 0 till och med 3
månad = idag[5:7] #index 5 och 6
dag = idag[8:10] #index 8 och 9</code></pre>
  <div id="example-slice-string-code" class="hidden">idag = '<?php echo date("Y-m-d") ?>'
år = idag[0:4]
månad = idag[5:7]
dag = idag[8:10]

print(år, månad, dag)</div>
	<button type="button" id="example-slice-string" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Dellistor skapas på samma sätt som delsträngar. Tänk på att första elementet i listan har index 0.</p>
  <pre><code class="language-python"># listan anger tider i os-finalen i Tokyo på 100 meter herrar.
tider = ['9.80', '9.84', '9.89', '9.93', '9.95', '9.95', 'DNF', 'DQ']

tid_1_3 = tider[0:3] # tre bäst tiderna i en dellista
tid_4_6 = tider[3:6] # tiderna på plats 4 till 6

</code></pre>
  <div id="example-slice-list-code" class="hidden"># listan anger tider i os-finalen i Tokyo på 100 meter herrar.
tider = ['9.80', '9.84', '9.89', '9.93', '9.95', '9.95', 'DNF', 'DQ']

tid_1_3 = tider[0:3] # tre bäst tiderna i en dellista
tid_4_6 = tider[3:6] # tiderna på plats 4 till 6

print(tid_1_3)
print(tid_4_6)</div>
	<button type="button" id="example-slice-list" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("s = 'Monty Python'
print(s[3:7])"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'more-lists-simple-slice',
    'code' => $code,
    'options' => ['nty','nty P', 'ty P', 'ty Py'],
    'correct' => 3
])

<h2>Fler sätt att dela på</h2>
<p>I syntaxen <i>variabel[start:slut]</i> går att det utelämna <i>start</i> eller <i>slut</i>. Ja, det går faktiskt att utelämna båda två för att få med allt. 
Om <i>start</i> utelämnas så tas allt med från början upp till <i>slut</i>. Om <i>slut</i> utelämnas tas allt med från <i>start</i> till slutet.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Exempel på <em>slicing</em> där startindex och slutindex utelämnas.</p>
  <pre><code class="language-python">s = 'Monty Python'

# Ta med tecken från början upp till index 5
början = s[:5]

# Ta med tecken från index 6 till slutet
slutet = s[6:]
  </code></pre>
  <div id="example-slicing-code" class="hidden">s = 'Monty Python'

# Ta med tecken från början upp till index 5
början = s[:5]

# Ta med tecken från index 6 till slutet
slutet = s[6:]

print(början)
print(slutet)</div>

	<button type="button" id="example-slicing" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Kommer du ihåg att <b>negativa index</b> kan använda i listor och strängar? Negativa index innebär att vi räknar positionen bakifrån, -1 betyder det sista elementet.
    Det går bra att använda negativa index när vi skapar delsträngar och dellistor också.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skapa en dellista med negativa index.</p>
  <pre><code class="language-python">s = 'Monty Python'
delsträng = s[1:-1] #ta inte med första och sista tecknet
  </code></pre>
  <div id="example-slicing-negative-code" class="hidden">s = 'Monty Python'
delsträng = s[1:-1] #ta inte med första och sista tecknet

print(delsträng)</div>
	<button type="button" id="example-slicing-negative" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("s = 'Monty Python'
print(s[:-2], s[0:1])"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'more-lists-slicing-negative',
    'code' => $code,
    'options' => ['Monty Pyth Mo','Monty Pyth M', 'Monty Pytho Mo', 'Monty Pytho M'],
    'correct' => 2
])

<h2>Listbyggare</h2>
<p>Listbyggare används för att skapa listor genom att bara skriva en rad kod. 
  Det engelska namnet för listbyggare är <em>list comprehension</em> och är troligtvis det du kommer stöta på mest.
Listbyggare kombinerar syntaxen för att skapa en lista <i>[]</i> med syntaxen för en for-sats. 
Senare ska vi se att det går att använda en if-sats också, men vi börjar med enklare exempel.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skapar en lista med fem identiska element.</p>
  <pre><code class="language-python">lista = [0 for i in range(5)]</code></pre>
  <div id="example-list-comprehension-identical-code" class="hidden">lista = [0 for i in range(5)]

print(lista)
  </div>
	<button type="button" id="example-list-comprehension-identical" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>I exemplet ovan användes aldrig räknaren <i>i</i>. Vi ser vad som händer om vi använder <i>i</i> istället för noll.</p>
<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Fler exempel på listbyggare.</p>
  <pre><code class="language-python">lista_1 = [i for i in range(5)] # [0,1,2,3,4]

lista_2 = [i*5 for i in range(5)] # [0,5,10,15,20]
  </code></pre>
  <div id="example-list-comprehension-i-code" class="hidden">lista_1 = [i for i in range(5)] # [0,1,2,3,4]

lista_2 = [i*5 for i in range(5)] # [0,5,10,15,20]

print(lista_1)
print(lista_2)</div>
	<button type="button" id="example-list-comprehension-i" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Nu ska vi se hur vi kan använda en if-sats inuti en listbyggare. Det kan till exempel användas för att filtrera ut element i en lista.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Listbyggare med if-sats.</p>
  <pre><code class="language-python">namn = ['Maria', 'Anna', 'Margareta', 'Elisabeth', 'Eva', 'Kristina']

#skapa en ny lista med namn som slutar på a
slutar_på_a = [n for n in namn if n[-1] == 'a']

#lista med namn som är max fem tecken långa
korta_namn = [n for n in namn if len(n) <= 5]
</code></pre>
  <div id="example-list-comprehension-if-code" class="hidden">namn = ['Maria', 'Anna', 'Margareta', 'Elisabeth', 'Eva', 'Kristina']

#skapa en ny lista med namn som slutar på a
slutar_på_a = [n for n in namn if n[-1] == 'a']

#lista med namn som är max fem tecken långa
korta_namn = [n for n in namn if len(n) <= 5]

print(slutar_på_a)
print(korta_namn)</div>
	<button type="button" id="example-list-comprehension-if" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Listbyggare kan vara lite luriga att förstå sig på, speciellt om du kan något annat programmeringsspråk där det inte finns. 
  Om du har en listbyggare <i>[x for x in lista if x < 10]</i> så kan du tänka på det så här:
    Lägg in elementet x i listan för alla element x i <i>lista</i> där x är mindre än 10. 
    Vi skapar alltså en ny lista från <i>lista</i> med alla element som är mindre än 10.</p>
    <p>Listbyggare är inte nödvändigt att kunna eftersom det alltid går att göra samma sak med en vanlig for-sats eller while-sats.
  Men för vana Pythonprogrammare som ofta arbetar med listor är det en trevlig funktion.
  </p>

<?php $code = json_encode( array("tal = [-5,-1,7,-6,0,-5,9]", "ickeneg_tal = [x for x in tal]","print(ickeneg_tal)") );?>
@livewire('editor-modify', [
    'editorId' => 'more-lists-filter',
    'code' => $code,
    'correctAnswer' => array("[7, 0, 9]"),
    'title' => 'Ändra i koden',
    'text' => 'Ändra i koden så att listbyggaren filtrerar bort alla negativa tal.',
    'tip_text' => 'Använd <span class="border">if</span> inuti listbyggaren på samma sätt som beskrivs i texten ovanför. Ta endast med de tal som är <b>större än eller lika med</b> 0.'
])

<h2>En lista av listor</h2>
<p>Tänk dig en vanlig lista och tänk sedan att varje element i den listan är en ny lista. Det är en lista av listor eller 2D-lista.</p>
<p>En 2D-lista passar speciellt bra för modeller av något i två dimensioner. En vanlig bild är ett bra exempel. 
  För att iterera igenom alla elementen i en 2D-lista brukar en nästlad for-sats användas.</p>

  <div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skapa en 2D-lista med två rader och tre kolumner. De två elementen i listan representerar rader. De elementen är i sin tur också listor.</p>
  <pre><code class="language-python">lista_2d = [ [1, 2, 3], [4, 5, 6] ]</code></pre>
  <div id="example-2d-list-code" class="hidden">lista_2d = [ [1, 2, 3], [4, 5, 6] ]

print(lista_2d)
#eller för att se 2d-strukturen bättre:
print('Ett annat sätt att skriva ut på:')
print(lista_2d[0], lista_2d[1], sep='\n')
  </div>
	<button type="button" id="example-2d-list" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Variabeln <span class="border">bild</span> är en 2D-lista som representerar en enkel bild. 
  Varje pixel är antingen <span class="border">#</span> eller ett blanksteg. Bilden har sju pixlar på bredden och sex pixlar på höjden. 
  2D-listan har alltså sex rader och varje rad innehåller sju kolumner.
  Vi skriver ut bilden med en nästlad for-sats.</p>
  <p>En riktig bild fungerar på samma sätt. Elementen brukar dock vara ett tal som beskriver färgen på den pixeln.</p>
  <pre><code class="language-python">bild = [
    [' ', '#', '#', ' ', '#', '#', ' '],
    ['#', ' ', ' ', '#', ' ', ' ', '#'],
    ['#', ' ', ' ', ' ', ' ', ' ', '#'],
    [' ', '#', ' ', ' ', ' ', '#', ' '],
    [' ', ' ', '#', ' ', '#', ' ', ' '],
    [' ', ' ', ' ', '#', ' ', ' ', ' ']
]

for rad in bild: #
    for kolumn in rad:
        print(kolumn, end='')
    print() #ny rad i utskriften för varje utskriven rad i bilden  
  </code></pre>
  <div id="example-heart-code" class="hidden">bild = [
    [' ', '#', '#', ' ', '#', '#', ' '],
    ['#', ' ', ' ', '#', ' ', ' ', '#'],
    ['#', ' ', ' ', ' ', ' ', ' ', '#'],
    [' ', '#', ' ', ' ', ' ', '#', ' '],
    [' ', ' ', '#', ' ', '#', ' ', ' '],
    [' ', ' ', ' ', '#', ' ', ' ', ' ']
]

for rad in bild: #
    for kolumn in rad:
        print(kolumn, end='')
    print() #ny rad i utskriften för varje utskriven rad i bilden </div>
	<button type="button" id="example-heart" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = json_encode( array("bild = [","    [60,42,64,76,39,69,42],","    [44,46,24,25,53,62,99],","    [60,54,6,8,43,24,69],","    [73,4,19,74,95,1,17],","    [41,54,21,37,91,1,85],","    [7,2,44,34,33,98,69]","]") );?>
@livewire('editor-make', [
    'editorId' => 'more-lists-modify-image',
    'text' => 'Summera alla tal i variabeln <span class="border">bild</span> med hjälp av en nästlad loop och skriv ut summan.', 
    'code' => $code, 'rows' => 15,
    'correctAnswer' => array("1909"),
    'tip_text' => 'Du kan använda koden i exemplet ovan som grund. Summera istället för att skriva ut.'
])




@endsection