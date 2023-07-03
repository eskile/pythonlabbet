@extends('template-section-canvas')
@section('title', 'Funktioner i Python med Turtle | Pythonlabbet' )
@section('description', 'I det här avsnittet lär vi oss använda funktioner i Python med hjälp av modulen Turtle. ')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Funktioner</h1>
    <p class="mb-1">Här får du lära dig</p>
    <ul>
        <li>hur en funktion definieras</li>
        <li>använda egna funktioner</li>
    </ul>

    <p>Vi har redan använt funktioner i den här kursen, importerade från modulen turtle.
      Exempelvis <i>penup()</i> och <i>left(vinkel)</i>. Den förstnämnda utan argument och den sistnämnda med argument. 
      Nu ska vi lära oss hur vi kan skapa egna funktioner, både med och utan argument.</p>

    <h2>Definiera och anropa funktioner</h2>
    
    <p>Att <b>definiera en funktion</b> i programmering innebär att ge ett block kod ett namn. 
      Koden i funktionen kan köras genom att <b>anropa</b> funktionen, vilket görs genom att skriva namnet.</p>
      
    <p>I Python definieras en funktion med <i>def</i>, kort för <em>define</em> (svenska: definiera). Till exempel kan vi skriva <i>def funktion():</i> och 
      sedan <b>indentera</b> kod under som ska tillhöra funktionen.</p>

    <p>Funktioner kan användas för att slippa skriva samma kod om och om igen. 
      Vi börjar med ett exempel och definierar en funktion <i>kvadrat</i> som ritar en kvadrat.
      Funktionen anropas sedan genom att helt enkelt skriva <i>kvadrat()</i>.</p>

<div class="bg-green-100 p-8 mb-4">
<h3 class="text-2xl">Exempel</h3>
  <p>Definierar en funktion <span class="border">kvadrat</span> som ritar en kvadrat. Sist anropas funktionen.</p>
  <pre><code class="language-python">def kvadrat():
    forward(100)
    left(90)
    forward(100)
    left(90)
    forward(100)
    left(90)
    forward(100)
    left(90)

kvadrat()
  </code></pre>
  <div id="example-square-code" class="hidden">from turtle import *
shape('turtle')

def kvadrat():
    forward(100)
    left(90)
    forward(100)
    left(90)
    forward(100)
    left(90)
    forward(100)
    left(90)

kvadrat()
  </div>
	<button type="button" id="example-square" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Vi kan förenkla exemplet ovan med en <b>for-sats</b>. Då slipper vi skriva samma sak fyra gånger.</p>

<div class="bg-green-100 p-8 mb-4">

<h3 class="text-2xl">Exempel</h3>
  <p>Funktionen <span class="border">kvadrat</span> med hjälp av en for-sats.</p>
  <pre><code class="language-python">def kvadrat():
    for i in range(4):  
        forward(100)
        left(90)
    
kvadrat()
  </code></pre>
  <div id="example-square-for-code" class="hidden">from turtle import *
shape('turtle')

def kvadrat():
    for i in range(4):  
        forward(100)
        left(90)
    
kvadrat()
  </div>
	<button type="button" id="example-square-for" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p><b>Notera indenteringen</b> i exemplet ovan. Först är raden <i>for i in range(4):</i> indenterad eftersom den tillhör funktionen <i>kvadrat</i>. 
Sedan är <i>forward(100)</i> och <i>left(90)</i> i sin tur indenterade i ytterligare steg eftersom de tillhör for-satsen.</p>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","color('orange')", "speed(6)","","def kvadrat():","    for i in range(4):", "        forward(100)","        left(90)","","for i in range(10):","    kvadrat()","    right(36)", "", "hideturtle()") );?>
@livewire('editor-canvas-quiz', [
  'editorId' => 'turtle-functions-ten-squares-quiz',
  'code' => $code,
  'options' => ['Tio kvadrater i ett rutmönster ','Tio kvadrater på rad', 'Tio kvadrater med ett hörn gemensamt'],
  'correct' => 3,
  'correct_text' => 'Rätt!',
])
<div class="px-2 sm:px-8 lg:px-48">

<h2>Funktioner med argument</h2>
<p>Med hjälp av <b>argument</b> kan vi skicka in värden som sedan används när koden i funktionen körs. 
Om vi fortsätter med kvadrater som exempel kan vi använda kvadratens sidlängd som argument. 
Vi har redan har sett hur funktioner med argument anropas, som t.ex. <i>forward(100)</i> där argumentet är 100. 

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Definierar och anropar funktionen <span class="border">kvadrat</span> med ett argument.</p>
  <pre><code class="language-python">def kvadrat(sida):
    for i in range(4):
        forward(sida)
        left(90)

