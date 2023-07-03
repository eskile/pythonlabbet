@extends('template-section-canvas')
@section('title', 'Fler uppgifter i turtle-modulen | Pythonlabbet' )
@section('description', 'Ritprojekt med turtle i Python.')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Fler turtle-uppgifter</h1>
    <p>Här är några mindre projekt för att använda dina nya kunskaper.</p>
    <p class="mb-1">Snabblänkar</p>
    <ul>
        <li><a class="text-green-500 hover:underline" href="#flags">Flaggor</a></li>
        <li><a class="text-green-500 hover:underline" href="#figures">Figurer</a></li>
        <li><a class="text-green-500 hover:underline" href="#graphs">Grafer</a></li> 
    </ul>

    <h2 id="flags">Rita flaggor</h2>
    <p>Rita ukrainska, svenska och amerikanska flaggan.</p>

    
</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')", "","","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-tasks-ukraine-flag',
    'code' => $code,
    'title' => 'Skapa Ukrainas flagga',
    'text' => 'Rita ukrainska flaggan.',
    'rows' => 18,
  ])
<div class="px-2 sm:px-8 lg:px-48">

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')", "","","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-tasks-sweden-flag',
    'code' => $code,
    'title' => 'Skapa Sveriges flagga',
    'text' => 'Rita svenska flaggan.',
    'rows' => 25,
  ])
<div class="px-2 sm:px-8 lg:px-48">

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')", "","","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-tasks-usa-flag',
    'code' => $code,
    'title' => 'Skapa USA:s flagga',
    'text' => 'Rita amerikanska flaggan.',
    'rows' => 25,
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2 id="figures">Figurer</h2>
<p>Rita ett hus och en kub.</p>

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')", "","","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-tasks-house',
    'code' => $code,
    'title' => 'Skapa ett hus',
    'text' => 'Rita ett hus. Färglägg gärna. Ska det finnas gräs och blommor i trädgården?',
    'rows' => 25,
  ])
<div class="px-2 sm:px-8 lg:px-48">

</div>  
<?php $code = json_encode( array("from turtle import *","from random import randint","shape('turtle')", "","","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-tasks-cube',
    'code' => $code,
    'title' => 'Skapa 3d-kub',
    'text' => 'Rita en tredimensionell kub.',
    'rows' => 25,
  ])
<div class="px-2 sm:px-8 lg:px-48">

<h2 id="graphs">Grafer</h2>
<p>Här kan du använda koordinatsystemet som ritades tidigare för att rita ut matematiska funktioner som grafer.</p>


</div>  
<?php $code = json_encode( array("from turtle import *","colormode(255)","speed(0)","","def f(x):","    return x*x","","def rita_funktion(x_skala, y_skala):","    x_min = -200","    x_max = 200","    penup()","    goto(-200, f(-200/x_skala)*y_skala)","    pendown()","    for x in range(x_min, x_max+1):","        _x = x  / x_skala","        goto(x, f(_x)*y_skala)","","def linje(x1,y1,x2,y2,r,g,b):","    penup()","    goto(x1,y1)","    color(r,g,b)","    pendown()","    goto(x2,y2)","","def pil(x,y, riktning, text):","    penup()","    goto(x,y)","    color('black')","    pendown()","    setheading(riktning)","    forward(400)","    begin_fill()","    right(135)","    forward(10)","    right(135)","    forward(14)","    end_fill()","    penup()","    back(25)","    right(90)","    back(10)","    write(text, font=('Nunito', 15, 'normal' ))","","def cirkel(x,y):","    penup()","    goto(x,y)","    pendown()","    begin_fill()","    circle(5)","    end_fill()","    penup()","    goto(x+10, y)","    write('('+str(x)+','+str(y)+')', font=('Nunito', 15, 'normal' ))","","for x1 in range(-200,201,20):","    linje(x1,-200,x1,200,200,200,200) #vertikala linjer","","for y1 in range(-200,201,20):","    linje(-200,y1,200,y1,200,200,200) #horisontella linjer","","pil(0,-200, 90, 'y') #y-axeln","pil(-200,0, 0, 'x') #x-axeln","","rita_funktion(x_skala = 10, y_skala = 0.5)","","hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-tasks-graph',
    'code' => $code,
    'title' => 'Grafer',
    'text' => 'Koden nedan ritar ut \( f(x) = x^2 \). Ändra i funktionen <span class="border">f(x)</span> och rita en graf över \(f(x) = \dfrac{x^3}{5} - 2x^2 - 5x + 25\).',
    'rows' => 50,
  ])
<div class="px-2 sm:px-8 lg:px-48">


  </div>
</div>
@endsection