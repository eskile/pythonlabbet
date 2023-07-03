@extends('template-section')
@section('title', 'Listor i Python | Pythonlabbet')
@section('description', 'En lista är ett enkelt sätt att spara data i minnet. ')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])
<h1>Listor</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig</p>
<ul>
    <li>Skapa en lista</li>
    <li>Läsa värdet på en viss plats i listan</li>
    <li>Lägga till och ta bort element i en lista</li>
    <li>Några användbara funktioner som är kopplade till listor</li>
</ul>

<h2>Grundläggande om listor</h2>
<p>När man programmerar är det mycket vanligt att använda en struktur som kan <b>lagra ett antal värden i en viss ordning</b>.
Kärt barn har många namn och det kan heta array (engelska, fält på svenska), lista eller vektor.
I Python används ordet <b>lista</b>.</p>

<p>En lista tillåter dubletter. Det går också bra att ha listor inuti en lista för att på sätt skapa en matris eller tvådimensionell lista.
I Python kan olika element vara av olika typer, så är det inte i många andra språk.

</p>

<p>Vi börjar med att skapa en lista bestående av tre frukter. 
För att skapa listan används hakparenteser <i>[ ]</i>. På svenska tangentbord skrivs hakparanteser med Alt Gr + 8 och Alt Gr + 9. 
Värden i listan separeras med kommatecken.
Med hjälp av <i>print</i> skriver vi ut innehållet i listan.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Vi skapar en lista vid namn <span class="border">frukter</span> som innehåller tre strängar av fruktnamn och skriver ut den.</p>
  <pre><code class="language-python">frukter = ['Äpple', 'Banan', 'Mango']
print(frukter)</code></pre>
  <div id="example-create-list-code" class="hidden">frukter = ['Äpple', 'Banan', 'Mango']
print(frukter)</div>
	<button type="button" id="example-create-list" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>I en lista börjar vi alltid att räkna från noll. Det <b>första elementet har index 0</b>. 
I exemplet ovan kan vi läsa av det första värdet i listan genom att skriva <i>frukter[0]</i>. 
För att läsa det andra värdet i listan skriver vi <i>frukter[1]</i> och så vidare.
</p>
<p>
I Python kan vi använda negativa index för att gå baklänges från slutet. 
Det sista elementet läses med <i>frukter[-1]</i> och med <i>frukter[-2]</i> läses det näst sista elementet.</p>

<p>Att det första elementet i en lista är element 0 är normalt förvirrande för nybörjare. 
Vad värre är, det finns programmeringsspråk där räkningen börjar från ett, även om det är ovanligt. </p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Hur vi kan läsa av värden. Vi använder notationen <span class="border">frukter[i]</span> där <span class="border">i</span> är indexet för elementet i listan.</p>
  <pre><code class="language-python">frukter = ['Äpple', 'Banan', 'Mango']
första_elementet = frukter[0]
andra_elementet = frukter[1]
tredje_elementet = frukter[2]
sista_elementet = frukter[-1]
</code></pre>
  <div id="example-read-list-code" class="hidden">frukter = ['Äpple', 'Banan', 'Mango']
första_elementet = frukter[0]
andra_elementet = frukter[1]
tredje_elementet = frukter[2]
sista_elementet = frukter[-1]

print( första_elementet )
print( andra_elementet )
print( tredje_elementet )
print( sista_elementet )
</div>
	<button type="button" id="example-read-list" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("språk = ['C++', 'Java', 'Python', 'PHP', 'Javascript']
print( språk[2] )"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'lists_basic_quiz',
    'code' => $code,
    'options' => ['Java','Python', 'PHP'],
    'correct' => 2
])

<h2>Lägga till och ta bort element</h2>
<p>Vi kan skriva <i>frukter = []</i> för att skapa en <b>tom lista</b>. 
För varje lista som skapas följer det med ett antal funktioner som kan användas på listan, som <i>append()</i> och <i>pop()</i>.
Vi skriver listans namn, följt av en punkt för att komma åt dess funktioner. 
Vi kan till exempel skriva <i>frukter.append('Päron')</i> för att lägga till en frukt till i listan. Det nya elementet hamnar <b>sist</b> i listan.</p>

