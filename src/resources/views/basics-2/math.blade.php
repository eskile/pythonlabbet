@extends('template-section')
@section('title', 'Matematiska funktioner och modulen math i Python')
@section('description', 'Lär dig om enkla inbyggda matematiska funktioner och mer avancerade funktioner som finns i modulen math.')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])

<h1>Matematiska funktioner</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Om inbyggda matematiska funktioner</li>
    <li>Om fler funktioner i modulen <i>math</i></li>
</ul>

<h2>Inbyggda matematiska funktioner</h2>
<p>Python har många inbyggda funktioner. De behöver inte importeras från någon modul.
    Vi har redan stött på ett flertal och här ska vi bekanta oss med fler.</p>

<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Funktion</th>
        <th class="pr-24 text-left">Beskrivning</th>
        <th class="text-left pl-8">Exempel</th>
    </tr>
    <tr class="border-b">
        <td>abs()</td>
        <td>Absolutbeloppet av</td>
        <td class="pl-8"><i>abs(-5) = 5</i></td>
    </tr>
    <tr class="border-b">
        <td>round()</td>
        <td>Avrundar till heltal</td>
        <td class="pl-8"><i>round(3.14) = 3</i></td>
    </tr>
    <tr class="border-b">
        <td>sum()</td>
        <td>Summan av</td>
        <td class="pl-8"><i>sum([1,2,3]) = 6</i></td>
    </tr>
    <tr class="border-b">
        <td>min()</td>
        <td>Ger minsta talet</td>
        <td class="pl-8"><i>min([5,3,7]) = 3</i></td>

    </tr>
    <tr class="border-b">
        <td>max()</td>
        <td>Ger största talet</td>
        <td class="pl-8"><i>max([5,3,7]) = 7</i></td>

    </tr>
    
</table>

<p>De två förstnämnda, <i>abs</i> och <i>round</i>, fungerar på tal. 
Att ta abolutbeloppet av ett tal innebär att minustecknet tas bort om det är ett negativt tal. 
Om det är ett positivt tal får vi tillbaka samma tal utan att något hänt. 
Skriver vi <i>abs(x - y)</i> kan det tolkas som avståndet mellan talen <i>x</i> och <i>y</i>. Avstånd är alltid positiva.
</p>
<p>De tre sistnämnda i tabellen fungerar på objekt som går att iterera över, till exempel på listor och tupler.
Enklare sagt fungerar <i>sum</i>, <i>min</i> och <i>max</i> på objekt som vi kan "loopa igenom" med en for-sats.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Inbyggda matematiska funktioner.</p>
  <pre><code class="language-python">l = [2, 3, 5, 7, 11]

summa = sum(l)
minsta = min(l)
största = max(l)
  </code></pre>
  <div id="example-builtin-code" class="hidden">l = [2, 3, 5, 7, 11]

summa = sum(l)
minsta = min(l)
största = max(l)

print('Summan:', summa)
print('Minsta talet:', minsta)
print('Största talet:', största)</div>
	<button type="button" id="example-builtin" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("x = 4.2
y = 5
t = (5,3,1)
print( round( abs(x - y) ) - abs( min(t) - max(t) ) )"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'math-builtin-predict',
    'code' => $code,
    'options' => ['-5','-3', '0', '3', '5'],
    'correct' => 2
])

<h2>Modulen math</h2>
<p>För att få tillgång till modulen math kan vi skriva <i>import math</i>.
För att till exempel använda konstanten \(\pi\) skrivs <i>math.pi</i>.
Ett annat sätt att skriva är <i>from math import pi</i> och då räcker det att skriva <i>pi</i>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Importera hela modulen <span class="border">math</span> och skriv ut <span class="border">math.pi</span>.</p>
  <pre><code class="language-python">import math
print(math.pi)
  </code></pre>
  <div id="example-import-math-code" class="hidden">import math
print(math.pi)</div>
	<button type="button" id="example-import-math" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>En annan användbar "konstant" i math-modulen är <i>inf</i> som står för oändligheten.
Eftersom alla tal är mindre en denna konstant kan den användas som ett första värde i en variabel som ska hålla reda på ett minsta värde.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Användaren skriver in tre tal och vi håller reda på vilket som är det minsta inskrivna.</p>
  <pre><code class="language-python">from math import inf

minsta = inf
for i in range(3):
    tal = int(input('Skriv in ett tal.'))
    if tal < minsta:
        minsta = tal

print('Det minsta talet du skrev in är', minsta)</code></pre>
  <div id="example-inf-code" class="hidden">from math import inf

minsta = inf
for i in range(3):
    tal = int(input('Skriv in ett tal.'))
    if tal < minsta:
        minsta = tal

print('Det minsta talet du skrev in är', minsta)</div>
	<button type="button" id="example-inf" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Om vi istället vi hålla reda på vilket som är det största talet kan vi börja med att initialisera en variabel <i>största = -inf</i> istället.</p>

<p>I math-modulen finns också flera <b>funktioner</b>.
Många funktioner är för avancerad matematik och en del passar för gymnasiematematik. 
De två enklaste funktionerna är <i>ceil()</i> som avrunder uppåt och <i>floor()</i> som avrundar nedåt.</p>

<p>I tabellen nedan är ett par av de vanligaste funktionerna i <i>math</i> listade.</p>
<!-- konstanter (pi, e, inf). sin, cos, ceil, floor, factorial, log10,  -->
<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Funktion</th>
        <th class="pr-24 text-left">Beskrivning</th>
        <th class="text-left pl-8">Exempel</th>
    </tr>
    <tr class="border-b">
        <td>ceil()</td>
        <td>Avrundar uppåt</td>
        <td class="pl-8"><i>ceil(4.2) = 5</i></td>
    </tr>
    <tr class="border-b">
        <td>floor()</td>
        <td>Avrundar nedåt</td>
        <td class="pl-8"><i>floor(4.2) = 4</i></td>
    </tr>
    <tr class="border-b">
        <td>sin()</td>
        <td>Sinus</td>
        <td class="pl-8"><i>sin(pi/2) = 1.0</i></td>
    </tr>
    <tr class="border-b">
        <td>cos()</td>
        <td>Cosinus</td>
        <td class="pl-8"><i>cos(pi/2) = 0.0</i></td>
    </tr>
    <tr class="border-b">
        <td>factorial()</td>
        <td>Fakultet</td>
        <td class="pl-8"><i>factorial(5) = 120</i></td>
    </tr>
    <tr class="border-b">
        <td>log10()</td>
        <td>Logaritmen</td>
        <td class="pl-8"><i>log10(100) = 2.0</i></td>
    </tr>
</table>

<p>På Python officiella sida går det att se <a target="_tab" class="text-green-500 hover:underline" href="https://docs.python.org/3/library/math.html">alla funktioner och konstanter i modulen math</a>.</p>

<?php $code = json_encode( array("from math import pi","","radie = math.pi","omkrets = 2*radie*math.pi","","print(omkrets)") );?>
@livewire('editor-modify', [
    'editorId' => 'math-modify',
    'code' => $code,
    'correctAnswer' => array("19.73920880217872"),
    'title' => 'Ändra i koden',
    'text' => 'Vi vill räkna ut hur stor omkrets en cirel med radien \(\pi\) har. Koden fungerar inte som den ser ut nu. Fixa det!',
    'tip_text' => '<span class="border">math.pi</span> kan inte användas eftersom vi endast importerat <span class="border">pi</span>. Du kan t.ex. ändra så att hela modulen <span class="border">math</span> importeras.'
])

@endsection
