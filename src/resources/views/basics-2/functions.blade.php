@extends('template-section')
@section('title', 'Funktioner i Python')
@section('description', 'I det här avsnittet lär vi oss hur vi skapar funktioner med och utan argument och hur vi sedan anropar dem.')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])
<h1>Funktioner</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Skapa funktioner med och utan argument</li>
    <li>Returna ett värde från en funktion</li>
    <li>Anropa funktioner</li>
</ul>

<h2>Vad är en funktion?</h2>
<p>En funktion är ett block kod som <b>utför en viss uppgift</b>. Funktionen kan, men behöver inte, ta emot ett antal parametrar som indata.
Funktionen kan också, men behöver inte, returnera något värde som kan användas där funktionen anropades.<p>

<p>I programmering vill vi undvika att skriva samma kod på flera ställen. Med funktioner kan du skriva koden på en plats och sedan använda den om och om igen.
I många situationer kan det också vara bra med funktioner även om de inte ska användas på flera ställen för att göra <b>koden mer läsbar</b>.
Funktioner gör också att koden blir <b>enklare att testa</b> så att den fungerar korrekt.</p>

<p>En <b>bra funktion</b> är en funktion som har endast <b>en</b> tydligt definierad uppgift. Det gör att den är enkel att förstå och enkel att testa. 
Funktionen ska inte hämta information utifrån mer än vad som anges i parametrarna.</p>

<!-- retur parametrar 
default värde på parameter
avstånd mellan två punkter
-->


<h2>Definiera och anropa en enkel funktion</h2>
<p>Vi börjar med att definiera en enkel funktion som bara skriver ut en sträng. Det görs med det reserverade ordet <i>def</i> (förkortning av engelskans <b>define</b>). 
Vi skriver <i>def funktionens_namn():</i> för att definiera en funktion som inte tar emot några parametrar (kallas också argument).
Vi ska senare se hur vi använder utrymmet inom parentesen för att få funktionen att ta emot data.
Indentering används sedan för att visa vilka rader som tillhör funktionen.

<p>Var som helst i koden <b>efter</b> att funktionen är definierad, kan vi anropa funktionen så här <i>funktionens_namn()</i>. 
Viktigt att komma ihåg att funktionen måste vara definierad först, annars känner Python inte igen namnet.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En enkel funktion som skriver en rad text. Funktionen anropas på sista raden.</p>
  <pre><code class="language-python">def enkel_funktion():
    print('hej från funktionen')
    
enkel_funktion()</code></pre>
  <div id="example-simple-function-code" class="hidden">def enkel_funktion():
    print('hej från funktionen')
    
enkel_funktion()</div>
	<button type="button" id="example-simple-function" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php 
$correctInput = json_encode( array(array("0")) );
$correctOutput = json_encode( array(array("Hej!", "Hej!")) );
?>
@livewire('editor-modify-correct', [
    'editorId' => 'functions-first',
    'code' => '',
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'En enkel funktion',
    'add_code' => 'min_funktion()',
    'text' => 'Definiera en funktion med namn <span class="border">min_funktion</span> som skriver ut <span class="border">Hej!</span> på en rad. Avsluta med att anropa funktionen.',
    'tip_text' => 'Se exemplet ovanför uppgiften. Du ska skriva likadant förutom att funktionen har ett annat namn och att texten som skrivs ut är annorlunda.'
])

<h2>Parameter och returvärde</h2>
<p>De flesta funktioner tar emot värden, så kallade <b>parametrar</b> eller <b>argument</b>.  Dessa argument bearbetas i funktionen, exempelvis för att räkna ut något.
Därefter är det vanligt att funktionen <b>returnerar</b> något värde.
Att ett värde returneras betyder att det skickas tillbaka dit där anropet gjordes. Det reserverade ordet <i>return</i> är till för att returnera värden. 
I exemplet nedan tittar vi på en funktion som tar emot ett värde (en radie) och returnerar ett bearbetat värde (en area).</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Funktionen nedan tar emot en radie på en cirkel och räknar sedan ut arean. 
  Klicka på testa för att se hur funktionen kan användas.</p>
  <pre><code class="language-python">def area_cirkel(radie):
    area = 3.14 * radie * radie
    return area
</code></pre>
  <div id="example-area-circle-code" class="hidden">def area_cirkel(radie):
    area = 3.14 * radie * radie
    return area
  
#Vi vill räkna ut arean på en cirkel som har radien 3.
A = area_cirkel(3)
print(A) #för att se resultatet</div>
	<button type="button" id="example-area-circle" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Variablerna <span class="border">radie</span> och <span class="border">area</span> ovan existerar bara inuti funktionen, 
därför skulle det inte vara ett problem att använda dessa variabelnamn utanför funktionen utan att de påverkar varandra.</p>

