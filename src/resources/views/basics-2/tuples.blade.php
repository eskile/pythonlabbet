@extends('template-section')
@section('title', 'Tupler i Python | pythonlabbet.se')
@section('description', 'Tupler är är väldigt lika listor i Python. Den stora skillnaden är att tupler är oföränderliga.')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])

<h1>Tupler</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig</p>
<ul>
    <li>Vad en tupel är och varför de finns</li>
    <li>Hur tupler kan användas för att förenkla Python-programmering</li>
</ul>

<h2>Vad är en tupel och varför används tupler?</h2>

<p>Tupler är mycket lika listor i Python. Precis som listor har de en ordning och de kan innehålla dubbletter och olika typer.
Men det finns en viktig skillnad, och det är är <b>en tupel inte går att ändra</b>, den är oföränderlig (engelska: immutable).</p>

<p>Eftersom en tupel inte går att ändra kan Python använda tupler effektivare än listor. 
    De tar mindre plats i minnet till exempel.
Tuplers oföränderlighet gör också att de kan användas med lexikon och mängder, som vi ska se i senare avsnitt.</p>

<p>Nu ska vi visa hur en <b>tupel skapas</b>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skapar en enkel tupel med två värden. Parenteser måste inte skrivas ut men det rekommenderas. </p>
  <pre><code class="language-python">min_tupel = (3, 5) #kan också skrivas utan parenteser: 3, 5</code></pre>
  <div id="example-create-tuple-code" class="hidden">min_tupel = (3, 5) #kan också skrivas utan parenteser: 3, 5

print(min_tupel)
  </div>
	<button type="button" id="example-create-tuple" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Flera saker som går att göra med listor går också att göra med tupler.</p>
  <pre><code class="language-python">min_tupel = (2, 3, 5, 7, 11)

print(min_tupel[0]) #skriv ut det första elementet
print(min_tupel[0:3]) #de första tre elementen
print(5 in min_tupel) #finns 5 i tupeln?
  </code></pre>
  <div id="example-tuple-ops-code" class="hidden">min_tupel = (2, 3, 5, 7, 11)

print(min_tupel[0]) #skriv ut det första elementet
print(min_tupel[0:3]) #de första tre elementen
print(5 in min_tupel) #finns 5 i tupeln? True eller False
  </div>
	<button type="button" id="example-tuple-ops" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Däremot går det <b>inte</b> att ändra i en tupel som sagt. Följande exempel visar hur felmeddelandet ser ut.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ett felmeddelande skrivs ut och programmet avslutas om man försöker ändra i en tupel.</p>
  <pre><code class="language-python">tupel = ('a','a','c')
tupel[1] = 'b' #FEL
  </code></pre>
  <div id="example-error-code" class="hidden">tupel = ('a','a','c')
tupel[1] = 'b' #FEL</div>
	<button type="button" id="example-error" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = json_encode( array("alla_kast = []","for i in range(1,7):","    for j in range(1,7):","        for k in range(1,7):","            kast = (i, j, k)","            alla_kast.append(kast)","","#Ändra härifrån och nedåt", "for kast in alla_kast:","    print(kast)","","","","","","")
 );?>
@livewire('editor-modify', [
    'editorId' => 'tuples-dices-modify',
    'code' => $code,
    'correctAnswer' => array("15"),
    'title' => 'Tre tärningskast',
    'text' => 'Koden nedan genererar alla möjliga resultat av tre träningskast. Listan <span class="border">alla_kast</span> består av tupler med tre värden. Dessa tre värden representerar resultatet av ett kast med tre tärningar.<p>Listan innehåller alla 216 möjligheter. Hur många av dessa ger tärningssumman 7? Skriv endast ut antalet för att få rätt.</p>',
    'tip_text' => 'Inuti loopen som börjar på rad 9 behöver du testa om innehållet i <em>kast</em> summeras till 7.'
])

<h2>Några knep med tupler</h2>
<p>Tupler kan användas för att enkelt skapa flera variabler med olika värden på samma rad.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skapa flera variabler på en rad med tupler-syntax. Vi utnyttjar att parenteser inte är nödvändigt.</p>
  <pre><code class="language-python">namn, ålder, språk = 'Emil', 38, 'Python'</code></pre>
  <div id="example-variables-code" class="hidden">namn, ålder, språk = 'Emil', 38, 'Python'

print(namn, ålder, språk)
  </div>
	<button type="button" id="example-variables" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Tack vare den här syntaxen är det enkelt att byta värde mellan två variabler. I de flesta programmeringsspråk krävs en tredje temporär variabel. 
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Byt värden mellan två variabler.</p>
  <pre><code class="language-python">a, b = 'a', 'b'
a, b = b, a #byte av värden
  </code></pre>
  <div id="example-swap-code" class="hidden">a, b = 'a', 'b'
print('Innan:', a, b)
a, b = b, a #byte av värden
print('Efter:', a, b)</div>
	<button type="button" id="example-swap" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Ett vanlig användning av tupler är som ett sätt att låta funktioner returnera flera värden.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En funktion som returnerar två värden i en tupel, omkretsen och arean av en rektangel. Även här använder vi en tupel utan parenteser för att det är så det brukar skrivas.</p>
  <pre><code class="language-python">def rektangel(bredd, höjd):
    omkrets = 2*bredd + 2*höjd
    area = bredd * höjd
    return omkrets, area
  </code></pre>
  <div id="example-function-return-code" class="hidden">def rektangel(bredd, höjd):
    omkrets = 2*bredd + 2*höjd
    area = bredd * höjd
    return omkrets, area
  
b = float(input('Skriv rektangelns bredd.'))
h = float(input('Skriv rektangelns höjd.'))

O, A = rektangel(b, h)
print('Omkretsen är', O)
print('Arean är', A)
</div>
	<button type="button" id="example-function-return" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = json_encode( array() );?>
<?php $code = trim(json_encode("def funktion(a, b):
    if a > b:
        return a, b
    else:
        return b, a

x = funktion(5, 3)
y = funktion(3, 5)

print(x, y)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'tuples-predict-function',
    'code' => $code,
    'options' => ['(3, 5) (3, 5)','(3, 5) (5, 3)', '(5, 3) (3, 5)','(5, 3) (5, 3)'],
    'correct' => 4
])

@endsection
