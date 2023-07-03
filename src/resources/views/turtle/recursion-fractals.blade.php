@extends('template-section-canvas')
@section('title', 'Överkurs: Rita fraktaler med Turtle | Pythonlabbet' )
@section('description', 'Med hjälp av rekursion lär vi oss att rita fraktaler med Turtle. Bland annat ritar vi den klassiska Kochs snöflinga.')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Rekursion och fraktaler (överkurs)</h1>
    <p class="mb-1">Här får du lära dig</p>
    <ul>
        <li>vad rekursion är</li>
        <li>hur rekursion kan användas för att rita fraktaler</li>
    </ul>

    <p>Med rekursion i programmering menas <b>funktioner som anropar sig själv</b>. 
      Med den tekniken kan vi rita spännande geometriska mönster, så kallade fraktaler.</p>

    <p>En viktig detalj när funktioner anropar sig själva är att det finns ett <b>stoppvillkor</b>. 
    Annars skulle funktionen anropa sig själv i all oändlighet.</p>


    <h2>En annorlunda stjärna</h2>
    <p>Tidigare i kursen av vi ritat en femuddig stjärna. Nu när vi lärt oss både repetitioner och funktioner kan vi förenkla koden.</p>

  <div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Exempel</h3>
    <p>En femuddig stjärna i en funktion.</p>
    <pre><code class="language-python">def stjärna(sida):
    for i in range(5):
        forward(sida)
        right(144)

stjärna(250)
      </code></pre>
      <div id="example-star-code" class="hidden">from turtle import *
def stjärna(sida):
    for i in range(5):
        forward(sida)
        right(144)

penup()
goto(-125,50)
pendown()
stjärna(250)

hideturtle()
      </div>
      <button type="button" id="example-star" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>

<p>Nu ska vi göra om funktionen <i>stjärna</i> till en rekursiv funktion som anropar sig själv. 
I varje udd ska en ny mindre stjärna ritas och i de mindre stjärnorna ska i sin tur en liten stjärna finnas i varje udd. Och så vidare i ett djup vi anger.</p>

<p>För att kunna skriva ett <b>stoppvillkor</b> kommer vi använda <i>if n == 0: return</i> vilket betyder "om n är lika med 0, gå ur funktionen".
I varje rekursivt steg kommer <i>n</i> minska med ett. Därför kommer funktionen att sluta anropa sig själv när <i>n</i> är lika med 0. Du kan läsa mer om <a target="_tab" class="text-green-500 hover:underline" href="/grundkurs/if-satsen">if-satsen här</a>.

<p>Studera exemplet nedan noggrant. Försök att förstå exakt vad som händer. Rekursion är inte lätt att förstå i början!</p>

<div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Exempel</h3>
    <p>En rekursiv stjärna. Testa olika djup!</p>
    <pre><code class="language-python">def stjärna(sida, n):
    if n == 0:
        return
    for i in range(5):
        forward(sida)
        stjärna(sida/3, n-1)
        right(144)

stjärna(150, 3)
      </code></pre>
      <div id="example-star-recursion-code" class="hidden">from turtle import *
speed(0)
hideturtle()

def stjärna(sida, n):
    if n == 0:
        return
    for i in range(5):
        forward(sida)
        stjärna(sida/3, n-1)
        right(144)

penup()
goto(-100,50)
pendown()

# ändra djup här, just nu är djupet 3.
stjärna(150, 3)
      </div>
      <button type="button" id="example-star-recursion" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>

<p>I exemplet ovan är raden <i>stjärna(sida/3, n-1)</i> den viktiga delen. Den innebär att det ritas en ny stjärna med en tredjedel så stor sida och med ett djup som är ett lägre. 
Med <i>stjärna(150, 3)</i> är sidan från början 150 och djupet 3. Efter att en sida ritats kommer <i>stjärna(50, 2)</i> anropas, det vill säga rita en stjärna med sidan 50 och djup 2. 
I nästa steg är djupet 1 och då ritas en enkel stjärna. Vid djupet 0 ritas inte längre något på grund av stoppvillkoret.</p> 

