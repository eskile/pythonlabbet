@extends('template-section-canvas')
@section('title', 'Koordinatsystemet vid ritning med Turtle | Pythonlabbet' )
@section('description', 'Vi undersöker hur koordinatsystemet ser ut och hur det kan användas när vi ritar med modulen Turtle.')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Koordinatsystemet</h1>
    <p class="mb-1">Här får du lära dig</p>
    <ul>
        <li>använda koordinatsystemet med <i>goto</i></li>
        <li>rita på slumpmässiga koordinater</li>
    </ul>

    <h2>Hur är koordinatsystemet uppbyggt?</h2>
    <p>Sköldpaddan startar i koordinaten (0,0). Om sköldpaddan går åt höger ökar x-koordinaten 
      och om den går uppåt ökar y-koordinaten. Exempelvis om sköldpaddan går 100 steg åt höger och sedan 
      200 steg uppåt är den i (100,200).</p>

    <p>Det kanske låter självklart om du är van vid koordinatsystem från matematiken. Men det är vanligt i datorsammanhang
      att (0,0) är längst upp till vänster och att positiv y-riktning är nedåt. Med turtle-modulen fungerar det dock precis som
      i matematiken.</p>

    <!-- <p>Det här avsnittet kommer först nu eftersom alla kanske inte lärt sig om koordinatsystem i matematiken.
      Om du aldrig hört talas om ett koordinatsystem kan det vara bra att först lära sig om det.</p> -->
  
      <div class="bg-green-100 p-8 mb-4">
        <h3 class="text-2xl">Exempel</h3>
        <p>Ritar upp ett koordinatsystem och några punkter med koordinater utskrivna. Du behöver inte förstå koden i det här fallet.
        Prova att ändra vilka punkter som ritas ut längst ner i koden!
        </p>
        <pre><code class="language-python"># Klicka på Testa-knappen för att se och köra programmet.
        </code></pre>
        <div id="example-coordinates-code" class="hidden">from turtle import *
colormode(255)
speed(0)
hideturtle()

def rita_punkter():
    #här kan du ändra vilka punkter som ritas ut!
    cirkel(-100,120)
    cirkel(-90,-80)
    cirkel(40, -60)
    cirkel(50, 100)

def linje(x1,y1,x2,y2,r,g,b):
    penup()
    goto(x1,y1)
    color(r,g,b)
    pendown()
    goto(x2,y2)

def pil(x,y, riktning, text):
    penup()
    goto(x,y)
    color('black')
    pendown()
    setheading(riktning)
    forward(400)
    begin_fill()
    right(135)
    forward(10)
    right(135)
    forward(14)
    end_fill()
    penup()
    back(25)
    right(90)
    back(10)
    write(text, font=('Nunito', 15, 'normal' ))

def cirkel(x,y):
    radie = 5
    penup()
    goto(x,y - radie)
    pendown()
    begin_fill()
    circle(radie)
    end_fill()
    penup()
    goto(x+10, y - radie)
    write('('+str(x)+','+str(y)+')', font=('Nunito', 15, 'normal' ))
  
for x1 in range(-200,201,20):
    linje(x1,-200,x1,200,200,200,200) #vertikala linjer

for y1 in range(-200,201,20):
    linje(-200,y1,200,y1,200,200,200) #horisontella linjer

pil(0,-200, 90, 'y') #y-axeln
pil(-200,0, 0, 'x') #x-axeln

rita_punkter()     
        </div>
        <button type="button" id="example-coordinates" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
      </div>

<p>Nu ska vi se hur vi kan använda koordinatsystemet för att få sköldpaddan att gå direkt till en koordinat.</p>

<h2>Goto</h2>
<p>Med funktionen <i>goto(x,y)</i> går sköldpaddan till koordinaten (x,y). Om vi vill att sköldpaddan ska gå till (0,100) skrivs <i>goto(0,100)</i>.
Om pennan är nere så ritar sköldpaddan medan den går dit.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ritar en rektangel med hjälp av <span class="border">goto</span>. Observera hur sköldpaddan hela tiden är riktad åt höger.</p>
  <pre><code class="language-python">goto(100,0)
goto(100,50)
goto(0,50)
goto(0,0)
  </code></pre>
  <div id="example-goto-square-code" class="hidden">from turtle import *
shape('turtle')

goto(100,0)
goto(100,50)
goto(0,50)
goto(0,0)
  </div>
	<button type="button" id="example-goto-square" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Som vi såg i exemplet ovan ändrar inte sköldpaddan sin riktning när <i>goto</i> används.
