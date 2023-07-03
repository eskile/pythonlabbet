@extends('template-section')
@section('title', 'For-satsen - repetitioner med for i Python')
@section('description', 'Ett alternativ till while är att använda for. Det är speciellt användbart för listor och när vi vill räkna upp en variabel.')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])
<h1>for-satsen</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig</p>
<ul>
    <li>Gå igenom alla element i en lista med <i>for</i></li>
    <li>Iterera igenom en sträng</li>
    <li>Använda <i>range()</i> med olika antal argument</li>
    <li>Om nästlade loopar</li>
</ul>

<h2>Iterera igenom lista med for</h2>
<p>Att <b>iterera</b> genom en lista betyder att listan gås igenom element för element. 
Egentligen betyder iterera att upprepa och uttrycket kommer ifrån att vi upprepar samma sak för varje element i listan.</p>

<p>Syntaxen är <i>for variabel in lista:</i> där <i>variabel</i> är ett valfritt variabelnamn och <i>lista</i> är en lista. 
Intenderat nedanför skrivs koden som ska utföras för varje element.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En enkel iteration av en lista där varje element skrivs ut.</p>
  <pre><code class="language-python">lista = ['Grön', 'Röd', 'Blå']
for färg in lista:
    print(färg)</code></pre>
  <div id="example-for-list-code" class="hidden">lista = ['Grön', 'Röd', 'Blå']
for färg in lista:
    print(färg)</div>
	<button type="button" id="example-for-list" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Här visas hur vi kan testa varje element och som i exemplet räkna antalet element större än 10.</p>
  <pre><code class="language-python">tal_lista = [44, -2, 19, 5, 30, 10]
antal = 0
for tal in tal_lista:
    if tal > 10:
        antal = antal + 1

print(antal)
    </code></pre>
  <div id="example-for-numbers-code" class="hidden">tal_lista = [44, -2, 19, 5, 30, 10]
antal = 0
for tal in tal_lista:
    if tal > 10:
        antal = antal + 1

print(antal)</div>
	<button type="button" id="example-for-numbers" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>I tidigare avsnitt har vi använt <i>while</i> för att iterera igenom en lista. Det fungerar lika bra men i fallet ovan där vi ska gå igenom hela listan är syntaxen smidigare med <i>for</i>.
Vi ska snart se hur <i>for</i> är enkelt att använda när vi vill göra en upprepning ett visst antal gånger.</p>

<?php $code = json_encode( array("namn = ['Christine', 'Emil', 'Leo', 'Tanja']", "for while in namn:", "    if namn <= 'E':", "        print(namn)") );?>
@livewire('editor-modify', [
    'editorId' => 'for_error_modify',
    'code' => $code,
    'correctAnswer' => array("Christine"),
    'title' => 'Ändra i koden',
    'text' => 'Koden innehåller ett antal fel som behöver rättas till. Ändra så att koden skriver ut namnen som ligger före E i bokstavsordning.',
    'tip_text' => '<span class="border">while</span> på rad 2 måste bytas ut mot ett variabelnamn. Använd sedan detta variabelnamn på rad 3 och rad 4.'
])

<h2>Iterera igenom en sträng</h2>
<p>På samma sätt som det går att iterera igenom en lista går det att iterera igenom en sträng, tecken för tecken, med <i>for</i>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Iterera igenom alla tecken i en sträng.</p>
  <pre><code class="language-python">sträng = 'Iterera mera'
for tecken in sträng:
    print(tecken)
  </code></pre>
  <div id="example-for-str-code" class="hidden">sträng = 'Iterera mera'
for tecken in sträng:
    print(tecken)</div>
	<button type="button" id="example-for-str" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Med hjälp av <i>enumerate()</i> kan vi också få en variabel som håller reda på vilken iteration i ordningen vi är på.
Denna variabel fungerar alltså som en räknare och den börjar på 0 och räknas upp med ett för varje iteration. 
Exemplet nedan visar för strängar, men det fungerar bra på alla sorts objekt som det går att iterera över.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Iteration med for och enumerate.</p>
  <pre><code class="language-python">sträng = 'Iterera mera'
for i, tecken in enumerate(sträng):
    print('Index ' + str(i) + ': ' + str(tecken))
  </code></pre>
  <div id="example-enumerate-code" class="hidden">sträng = 'Iterera mera'
for i, tecken in enumerate(sträng):
    print('Index ' + str(i) + ': ' + str(tecken))</div>
	<button type="button" id="example-enumerate" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php 
$correctInput = json_encode( array(array("emil är"), array("EMIL ÄR")) );
$correctOutput = json_encode( array(array("3"), array("3") ));
$code = json_encode( array("vokaler = ['a','A','e','E','i','I','o','O','u','U','y','Y','å','Å','ä','Ä','ö','Ö']", "", "#tips: för att se om ett tecken är en vokal skriv t.ex.:", "#if tecken in vokaler:") );?>
@livewire('editor-modify-correct', [
    'editorId' => 'for-make-vocals',
    'code' => $code,
    'rows' => 10,
    'showReset' => true,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv ett program som tar emot en sträng från användaren och sedan räknar ut hur många vokaler strängen innehåller. Skriv ut det antalet.',
    'tip_text' => 'Ta emot en sträng från användaren med <span class="border">input</span>. Gå sedan igenom strängens tecken med en for-sats och räkna ut upp en variabel för varje tecken som är en vokal.'
])