</div>  
<?php $code = json_encode( array("from turtle import *","speed(0)","hideturtle()","","def stjärna(sida, n):","    if n == 0:","        return","    for i in range(5):","        forward(sida)","        stjärna(sida/3, n-1)","        right(144)","","penup()","goto(-100,50)","pendown()","","stjärna(150, 3)","") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-fractals-star-7',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Koden ska rita en stjärna med sju uddar. En sådan stjärna har sju sidor (istället för fem) och vinkeln i en udd är 720/7 grader (istället för 144 grader).',
    'rows' => 25,
    'tip_text' => 'Ändra till sju repetitioner på rad 8. Ändra sedan vinkeln på rad 11 till 720/7.</span>'
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2>Kochs snöflinga</h2>
<p>Kochs snöflinga är en av de första beskrivna fraktalerna och skapades av den svenska matematikern Helge von Koch år 1904. Nu ska vi se hur vi kan rita den med hjälp av rekursion.
  Algoritmen nedan beskriver hur snöflingan ritas.
</p>
<ol class="list-decimal text-lg mb-5">
  <li>Börja med en rak linje.</li>
  <li>Dela linjen i tre lika stora delar.</li>
  <li>Ersätt den mittersta delen med två delar som bildar en spets uppåt.</li>
  <li>Upprepa för alla linjer.</li>

</ol>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Illustration</h3>
  <p>Illustration av Kochs algoritm för <b>en</b> upprepning.</p>
  <pre><code class="language-python"># Klicka på testa för att se illustrationen.

  </code></pre>
  <div id="example-koch-illustration-code" class="hidden">from turtle import *
hideturtle()

def skriv(text):
    penup()
    goto(-200,-100)
    begin_fill()
    color('white')
    goto(-200,-150)
    goto(200,-150)
    goto(200,-5)
    goto(-200,-5)
    end_fill()
    color('black')
    goto(-150,-100)
    pendown()
    write(text, font=('Nunito', 20, 'normal' ))
    penup()
    goto(-150,0)
    pendown()


speed(0)
skriv('Först en linje.')

penup()
goto(-150,0)
pendown()
speed(1)
forward(300)
speed(0)
skriv('Ta bort segmentet i mitten...')
speed(1)
forward(100)
color('white')
forward(100)
back(100)
color('black')
speed(0)
skriv('...och rita "spetsen".')
speed(1)
forward(100)
left(60)
forward(100)
right(120)
forward(100)
speed(0)
skriv('Klart.')
hideturtle()
  </div>
	<button type="button" id="example-koch-illustration" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>För att rita fraktalen så kan vi börja med att rita det grundläggande mönstret i en funktion. Därefter kan vi ersätta varje linje med ett rekursivt anrop.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Kochs snöflinga - en upprepning</h3>
  <p></p>
  <pre><code class="language-python">def snöflinga(sida):
    forward(sida)
    left(60) #vinkeln är 60 grader i en liksidig triangel
    forward(sida)
    right(120)
    forward(sida)
    left(60)
    forward(sida)
  </code></pre>
  <div id="example-koch-function-code" class="hidden">from turtle import *
shape('turtle')
penup()
back(150)
pendown()

def snöflinga(sida):
    forward(sida)
    left(60) #vinkeln är 60 grader i en liksidig triangel
    forward(sida)
    right(120)
    forward(sida)
    left(60)
    forward(sida)

snöflinga(100)
hideturtle()
  </div>
	<button type="button" id="example-koch-function" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Nu ska vi byta ut <i>forward(sida)</i> mot <i>snöflinga(sida/3,n-1)</i>. Istället för att rita ut en linje gör vi ett nytt mönster där linjen skulle ha varit.
Det nya mönstret är endast en tredjedel så stort.
Stoppvillkoret när n = 1 är helt enkelt att rita ut sträckan. Det är basfallet som du kan se i algoritmens steg 1.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Kochs snöflinga</h3>
  <p>Färdigt exempel av Kochs snöflinga. Klicka på testa och testa olika värden på n.</p>
  <pre><code class="language-python">def snöflinga(sida,n):
    if n == 1: #stoppvillkoret
        forward(sida)
        return

    snöflinga(sida/3,n-1) #istället för forward(100)
    left(60)
    snöflinga(sida/3,n-1) #istället för forward(100)
    right(120)
    snöflinga(sida/3,n-1) #istället för forward(100)
    left(60) 
    snöflinga(sida/3,n-1) #istället för forward(100)
  </code></pre>
  <div id="example-koch-fractal-code" class="hidden">from turtle import *
shape('turtle')
speed(0)
penup()
back(150)
pendown()

def snöflinga(sida,n):
    #stoppvillkoret
    if n == 1: 
        forward(sida)
        return

    snöflinga(sida/3,n-1)
    left(60)
    snöflinga(sida/3,n-1)
    right(120)
    snöflinga(sida/3,n-1)
    left(60) 
    snöflinga(sida/3,n-1)

snöflinga(300,5) #n = 5, prova ändra här!
hideturtle()
  </div>
	<button type="button" id="example-koch-fractal" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","hideturtle()","speed(0)","penup()","goto(-100,100)","pendown()","","def snöflinga(sida,n):","    #stoppvillkoret","    if n == 1:","        forward(sida)","        return","","    snöflinga(sida/3,n-1)","    left(60)","    snöflinga(sida/3,n-1)","    right(120)","    snöflinga(sida/3,n-1)","    left(60)","    snöflinga(sida/3,n-1)","","#använd den snöflinga fyra gånger i olika riktningar","snöflinga(200,5)") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-fractals-snowflake',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Försök att använda funktionen <span class="border">snowflake</span> för att rita en hel snöflinga. Till exempel genom att rita formen av en kvadrat där varje sida använder <span class="border">snowflake</span>. ',
    'rows' => 25,
    'tip_text' => 'Tänk dig att du ska rita en kvadrat men istället för <span class="border">forward(sida)</span> använder du <span class="border">snöflinga(sida,5)</span>.'
  ])
<div class="px-2 sm:px-8 lg:px-48">

  </div>
</div>
@endsection