Det spelar ingen roll i vilken riktning sköldpaddan pekar med <i>goto</i>.</p>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","", "penup()", "goto(-100,0)","pendown()","goto(100,0)","penup()","goto(0,100)","pendown()", "goto(0,-100)","penup()","circle(100)","hideturtle()") );?>
@livewire('editor-canvas-quiz', [
  'editorId' => 'turtle-coordinates-predict',
  'code' => $code,
  'options' => ['Ett plustecken inuti en cirkel','Ett kryss inuti en cirkel', 'Ett plustecken', 'Ett kryss'],
  'correct' => 3,
  'correct_text' => 'Rätt!',
])
<div class="px-2 sm:px-8 lg:px-48">

<p>Inför skapa-uppgiften nedan introducerar vi en ny funktion, <i>pensize(tjocklek)</i> där argumentet <em>tjocklek</em> är pennans tjocklek. 
Med den kan vi variera hur tjocka streck sköldpaddan ritar. 
Som standard är tjockleken 1. För att rita med tjockleken 5 skrivs <i>pensize(5)</i>.

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","speed(0)","","","","","","") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-coordinates-cross',
    'code' => $code,
    'title' => 'Skapa',
    'text' => 'Rita ett kryss med valfri tjocklek med hjälp av <span class="border">goto</span>. Välj själv om det blir ett kryss från hörn till hörn eller ett mindre kryss.',
    'rows' => 18,
    'tip_text' => 'Använd penna och papper för att bestämma vilka koordinater du vill gå till. Använd <span class="border">penup()</span> om du inte vill rita på vägen.'
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2>Slumpmässiga koordinater</h2>
<p>Nu ska vi få sköldpaddan att rita på en slumpad plats på ritytan. 
  För att göra det behöver vi slumpa både x-koordinaten och y-koordinaten med hjälp av <i>randint</i>. </p>

  <div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ritar 20 cirklar med radie 20 på slumpmässiga koordinater.</p>
  <pre><code class="language-python">for i in range(20):
    x = randint(-200,200)
    y = randint(-200,200)
    penup()
    goto(x,y)
    pendown()
    circle(20)
  </code></pre>
  <div id="example-random-coords-code" class="hidden">from turtle import *
from random import randint
shape('turtle')

for i in range(20):
    x = randint(-200,200)
    y = randint(-200,200)
    penup()
    goto(x,y)
    pendown()
    circle(20)

hideturtle()
  </div>
	<button type="button" id="example-random-coords" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')","colormode(255)", "","for i in range(20):","    x = randint(-200,180)","    y = randint(-200,180)","    penup()","    goto(x,y)","    pendown()","    circle(20)","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-coordinates-random-circles',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Använd <span class="border">color(r,g,b)</span> och ändra så att cirklarnas färger är helt slumpmässiga. Fyll cirklarna med begin_fill() och end_fill().',
    'rows' => 25,
    'tip_text' => 'Se <a target="_tab" class="text-green-500 hover:underline" href="/turtle/rita-med-slumpen">sista uppgiften på föregående avsnittet</a>. </span>'
  ])
<div class="px-2 sm:px-8 lg:px-48">

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')","speed(0)", "","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-coordinates-random-squares',
    'code' => $code,
    'title' => 'Skapa',
    'text' => 'Rita 100 kvadrater med en slumpad sida i intervallet [10,50]. Kvadraterna ska ritas på slumpmässiga koordinater.',
    'rows' => 25,
    'tip_text' => 'Skriv en funktion <span class="border">kvadrat(sida)</span> som ritar en kvadrat med sidan <span class="border">sida</span>. Skriv sedan <span class="border">for i in range(100):</span> för att upprepa 100 gånger. I varje upprepning: gå till en slumpmässig position och rita en kvadrat med hjälp av din funktion med slumpad sida. Du måste slumpa tre tal, x-koordinaten, y-koordinaten och sidan.'
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2>Ändra storleken på ritytan</h2>
<p>Ritytan är som standard <b>400x400</b> pixlar. Det går att ändra med <i>Screen().setup(bredd,höjd)</i>
där <em>bredd</em> och <em>höjd</em> är antal pixlar. I ritytan står <em>Maximal bredd</em>, det är den maximala bredden
så att ritytan fortfarande passar in bredvid koden. Som höjd går det att välja valfritt.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ändrar till en rityta som är 200x200 pixlar.</p>
  <pre><code class="language-python">from turtle import *
Screen().setup(200,200)
  </code></pre>
  <div id="example-small-code" class="hidden">from turtle import *
Screen().setup(200,200)
  </div>
	<button type="button" id="example-small" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')", "","","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-coordinates-setup-circle',
    'code' => $code,
    'title' => 'Skapa',
    'text' => 'Ändra storlek på ritytan till en kvadrat med maximal bredd. Rita sedan en cirkel som tangerar alla yttersidor på ritytan.',
    'rows' => 18,
    'tip_text' => 'Gå, utan att rita, längst ner i mitten. Rita sedan en cirkel med en radie som är hälften av din ritytas höjd.'
  ])
<div class="px-2 sm:px-8 lg:px-48">

  </div>
</div>
@endsection