<p>Funktionen <i>pop(index)</i> kan användas för att ta bort elementet på plats <i>index</i> ur en lista.
Exempelvis om vi vill ta bort det första elementet i listan skriver vi <i>frukter.pop(0)</i>.
Om vi vill ta bort det sista elementet räcker det att skriva <i>frukter.pop()</i>, utan argument används -1 som standardindex.
Funktionen <i>pop()</i> returnerar även det elementet som tagits bort ifall vi vill använda det.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Vi börjar med en tom lista, lägger till ett par element och tar bort första och sista. Klicka på att testa för att se vad listan innehåller vid de olika stegen.</p>
  <pre><code class="language-python">frukter = []
frukter.append('Äpple')
frukter.append('Banan')
frukter.append('Mango') #frukter = ['Äpple', 'Banan', 'Mango']

frukter.pop(0) #ta bort första elementet, 'Äpple'.
frukter.pop(-1) #ta bort sista elementet, 'Mango'.</code></pre>
  <div id="example-add-remove-code" class="hidden">frukter = []
frukter.append('Äpple')
frukter.append('Banan')
frukter.append('Mango') #frukter = ['Äpple', 'Banan', 'Mango']
print('frukter = ' + str(frukter))

frukter.pop(0) #ta bort första elementet, 'Äpple'.
print('frukter = ' + str(frukter))
frukter.pop(-1) #ta bort sista elementet, 'Mango'.
print('frukter = ' + str(frukter))
</div>
	<button type="button" id="example-add-remove" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En lista kan innehålla vilken datatyp som helst, till exempel heltal. Här skapas först en lista med tre heltal. Heltalet 20 läggs till i listan och sedan tas det andra heltalet i listan bort.</p>
  <pre><code class="language-python">tal = [10, 5, 35]
tal.append(20)
borta = tal.pop(1)
print('Vi tog bort talet ' + str(borta))</code></pre>
  <div id="example-tal-code" class="hidden">tal = [10, 5, 35]
tal.append(20)
print(tal)
borta = tal.pop(1)
print(tal)
print('Vi tog bort talet ' + str(borta))</div>
	<button type="button" id="example-tal" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("lista = []
lista.append('Volvo')
lista.append('Tesla')
lista.append('Audi')
lista.pop(1)
print(lista[1])"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'lists_quiz',
    'code' => $code,
    'options' => ['Volvo','Tesla', 'Audi'],
    'correct' => 3
])

<p>Det är bra att känna till att om listan är stor så är det ganska ineffektivt att till exempel ta bort och lägga till element i listan (förutom om det är i slutet av listan).
Om det ska göras ofta så finns det bättre datastrukturer som vi ska lära oss mer om senare.</p>

<h2>Listans längd</h2>
<p>För att se hur många element som finns i en lista kan vi använda hjälpfunktionen <i>len()</i> med listan som argument.
Det är till exempel användbart om vi vill loopa igenom hela listan med <i>while</i>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skriver ut varje element i listan på en egen rad. Passar också på att visa hur en lista kan skapas med ett element per rad.</p>
  <pre><code class="language-python">roliga_eng_ord = [
    'Shenanigans', 
    'Bamboozle', 
    'Bodacious', 
    'Brouhaha', 
    'Canoodle', 
    'Malarkey'
]

antal = len(roliga_eng_ord)
index = 0
while index < antal:
  print(roliga_eng_ord[index])
  index = index + 1</code></pre>
  <div id="example-X-code" class="hidden">roliga_eng_ord = [
    'Shenanigans', 
    'Bamboozle', 
    'Bodacious', 
    'Brouhaha', 
    'Canoodle', 
    'Malarkey'
]

antal = len(roliga_eng_ord)
index = 0
while index < antal:
  print(roliga_eng_ord[index])
  index = index + 1</div>
	<button type="button" id="example-X" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>I exemplet ovan är villkoret för att fortsätta loopen att <i>index < antal</i>.
Det är viktigt att <i>index</i> aldrig blir lika stort som <i>antal</i>.
 I listan <i>roliga_eng_ord</i> finns sex element.
