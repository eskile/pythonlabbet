@extends('template-section')
@section('title', 'Variabler och datatyper i Python')
@section('description', 'Lär dig använda variabler i Python och om datatyper som strängar, heltal, decimalt och om omvandlingen mellan dessa.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/Ic9FvtZvBNY" title="Variabler" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<h1 class="mt-5">Variabler och datatyper</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig</p>
<ul>
    <li>Vad en variabel är och hur du skapar en</li>
    <li>Om olika datatyper och konverteringar mellan dem</li>
</ul>

<h2>Variabler - att spara data</h2>
<p>En <b>variabel</b> är till för att spara data och <b>används överallt</b> inom programmering. 
Ofta sparas strängar eller tal, men det kan också vara andra mer komplicerade datastrukturer och objekt.
</p>
<p>
En <b>variabel</b> är till för att <b>komma ihåg</b> någonting under tiden programmet körs, till exempel ett resultat av en beräkning så att detta sedan kan återanvändas på andra ställen i programmet. 
Det är också vanligt att använda variabler för att spara inmatningar från användaren eller data som har lästs från en fil. </p>

<p>Variabler <b>används överallt</b> inom programmering. 
Namnet variabel kommer av att programmet kan ändra (variera) innehållet i en variabel under programmets körning. 
Det som läggs i en variabel sparas i datorns arbetsminne och försvinner när programmet inte längre kör.
</p>
<p>För att <b>skapa en variabel</b> används <i>=</i> (likhetstecken), till vänster om likhetstecknet står <b>variabelnamnet</b> och till höger om likhetstecknet står <b>värdet</b> som ska sparas i variablen.
Viktigt här är att förstå skillnaden mellan <i>=</i> inom matematiken (är lika med) och i Python (tilldela värde till variabel).
Det går bra att använda <i>print(min_variabel)</i> för att skriva ut innehållet i variabeln.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Strängen <span class="border">Hello World</span> sparas i variabeln med namnet <span class="border">min_variabel</span>.</p>
  <pre><code class="language-python">min_variabel = 'Hello World'</code></pre>
  <div id="example-set-variable-code" class="hidden">min_variabel = 'Hello World'
  
print(min_variabel)</div>
	<button type="button" id="example-set-variable" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Det är viktigt att <b>skriva bra variabelnamn</b>. Namnet ska beskriva informationen som är sparad i variablen. 
Med bra variabelnamn är programmet enklare att förstå och det blir lättare att göra rätt. Det tar lång tid att lära sig skriva bra variabelnamn så misströsta inte om du tycker det är svårt!
I Python är konventionen att skriva variabler med små bokstäver och med _ för att separera ord.
</p>

<?php $code = trim(json_encode("text1 = 'Första'
text2 = 'Andra'
print(text1 + ' ' + text2)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'variables_predict_add',
    'code' => $code,
    'options' => ['FörstaAndra',
'Första Andra'],
    'correct' => 2,
    'correct_text' => 'Rätt! <span class="border">\'&nbsp;&nbsp;\'</span> är en sträng som bara innehåller ett mellanrum.'
])

<h2>Datatyper</h2>
<p>Datorer måste skilja på olika typer av variabler, som till exempel strängar (text) och tal. Det beror på att de sparas på olika sätt i datorns minne. 
Exempelvis <b>representeras</b> talet <i>1</i> och strängen <i>'1'</i> på olika sätt i minnet.
</p>

<p>Vi har redan använt tre vanliga variabeltyper, <b>strängar</b> (eng: string), <b>heltal</b> (eng: integer) och <b>flyttal</b> (eng: float). 
Flyttal (uttalas flyt-tal) är det vanligaste sättet för en dator att representera tal som har decimalkomma.</p>

@if(!request()->session()->get('easy_mode'))
<p>När du skapar en variabel räknar Python ut vilken <b>typ</b> variabeln är. I många programmeringsspråk måste du istället berätta vilken typ en variabel är när du skapar den och sedan går det inte att ändra
vilken typ variabeln är. I Python går det till exempel att först spara en sträng i en variabel för att senare spara ett tal i samma variabel.</p>
@endif

<p>Den inbyggda funktionen <i>type</i> kan användas för att se vilken typ en variabel har, se exemplet nedan.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Först skapas tre olika variabler med typerna sträng, heltal och flyttal. Sedan skapas ytterligare tre variabler som innehåller vilken typ de första tre variablerna har.</p>
  <pre><code class="language-python">min_text = 'Hej hej' #sträng
mitt_favorittal = 1337 #heltal
pi = 3.14 #flyttal

min_text_typ = type(min_text)
mitt_favorittal_typ = type(mitt_favorittal)
pi_typ = type(pi)</code></pre>
  <div id="example-three-types-code" class="hidden">min_text = 'Hej hej'
mitt_favorittal = 1337
pi = 3.14

min_text_typ = type(min_text)
mitt_favorittal_typ = type(mitt_favorittal)
pi_typ = type(pi)

print(min_text_typ)
print(mitt_favorittal_typ)
print(pi_typ)</div>
	<button type="button" id="example-three-types" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Konvertering mellan olika typer</h2>
<p>Hjälpfunktionerna <i>str</i>, <i>int</i> och <i>float</i> finns till för att konvertera de tre typerna ovan mellan varandra. Till exempel används <i>int</i> för att omvandla en variabel till typen heltal.
Observera att det inte alltid fungerar, till exempel går inte strängen <i>'hej'</i> att konvertera till varken ett heltal eller ett flyttal.
</p>
<p>
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Några vanliga typkonverteringar.</p>
  <pre><code class="language-python">heltal = int('42') #strängen 42 blir heltalet 42
flyttal = float(10) #heltalet 10 blir flyttalet 10.0
text = str(3.14) #flyttalet 3.14 blir strängen 3.14
  </code></pre>
  <div id="example-type-converting-code" class="hidden">heltal = int('42')
flyttal = float(10)
text = str(3.14)

print(heltal)
print(flyttal)
print(text)</div>
	<button type="button" id="example-type-converting" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>
För att kunna lägga ihop en sträng och till exempel ett heltal måste vi göra en konvertering. 
<p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Lägga ihop en sträng med ett heltal.</p>
  <pre><code class="language-python">x = 12
x_text = 'Värdet på x är lika med ' + str(x)
  </code></pre>
  <div id="example-str-convert-code" class="hidden">x = 12
x_text = 'Värdet på x är lika med ' + str(x)

print(x_text)</div>
	<button type="button" id="example-str-convert" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

@if(request()->session()->get('easy_mode'))
<?php $code = json_encode( array("x = 0.5 + 1
y = 8.5
print('x + y = ' + float(x + y))") );?>
@livewire('editor-modify', [
    'editorId' => 'variables_modify',
    'code' => $code,
    'correctAnswer' => array("x + y = 10.0"),
    'text' => 'På rad 3 finns ett fel. Det går inte att använda + mellan en sträng och en float. Ändra i koden så att + är mellan två strängar.',
    'tip_text' => 'Typkonvertera med <span class="border">str</span> istället för med <span class="border">float</span>.'
])
@else
<?php $code = json_encode( array("x = 0.5 + 1
y = 8.5
print('x + y = ' + float(x + y))") );?>
@livewire('editor-modify', [
    'editorId' => 'variables_modify',
    'code' => $code,
    'correctAnswer' => array("x + y = 10.0"),
    'text' => 'Koden nedan innehåller ett fel. Kör programmet och se vad felmeddelandet blir. Fixa sedan koden och kör programmet igen.',
    'tip_text' => 'Det går att inte att lägga ihop en sträng med ett flyttal. Typkonvertera med <span class="border">str</span> istället för med <span class="border">float</span>.'
])
@endif

<p>
Den inbyggda funktionen <i>print</i> kan ta emot olika typer i sitt <b>argument</b> (det som står innanför parenteserna på en funktion kallas argument).
Print-funktionen konverterar automatiskt argumentet till en sträng. Om du skriver exempelvis <i>print(5)</i> så konverteras automatiskt <b>talet</b> 5 till en sträng.
</p>

<h2>Avrundning</h2>
<p>Om ett flyttal konverteras till ett heltal med hjälp av <i>int</i> tas helt enkelt decimalerna bort.</p>
<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Flyttal till heltal med <span class="border">int</span>.</p>
  <pre><code class="language-python">x = int(3.99)  #x = 3
  </code></pre>
  <div id="example-float-to-int-code" class="hidden">x = int(3.99)
print(x)
  </div>
	<button type="button" id="example-float-to-int" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Med den inbyggda funktionen <i>round</i> kan vi istället <b>avrunda</b> ett flyttal till ett heltal.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Flyttal till heltal med <span class="border">round</span>.</p>
  <pre><code class="language-python">x = round(3.99) #x = 4
  </code></pre>
  <div id="example-rounded-float-code" class="hidden">x = round(3.99)
print(x)
  </div>
	<button type="button" id="example-rounded-float" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Med hjälp av <i>round</i> går det också bra att avrunda till ett valfritt antal decimaler. Inuti parentesen skriver vi först talet som ska avrundas, följt av ett <b>komma</b> <i>,</i> och sedan hur många decimaler vi vill avrunda till.</p>
<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Avrunda till två och fyra decimaler.</p>
  <pre><code class="language-python">x = round(1.23456, 2)  #x = 1.23
y = round(1.23456, 4)  #y = 1.2346
  </code></pre>
  <div id="example-round-decimals-code" class="hidden">x = round(1.23456, 2)
y = round(1.23456, 4)
print(x)
print(y)
  </div>
	<button type="button" id="example-round-decimals" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = json_encode( array("from math import pi
x = pi
print(x)") );?>
@livewire('editor-modify', [
    'editorId' => 'variables-round',
    'code' => $code,
    'correctAnswer' => array("3.1416"),
    'title' => 'Ändra i koden',
    'text' => 'Koden nedan skriver ut pi med många decimaler. Ändra så att pi skrivs ut avrundat till fyra decimaler.',
    'tip_text' => 'Använd <span class="border">round(pi, 4)</span>.'
])

@endsection
