@extends('template-section-canvas')
@section('title', 'Rita cirklar med Turtle | Pythonlabbet' )
@section('description', 'Vi tittar på hur vi enkelt kan rita cirklar, ifyllda eller inte. Hur förflyttar vi sköldpaddan utan att rita?')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Rita cirklar</h1>
    <p class="mb-1">Här får du lära dig att</p>
    <ul>
        <li>rita cirklar med <i>circle()</i></li>
        <li>flytta sköldpaddan utan att rita</li>
        <li>färglägga figurer</li>
    </ul>

    <h2>Rita en cirkel</h2>
    <p>För att rita en cirkel används <i>circle(radie)</i> där argumentet <em>radie</em> är ett tal som anger hur stor radie cirkeln ska ha.</p>

    <div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Rita en cirkel med radie 50.</p>
  <pre><code class="language-python">circle(50)</code></pre>
  <div id="example-circle-code" class="hidden">from turtle import *
shape('turtle')

circle(50)
  </div>
	<button type="button" id="example-circle" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>

<p>Nu ska vi prova att rita flera cirklar med olika radier.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Tre cirklar med olika radie</p>
  <pre><code class="language-python">circle(25)
circle(50)
circle(75)
  </code></pre>
  <div id="example-three-circles-code" class="hidden">from turtle import *
shape('turtle')

circle(25)
circle(50)
circle(75)</div>
	<button type="button" id="example-three-circles" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Skriv <i>hideturtle()</i> för att dölja sköldpaddan när koden är klar.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ett till exempel med tre cirklar. Sköldpaddan döljs på slutet.</p>
  <pre><code class="language-python">circle(50)
right(120)
circle(50)
right(120)
circle(50)

hideturtle()
  </code></pre>
  <div id="example-turn-three-circles-code" class="hidden">from turtle import *
shape('turtle')

circle(50)
right(120)
circle(50)
right(120)
circle(50)

hideturtle()</div>
	<button type="button" id="example-turn-three-circles" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *", "shape('turtle')", "", "forward(100)", "left(90)","forward(100)", "left(90)","forward(100)", "left(90)","forward(100)", "left(90)", "forward(50)", "circle(50)" ) );?>
@livewire('editor-canvas-quiz', [
  'editorId' => 'turtle-circles-quiz-area',
  'code' => $code,
  'options' => ['En kvadrat inuti en cirkel','En cirkel inuti en kvadrat', 'En cirkel och en kvadrat med lika stora areor'],
  'correct' => 2,
  'correct_text' => 'Rätt!',
])
<div class="px-2 sm:px-8 lg:px-48">

<p>Det går att säga till sköldpaddan att bara rita en del av en cirkel.
Det görs genom att använda <b>två argument</b> till funktionen <i>circle()</i>. 
Första argumentet är som innan radien medan det andra argumentet är vinkeln, där <b>360 grader är en hel cirkel</b>. Argumenten separeras med <i>,</i> (ett komma). Se exemplet nedan.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Rita en del av en cirkel. Testa ändra värdet på det andra argumentet!</p>
  <pre><code class="language-python">circle(50, 180) #halv cirkel
circle(50, 90) #fjärdels cirkel
  </code></pre>
  <div id="example-circle-angle-code" class="hidden">from turtle import *
circle(50, 180) #halv cirkel
right(90)
circle(50, 90) #fjärdels cirkel
  </div>
	<button type="button" id="example-circle-angle" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Ta upp och sätta ned pennan</h2>
<p>Ta upp pennan med <i>penup()</i>. Då vandrar sköldpaddan utan att rita. Använd <i>pendown()</i> för att sätta ned pennan igen.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Rita två cirklar på två olika platser med hjäpa av <span class="border">penup()</span> och <span class="border">pendown()</span>.</p> 
<p>Prova gärna att kommentera bort (sätt <span class="border">#</span> framför) <span class="border">penup()</span> och se hur det ser ut.</p>
  <pre><code class="language-python">penup()
back(100)
pendown()
circle(50)
penup()
forward(200)
pendown()
circle(50)
  </code></pre>
  <div id="example-pen-code" class="hidden">from turtle import *
shape('turtle')

penup()
back(100)
pendown()
circle(50)
penup()
forward(200)
pendown()
circle(50)</div>
	<button type="button" id="example-pen" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>
<?php $code = json_encode( array("from turtle import *","shape('turtle')", "","#rita huvud", "right(90)","forward(100)","left(90)","circle(100)","","#rita vänster öga","left(90)","forward(135)","left(90)","forward(35)","circle(15)","","#rita höger öga", "back(70)","circle(15)","","#rita mun","left(90)","forward(50)","right(90)","forward(85)","left(90)","circle(50,180)","hideturtle()") );?>
  @livewire('editor-canvas-modify', [
    'editorId' => 'turtle-circles-smiley',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Använd <span class="border">penup()</span> och <span class="border">pendown()</span> för att sköldpaddan ska rita en glad smiley. Sköldpaddan ska alltså inte rita medan den går mellan olika delar.',
    'rows' => 35,
    'tip_text' => 'Börja med <span class="border">penup()</span> före rad 6 som ritar det första strecket. Skriv sedan <span class="border">pendown()</span> innan rad 8 som ritar den stora cirkeln. Försök sedan hitta de delar av koden som ritar oönskade streck och gör likadant runt de raderna.'
  ])
  <div class="px-2 sm:px-8 lg:px-48">

<h2>Fylla i figurer med färg</h2>
<p>Hittills har vi bara kunnat rita linjer. För att fylla i figurer vi ritat används <i>begin_fill()</i> och <i>end_fill()</i>.
Skriv <i>begin_fill()</i> först på en rad innan du ritar och sedan <i>end_fill()</i> på en rad efter att figuren som ska färgläggas är färdigritad.
Färgen går att välja med <i>color(färg)</i> precis som för linjer.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Rita en färglagd cirkel.</p>
  <pre><code class="language-python">color('green')
    
begin_fill()
circle(75)
end_fill()
  </code></pre>
  <div id="example-filled-circle-code" class="hidden">from turtle import *
shape('turtle')
color('green')

begin_fill()
circle(75)
end_fill()  
  </div>
	<button type="button" id="example-filled-circle" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","","forward(100)","right(144)","","forward(100)","right(144)","","forward(100)","right(144)","","forward(100)","right(144)","","forward(100)","right(144)") );?>
@livewire('editor-canvas-quiz', [
  'editorId' => 'turtle-circles-quiz-star',
  'code' => $code,
  'options' => ['En stjärna med fem uddar','Två trianglar bredvid varandra', 'En femhörning utan korsande linjer'],
  'correct' => 1,
  'correct_text' => 'Rätt!',
])
<div class="px-2 sm:px-8 lg:px-48">

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","","forward(100)","right(144)","","forward(100)","right(144)","","forward(100)","right(144)","","forward(100)","right(144)","","forward(100)","right(144)") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-circles-fill-star',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Använd <span class="border">begin_fill()</span> och <span class="border">end_fill()</span> för att för att fylla figuren med valfri färg.',
    'rows' => 25,
    'tip_text' => 'Skriv <span class="border">begin_fill()</span> innan något ritas och <span class="border">end_fill()</span> sist.</span>',
  ])
<div class="px-2 sm:px-8 lg:px-48">




<p>Efter de här två första avsnitten har vi gått igenom grunderna i turtle-modulen. 
  I nästa avsnitt går vi vidare med mer generella programmeringsbegrepp.</p>

  </div>
</div>
@endsection