<?php 
$correctInput = json_encode( array(array("42")) );
$correctOutput = json_encode( array(array("Radien på cirkeln är 6.687898089171974")) );
$code = json_encode( array("def omkrets_till_radie(): #ändra här","    omkrets = 10 #ändra här","    radie = omkrets / (2 * 3.14)","    return radie","","omkrets = float(input('Skriv in omkretsen på cirkeln:'))","radie = omkrets_till_radie() #ändra här","print('Radien på cirkeln är ' + str(radie))") );?>

@livewire('editor-modify-correct', [
    'editorId' => 'functions_modify_circle',
    'code' => $code,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Ändra i koden',
    'add_code' => '',
    'text' => 'Vi vill ha ett program som tar en cirkels omkrets från användaren och skriver ut radien på cirkeln. Just nu kan funktionen bara räkna ut radien på en cirkel med omkrets = 10 och det spelar ingen roll vad användaren skriver in. Ändra i programmet så att det gör vad det ska.',
    'tip_text' => 'Du behöver ändra på de tre platser där det står "ändra här". Funktionen ska ha <b>ett</b> argument: <span class="border">omkrets</span>. När funktionen anropas på rad 7 behöver argumentet sedan skrivas in inuti parentesen.'
])

<h2>Flera parametrar</h2>
<p>Det går utmärkt att definiera en funktion som tar emot flera argument. En funktion med tre argument definieras på följande sätt:</p>
<p><i>def funktionens_namn(arg_1, arg_2, arg_3):</i></p>
<p>där <i>arg_1</i>, <i>arg_2</i> och <i>arg_3</i> är olika parametrar. 
De kan vara av olika datatyper och i Python kan ett argument vara av olika typer vid olika anrop, till exempel <i>float</i> vid ett tillfälle och <i>int</i> vid ett annat.
Notera att argumenten separeras med kommatecken.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Funktionen <span class="border">avstånd</span> beräknar avståndet mellan två punkter, (x1, y1) och (x2, y2). 
  Argumenten till funktionen är x1, y1, x2 och y2.
  Klicka på testa för att se hur funktionen kan användas.</p>
  <pre><code class="language-python">def avstånd(x1, y1, x2, y2):
    avstånd_i_kvadrat = (x1 - x2)**2 + (y1 - y2)**2 
    return avstånd_i_kvadrat ** 0.5
</code></pre>
  <div id="example-multiple-arguments-code" class="hidden">def avstånd(x1, y1, x2, y2):
    avstånd_i_kvadrat = (x1 - x2)**2 + (y1 - y2)**2 
    return avstånd_i_kvadrat ** 0.5
  
#Vi vill räkna ut avståndt mellan (1,1) och (2,2)
avståndet = avstånd(1, 1, 2, 2)
print(avståndet) #för att se resultatet</div>
	<button type="button" id="example-multiple-arguments" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php 
$correctInput = json_encode( array(array("0")) );
$correctOutput = json_encode( array(array("20") ));
?>
@livewire('editor-modify-correct', [
    'editorId' => 'functions-make-parameters',
    'code' => '',
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'wrong_text' => 'Fel tyvärr. Om ditt program skriver ut något när du trycker på kör, kommentera bort det före du trycker på rätta!',
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Omkretsen på en rektangel',
    'text' => 'Skriv en funktion med namn <span class="border">omkrets_rektangel</span> som har två argument, bredden och höjden på en rektangel. Returnera omkretsen på rektangeln. <b>Obs!</b> När du tycker kör ska programmet inte skriva ut något eftersom du inte ska anropa funktionen.',
    'add_code' => 'print( omkrets_rektangel(7,3) )',
    'tip_text' => 'I exemplet ovanför finns en liknande funktion. Ändra antalet argument och ändra i beräkningen. Du behöver lista ut hur omkretsen av en rektangel beräknas när man vet bred och höjd.'
])

<p>Till skillnad från många andra programmeringsspråk går det att anropa en funktion med argumenten i en annan ordning än den i definitionen. 
Det går att göra om funktionen anropas med argumenten namngivna. Se exemplet nedan.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Anropa en funktion med argumenten i en annan ordning genom att namge dem vid anrop. </p>
  <pre><code class="language-python">def funktion(a, b):
  print('a = ' + str(a))
  print('b = ' + str(b))

funktion('ett', 'två')
funktion(b = 'ett', a = 'två')</code></pre>
  <div id="example-arg-order-code" class="hidden">def funktion(a, b):
  print('a = ' + str(a))
  print('b = ' + str(b))

print('Vanlig ordning:')
funktion('ett', 'två')
print('Omvänd ordning:')
funktion(b = 'ett', a = 'två')</div>
	<button type="button" id="example-arg-order" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Slutligen, även om det går att skriva program utan funktioner är de ändå en fundamental del av programmering. Ett större program utan funktioner går inte att överskåda.
Funktioner behövs för att göra det läsbart och hanterbart.</p>

@endsection