<h2>Upprepningar med range()</h2>
<p>Ibland vill vi upprepa samma kod ett fixt antal gånger och då passar funktionen <i>range()</i> bra. 
Enklaste syntaxen är <i>for variabel in range(n):</i> där variabel är räknarens variabelnamn och n är antalet upprepningar.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Upprepning av samma kod tre gånger.</p>
  <pre><code class="language-python">for i in range(3):
    print('Python!')
  </code></pre>
  <div id="example-range-simple-code" class="hidden">for i in range(3):
    print('Python!')</div>
	<button type="button" id="example-range-simple" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>I det här exemplet ser vi hur räknaren ändras för varje iteration. Observera att den startar på 0.</p>
  <pre><code class="language-python">for i in range(3):
    print(i)
  </code></pre>
  <div id="example-range-counter-code" class="hidden">for i in range(3):
    print(i)</div>
	<button type="button" id="example-range-counter" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Vi kan välja vad <i>range()</i> ska börja på genom att använda <b>två argument</b>. 
Första argumentet är vad intervallet startar på och det andra argument är hur långt räknaren ska gå (ej inkluderande). Till exempel innebär <i>range(1, 10)</i> värden från 1 till 9.
Tänk på att värdet i det andra argumentet alltså <b>inte ingår</b> i intervallet.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Räknare med variabelnamn <span class="border">i</span> som startar på 1 och slutar på 9.</p>
  <pre><code class="language-python">for i in range(1, 10):
    print(i)
  </code></pre>
  <div id="example-range-two-arg-code" class="hidden">for i in range(1, 10):
    print(i)</div>
	<button type="button" id="example-range-two-arg" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Det går faktiskt att använda tre argument också. Det tredje argumentet står för steglängden. 
Till exempel innebär <i>range(1,10,2)</i> att vi börjar på 1 och sen går vi två steg för varje iteration, i den andra iterationen är värdet 3 och i den sista är värdet 9. 
Det går också att använda negativa steglängder för räknaren ska gå baklänges.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Exempel på att använda <span class="border">range()</span> med tre argument.</p>
  <pre><code class="language-python">for i in range(10, 51, 10):
    print(i)

for i in range(5, 0, -1):
    print(i)
  </code></pre>
  <div id="example-range-three-arg-code" class="hidden">for i in range(10, 51, 10):
    print(i)

for i in range(5, 0, -1):
    print(i)</div>
	<button type="button" id="example-range-three-arg" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("for i in range(1, 4, 3):
    print(i)

for i in range(2,2):
    print(i)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'for_predict',
    'code' => $code,
    'options' => ['1','2','1
2', '1
4'],
    'correct' => 1
])

<h2>Nästlade for-satser</h2>
<p>Det är vanligt att använda en for-sats inuti en annan for-sats, så kallade nästlade loopar. Det fungerar bra med <i>while</i> också.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Två nästlade for-loopar som skriver ut alla kombinationer av två listor.</p>
  <pre><code class="language-python">färger = ['blå', 'gul', 'rosa']
saker = ['väska', 'bil', 'hus']

for färg in färger:
    for sak in saker:
        print(färg + ' ' + sak)</code></pre>
  <div id="example-nested-code" class="hidden">färger = ['blå', 'gul', 'rosa']
saker = ['väska', 'bil', 'hus']

for färg in färger:
    for sak in saker:
        print(färg + ' ' + sak)</div>
    <button type="button" id="example-nested" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Två nästlade for-loopar som skriver ut alla 36 kombinationer av två tärningskast.</p>
  <pre><code class="language-python">for t1 in range(1,7):
    for t2 in range(1,7):
        print(str(t1) + ', ' + str(t2))</code></pre>
  <div id="example-dices-code" class="hidden">for t1 in range(1,7):
    for t2 in range(1,7):
        print(str(t1) + ', ' + str(t2))</div>
    <button type="button" id="example-dices" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = json_encode( array("for t1 in range(1,7):","    for t2 in range(1,7):", "        print(str(t1) + ', ' + str(t2))") );?>
@livewire('editor-modify', [
    'editorId' => 'for_modify_dices',
    'code' => $code,
    'correctAnswer' => array("4, 6", "5, 5", "6, 4"),
    'title' => 'Ändra i koden',
    'text' => 'Ändra i koden så att endast tärningskasten som har en summa av 10 skrivs ut.',
    'tip_text' => 'Lägg till en if-sats så att rad 3 endast körs om <span class="border">t1 + t2 == 10</span>.'
])

@endsection