kvadrat(50) #ritar kvadrat med sidan 50
kvadrat(100) #ritar kvadrat med sidan 100
  </code></pre>
  <div id="example-one-arg-code" class="hidden">from turtle import *
shape('turtle')

def kvadrat(sida):
  for i in range(4):
      forward(sida)
      left(90)

kvadrat(50) #ritar kvadrat med sidan 50
kvadrat(100) #ritar kvadrat med sidan 100
  </div>
	<button type="button" id="example-one-arg" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Med vår nya arsenal av tekniker kan vi nu rita godtyckliga polygoner. 
Det vi behöver veta är att vinklarna i en polygon med n sidor är 360 / n.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Funktion för att rita en polygon med n sidor.</p>
  <p>Klicka på testa och prova olika värden på n. Vad händer om n är stort?</p>
  <pre><code class="language-python">def polygon(n):
    for i in range(n):
        forward(500 / n) # dela med n för lagom storlek
        left(360 / n)
  </code></pre>
  <div id="example-polygon-code" class="hidden">from turtle import *
shape('turtle')

n = 5

def polygon(n):
  for i in range(n):
      forward(500 / n)
      left(360 / n)

polygon(n)
hideturtle()
  </div>
	<button type="button" id="example-polygon" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","color('green')","","def triangel(sida):", "    #skriv kod för att rita en triangel här", "    ", "","for i in range(10):","    triangel(10*(i+1))","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-functions-triangle',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Funktionen <span class="border">triangel</span> tar ett argument <span class="border">sida</span> som är sidan på en triangel. Funktionens uppgift är att rita en liksidig triangel med sidan <span class="border">sida</span>. Övrig kod ska stå kvar.',
    'rows' => 25,
    'tip_text' => 'Använd <span class="border">forward(sida)</span> och <span class="border">left(120)</span>. Glöm inte att kod i funktionen <span class="border">triangel</span> måste vara indenterad!'
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2>Funktioner med flera argument</h2>
<p>Säg att vi vill använda polygon-funktionen ovan och också kunna välja vilken färg polygonen är eller hur långa sidorna ska vara.
Då behöver funktionen ta emot flera inputvärden och alltså ha flera argument. </p>
<p>I definitionen av funktionen skrivs argumenten <b>separerade med komma</b>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Flera argument. Funktion för att rita en polygon med <span class="border">n</span> sidor och färgen <span class="border">färg</span>.</p>
    <pre><code class="language-python">def polygon(n, färg):
    color(färg)
    for i in range(n):
        forward(500 / n) # dela med n för lagom storlek
        left(360 / n)
  </code></pre>
  <div id="example-two-args-code" class="hidden">from turtle import *
shape('turtle')

def polygon(n, färg):
    color(färg)
    for i in range(n):
        forward(500 / n) # dela med n för lagom storlek
        left(360 / n)

polygon(3, 'lime')
polygon(4, 'green')
polygon(5, 'olive')

hideturtle()
  </div>
	<button type="button" id="example-two-args" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>


<p>Polygon-funktionen ovan ger fel om vi försöker anropa den med endast ett argument.
  Om vi vill att funktionen fortfarande ska fungera med ett argument kan vi ge argumentet <em>färg</em> ett <b>standardvärde</b>. 
  Ifall funktionen anropas utan det argumentet så används standardvärdet.</p>

  <div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Polygon-funktionen med standardvärdet <span class="border">färg = 'red'</span>. Nu fungerar anropet <span class="border">polygon(3)</span>.</p>
    <pre><code class="language-python">def polygon(n, färg = 'red'):
    color(färg)
    for i in range(n):
        forward(500 / n) # dela med n för lagom storlek
        left(360 / n)

polygon(3) #ritar en röd triangel
  </code></pre>
  <div id="example-std-value-code" class="hidden">from turtle import *
shape('turtle')

def polygon(n, färg = 'red'):
    color(färg)
    for i in range(n):
        forward(500 / n) # dela med n för lagom storlek
        left(360 / n)

polygon(3) #röd triangel
polygon(4, 'green') #grön kvadrat

hideturtle()
  </div>
	<button type="button" id="example-std-value" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","","#skriv funktionen här","","kvadrat(50, 'blue')","left(90)","kvadrat(50, 'cyan')","left(90)","kvadrat(50, 'lightblue')","left(90)","kvadrat(50, 'darkblue')","left(90)","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-functions-square-color',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Skriv en funktion <span class="border">kvadrat(sida, färg)</span> där sida är kvadratens sida och färg är kantens färg.',
    'rows' => 25,
    'tip_text' => 'Använd bland annat <span class="border">forward(sida)</span> och <span class="border">color(färg)</span>. Kopiera gärna kod från tidigare exempel.'
  ])
<div class="px-2 sm:px-8 lg:px-48">


  </div>
</div>
@endsection