Om vi försöker läsa utanför listan då <i>index = 6</i> med <i>roliga_eng_ord[6]</i> så stannar programmet och vi får ett felmeddelande.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Exempel på felmeddelande om vi försöker läsa av utanför listan. 
  Sista elementet läsas av med <span class="border">lista[5]</span>. <span class="border">lista[6]</span> resulterar i ett felmeddelande
  av typen IndexError.
  </p>
  <pre><code class="language-python">lista = [1, 2, 3, 4, 5, 6]
print( lista[5] ) #skriver ut 6
print( lista[6] ) #ger fel</code></pre>
  <div id="example-list-error-code" class="hidden">lista = [1, 2, 3, 4, 5, 6]
print( lista[5] ) #skriver ut 6
print( lista[6] ) #ger fel</div>
	<button type="button" id="example-list-error" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Finns elementet i listan?</h2>
<p>Med hjälp av <i>in</i> kan vi se om ett elemement finns i listan. Exempelvis är <i>5 in lista</i> <i>True</i> om 5 finns i listan.
Vi kan kombinera med <i>not</i> för att se om elementet <b>inte</b> finns med i listan.</p>
<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Vi skapar en lista med namn och testar sedan om namnet är med i listan eller inte. Testa gärna med andra namn.</p>
  <pre><code class="language-python">laget = ['Anton', 'Beatrice', 'Cecilia', 'David']

if 'Cecilia' in laget:
  print('Cecilia är med i laget.')

if 'Zlatan' not in laget:
  print('Zlatan är inte med i laget.')
  </code></pre>
  <div id="example-in-code" class="hidden">laget = ['Anton', 'Beatrice', 'Cecilia', 'David']

if 'Cecilia' in laget:
  print('Cecilia är med i laget.')

if 'Zlatan' not in laget:
  print('Zlatan är inte med i laget.')</div>
	<button type="button" id="example-in" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Testa dina kunskaper</h2>
<p>Nedan följer två uppgifter för att lära dig använda listor.</p>

<?php 
$correctInput = json_encode( array(array("4","7","10","1","2")) );
$correctOutput = json_encode( array(array("[1, 2, 7, 10]")) );
$code = json_encode( array("n = int(input('Hur många tal vill du skriva in?'))","","lista = []","","# använd input() n gånger", "# konvertera varje input till tal", "# lägg till talen en och en i en lista","","lista.sort()","print(lista)") );?>
@livewire('editor-modify-correct', [
    'editorId' => 'lists_modify_input',
    'code' => $code,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Ändra i koden',
    'add_code' => '',
    'text' => 'Programmet ska ta emot ett antal heltal från användaren, lägga dem i en lista och sedan skriva ut listan sorterad. För att sortera listan används <span class="border">lista.sort()</span>.',
    'tip_text' => 'Använd en while-sats som repeterar n gånger. Ta emot ett tal av användaren och lägg till i listan i varje iteration av loopen.'
])

<?php 
$correctInput = json_encode( array(array("0")) );
$correctOutput = json_encode( array(array("[1, 3, 2]") ));
?>
@livewire('editor-modify-correct', [
    'editorId' => 'lists_last_make',
    'code' => '',
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'wrong_text' => 'Fel tyvärr. Om ditt program skriver ut något när du trycker på kör, kommentera bort det före du trycker på rätta!',
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Filtrera ut positiva tal',
    'text' => 'Skriv en funktion med namn <span class="border">filter</span> som tar emot en lista i sitt enda argument. Returnera en ny lista som endast innehåller de positiva heltalen från den ursprungliga listan och i samma ordning.',
    'add_code' => 'print( filter( [-1, 1, 0, -3, 3, 2, 0] ) )',
    'tip_text' => 'Skapa en ny lista i funktionen som du sedan returnerar. Om <em>lista</em> är namnet på listan i argumentet så kan du skriva <span class="border">while i < len(lista):</span> om <span class="border">i = 0</span> från början. Glöm inte att öka i med ett inuti loopen! Gå igenom alla tal i listan och lägg till dem i den nya listan om de är större än 0.'
])

@endsection