@extends('template-section-canvas')
@section('title', 'Rita med slumpen med Turtle | Pythonlabbet' )
@section('description', 'I det här avsnittet används slumpen för att rita med hjälp av modulen Turtle.')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Rita med slumpen</h1>
    <p class="mb-1">Här får du lära dig</p>
    <ul>
        <li>generera och använda slumptal</li>
        <li>rita med slumpad färg</li>
    </ul>

    <h2>Generera slumptal</h2>
    <p>För att <b>skapa slumptal</b> ska vi använda funktionen <i>randint</i> som finns i modulen <i>random</i>. 
    Randint är en ihopslagning av två förkortningar, <em>rand</em> för random (svenska: slumpmässig) 
    och <em>int</em> för integer (svenska: heltal).

    <p>Genom att skriva <i>from random import randint</i> importeras <i>randint</i> från modulen <i>random</i>.
    Denna funktion tar <b>två argument</b>, <i>randint(start, stopp)</i> där <em>start</em> är det minsta slumptal som kan genereras
    och <em>stopp</em> är det största slumptal som kan genereras.</p>

    <p>Om du vill läsa mer om hur slumptal genereras, se <a class="text-green-500 hover:underline" href="/grundkurs/slumptal">grundkursen om slumptal</a>.</p>
    
    <div class="bg-green-100 p-8 mb-4">
      <h3 class="text-2xl">Exempel</h3>
      <p>Ritar en linje med slumpmässig längd. Ett slumptal mellan 10 och 200 sparas i variablen <span class="border">längd</span>.</p>
        <p>Prova att köra koden flera gånger.</p>
      <pre><code class="language-python">from random import randint

#slumpa ett tal mellan 10 och 200        
längd = randint(10,200) 
forward(längd)

      </code></pre>
      <div id="example-random-length-code" class="hidden">from turtle import *
shape('turtle')
from random import randint

#slumpa ett tal mellan 10 och 200        
längd = randint(10,200) 
forward(längd)
      </div>
      <button type="button" id="example-random-length" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint", "shape('turtle')","","#skriv din kod här","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-random-circle-radius',
    'code' => $code,
    'title' => 'Skapa',
    'text' => 'Rita en cirkel med slumpad radie i intervallet [10,100]. För att komma ihåg hur cirklar ritas, se <a target="_tab" class="text-green-500 hover:underline" href="/turtle/cirklar">avsnittet om cirklar.</a>',
    'rows' => 18,
    'tip_text' => 'Skriv <span class="border">randint(10,100)</span> för att generera ett slumptal i intervallet [10,100].'
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2>Slumpvandring</h2>
<p>Nu ska vi låta vår sköldpadda vandra slumpmässigt på ritytan.
  Sköldpaddan börjar som vanligt i mitten. Sedan tar den upprepade steg i slumpmässig riktning.</p>

<p>Slumpvandring är ett etablerat vetenskapligt begrepp och kan också kallas <em>Brownsk rörelse</em> eller <em>random walk</em>. 
<a target="_tab" class="text-green-500 hover:underline" href="https://sv.wikipedia.org/wiki/Brownsk_r%C3%B6relse">Läs mer på wikipedia</a>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Slumpvandring med 500 steg.</p>
  <pre><code class="language-python">from turtle import *
from random import randint
shape('turtle')

for i in range(200):
    riktning = randint(1, 360)
    left(riktning)
    forward(10)
  </code></pre>
  <div id="example-random-walk-code" class="hidden">from turtle import *
from random import randint
shape('turtle')
speed(0)

for i in range(200):
    riktning = randint(1, 360)
    left(riktning)
    forward(10)
  </div>
	<button type="button" id="example-random-walk" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint", "shape('turtle')","speed(0)","","for i in range(200):","    riktning = randint(1,360)","    left(riktning)", "    forward(10)", "hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-random-walk-modified',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Koden nedan är samma som i exemplet ovan. Ändra så att sköldpaddan går hälften så många steg, men dubbelt så långa steg. Låt också sköldpaddan rita med färgen grön.',
    'rows' => 25,
    'tip_text' => 'Antal steg är antal upprepningar som skrivs på rad 6. Steglängden hittar du på rad 9.'
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2>Färgsystemet RGB</h2>
<p>Hittills har vi använt en textsträng som argument till <i>color</i>, som exempelvis <i>color('green')</i>.
Det går också att bestämma färg enligt RGB-systemet. <b>RGB</b> står för <em>red</em>, <em>green</em>, <em>blue</em>. </p>


<p>Färgen sätts med <i>color(röd, grön, blå)</i> där argumenten röd, grön och blå är tal i intervallet [0,1] eller [0,255].
För att använda intervallet [0,255] behöver vi skriva <i>colormode(255)</i> i början av koden.</p>

<p>Exempelvis står det första argumentet för hur mycket röd det ska finnas med i färgen, 
  <i>color(255,0,0)</i> betyder därför maximalt rött med inget grönt och inget blått. Färgen blir därför röd.</p>

  <div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En triangel med tre olika färger. Prova gärna att experimentera med färgerna!</p>
  <pre><code class="language-python">colormode(255)

color(255,0,0) #röd
forward(100)
left(120)
color(0,255,0) #grön
forward(100)
left(120)
color(0,0,255) #blå
forward(100)

  </code></pre>
  <div id="example-rgb-code" class="hidden">from turtle import *
colormode(255)

color(255,0,0) #röd
forward(100)
left(120)
color(0,255,0) #grön
forward(100)
left(120)
color(0,0,255) #blå
forward(100)
  </div>
	<button type="button" id="example-rgb" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint", "colormode(255)", "shape('turtle')","speed(0)","","for i in range(255):","    color(i,0,0)", "    riktning = randint(0,3)","    left(riktning*90)", "    forward(10)", "hideturtle()") );?>
@livewire('editor-canvas-quiz', [
  'editorId' => 'turtle-random-quiz-circle-area',
  'code' => $code,
  'options' => ['En random walk med ökande röd färg','En kvadrat med slumpmässig färger på sidorna', 'En random walk med slumpade färger', 'En kvadrat med ökande röd färg'],
  'correct' => 1,
  'correct_text' => 'Rätt!',
])
<div class="px-2 sm:px-8 lg:px-48">

</div>
<?php $code = json_encode( array("from turtle import *","from random import randint","colormode(255)","shape('turtle')","speed(0)","penup()","","#gå längst upp till vänster","back(200)","left(90)","forward(200)","right(90)","","def färgad_kvadrat(sida):","    r = 0","    g = 255","    b = 0","    color(r,g,b)","    begin_fill()","    for i in range(4):","        forward(sida)","        right(90)","    end_fill()","","# Rita 100 kvadrater som täcker ritytan","for rad in range(10):","    for kolumn in range(10):","        färgad_kvadrat(40)","        forward(40)","    back(400)","    right(90)","    forward(40)","    left(90)") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-random-color-grid',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Programmet nedan ritar ut 100 kvadrater som täcker hela ritytan. Ändra i funktionen <span class="border">färgad_kvadrat</span> så att kvadraterna får olika slumpmässiga färger. Tänk på att talen i RGB-systemet är i intervallet [0,255].',
    'rows' => 35,
    'tip_text' => 'På raderna 15-17 bestäms vilken färg en kvadrat ska ha. Ändra talen till slumpade tal i intervallet [0,255].'
  ])
<div class="px-2 sm:px-8 lg:px-48">

  </div>
</div>
@endsection