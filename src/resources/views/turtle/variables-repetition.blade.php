@extends('template-section-canvas')
@section('title', 'Variabler och repetitioner med Turtle | Pythonlabbet' )
@section('description', 'I det här avsnittet lär vi oss använda både variabler och repetitioner i Python med hjälp av modulen Turtle. ')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Variabler och repetitioner</h1>
    <p class="mb-1">Här får du lära dig att</p>
    <ul>
        <li>använda variabler för att återanvända värden</li>
        <li>repetera samma kod flera gånger</li>
    </ul>

    <p>Nu ska vi lära oss om två av de mest grundläggande begreppen inom programmering. 
      Dels <b>variabler</b>, som används för att spara värden i minnet. Dels <b>repetitioner</b>, som används för att upprepa samma stycke kod ett antal gånger.</p>

    <h2>Variabler</h2>
    <p>En variabel skapas genom att skriva exempelvis <i>sida = 50</i>. Variabelns namn här är <i>sida</i> och värdet <i>50</i> har sparats i den. 
    Efter att variabeln är skapad behöver vi bara skriva namnet på variabeln för att komma åt värdet i den.</p>

    <p>Det heter variabel eftersom värdet kan <b>variera</b> under programmets körning. Till exempel kan vi tilldela ett nytt värde <i>sida = 100</i> senare i programmet.</p>

    <p>I den här turtle-kursen kommer variablers värden att vara <b>tal</b>. I allmänhet kan variabler innehålla väldigt olika typer av data, se <a class="text-green-500 hover:underline" href="/grundkurs/variabler-och-datatyper">grundkursen om variabler</a>.

    <div class="bg-green-100 p-8 mb-4">
      <h3 class="text-2xl">Exempel</h3>
      <p>Ritar en liksidig triangel med en sidlängd som definieras av en variabel. Prova ändra på värdet i variablen.</p>
      <pre><code class="language-python">sida = 50

forward(sida)
left(120)
forward(sida)
left(120)
forward(sida)
left(120)
      </code></pre>
      <div id="example-sida-code" class="hidden">from turtle import *
shape('turtle')

#prova ändra värdet nedan
sida = 50 

forward(sida)
left(120)
forward(sida)
left(120)
forward(sida)
left(120)
      </div>
      <button type="button" id="example-sida" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>
    
<p>I exemplet ovan hade vi naturligtvis kunnat skriva <i>vinkel = 120</i> och använda den variabeln med <i>left(vinkel)</i>.
I just det här fallet finns det dock inte så stor poäng i att variera värdet på vinkeln eftersom endast 120 grader ger en triangel.
</p>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","","#skapa variablerna här, innan de används","", "forward(sida)","right(vinkel)","forward(sida)","right(vinkel)","forward(sida)","right(vinkel)","forward(sida)","right(vinkel)","forward(sida)","right(vinkel)", "", "hideturtle()") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-variables-repetition-set-variables',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Skapa variablerna <span class="border">sida</span> och <span class="border">vinkel</span> och ge dem lämpliga värden så att sköldpaddan ritar en femhörning.',
    'rows' => 20,
    'tip_text' => 'I en femhörning är vinkeln i hörnen 360/5 grader.'
  ])
<div class="px-2 sm:px-8 lg:px-48">
    
<h2>Repetitioner</h2>
<p>Med en så kallad <b>for-sats</b> kan ett stycke kod repeteras ett antal gånger. Det är väldigt praktiskt för att slippa skriva samma kod flera gånger. 

<p>Vi kan skriva <i>for i in range(4):</i> för att <b>repetera kod fyra gånger</b>. 
Uttrycket <i>range(4)</i> motsvarar intervallet [0,3], vilket är fyra olika heltal. För varje repetition uppdateras värdet på variablen <i>i</i>.
Vid första upprepningen är <span class="whitespace-nowrap">i = 0</span>, sedan är <span class="whitespace-nowrap">i = 1</span> och <span class="whitespace-nowrap">i = 2</span>, för att till slut köras en sista gång när <span class="whitespace-nowrap">i = 3</span>.
Totalt fyra repetitioner.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ritar en kvadrat genom att repetera "kör framåt" och "sväng vänster" fyra gånger.</p>
  <pre><code class="language-python">for i in range(4):
    forward(100)
    left(90)      
  </code></pre>
  <div id="example-for-code" class="hidden">from turtle import *
shape('turtle')

for i in range(4):
    forward(100)
    left(90)      
  </div>
	<button type="button" id="example-for" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Observera att raden med <i>for</i> ovan avslutas med <i>:</i> (kolon). Det är också viktigt att notera att koden som ska repeteras är indragen från vänster, så kallat <b>indenterad</b>. 
I Python brukar rader indenteras med fyra mellanslag. Det går bra att trycka på <b>TAB</b> för att automatiskt skriva fyra mellanslag här på Pythonlabbet. Läs mer på <a class="text-green-500 hover:underline" href="/grundkurs/variabler-och-datatyper">grundkursens introduktion</a>.
    
</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","back(100)","","for i in range(20):","    circle(50)","    forward(10)") );?>
@livewire('editor-canvas-quiz', [
  'editorId' => 'turtle-variables-repetition-circles-quiz',
  'code' => $code,
  'options' => ['20 cirklar utritade längs en cirkelbåge','20 cirklar utritade längs en vertikal linje', '20 cirklar utritade längs en horisontell linje'],
  'correct' => 3,
  'correct_text' => 'Rätt!',
])
<div class="px-2 sm:px-8 lg:px-48">

<p>Nu ska vi kombinera våra nyvunna kunskaper om variabler och repetitioner. Genom att använda att variabeln <i>i</i> har olika värden under repetitionerna kan vi rita intressanta saker. 
Exempelvis kan vi multiplicera med värdet på <i>i</i> för att gå längre sträcka för varje repetition. 


<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ritar ett mönster genom att utnyttja att variablen <span class="border">i</span> ökar med ett för varje repetition.</p>
  <pre><code class="language-python">for i in range(50):
    forward(5*i)
    left(90)  
  </code></pre>
  <div id="example-for-2-code" class="hidden">from turtle import *
shape('turtle')
color('green')

for i in range(50):
    forward(5*i)
    left(90)      
  </div>
	<button type="button" id="example-for-2" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Tycker du att det gick lite väl långsamt för sköldpaddan? För att låta sköldpaddan <b>rita så fort som möjligt</b> används <i>speed(0)</i>. Argumentet till <i>speed</i> ska vara ett heltal i intervallet [0,10]. 
Som standard är hastigheten inställd till 3. 

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Använder <span class="border">speed(0)</span> för att rita mönstret i exemplet ovan så fort som möjligt. Testa gärna andra värden på hastigheten.</p>
  <pre><code class="language-python">speed(0)
    
for i in range(50):
    forward(5*i)
    left(90)  
  </code></pre>
  <div id="example-for-3-code" class="hidden">from turtle import *
shape('turtle')
color('green')
speed(0)

for i in range(50):
    forward(5*i)
    left(90)      
  </div>
	<button type="button" id="example-for-3" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Nu följer två uppgifter som låter dig experimentera med vad du lärt dig.</p>

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","speed(0)","", "repetitioner = 20","faktor = 5","vinkel = 90","","for i in range(repetitioner):","    forward(i * faktor)","    left(vinkel)") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-variables-repetition-modify',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'Variera värdena på variablerna tills du får en spiralfigur du gillar. Försök gärna förstå hur olika värdena förändrar bilden.',
    'rows' => 18,
    'tip_text' => 'Ändra talens värde på raderna 5-7.'
  ])
<div class="px-2 sm:px-8 lg:px-48">

</div>  
<?php $code = json_encode( array("from turtle import *","shape('turtle')","speed(0)","","","","","","","","") );?>
@livewire('editor-canvas-modify', [
    'editorId' => 'turtle-variables-repetition-create',
    'code' => $code,
    'title' => 'Skapa',
    'text' => 'Skriv din egen kod och använd repetitioner för att skapa en valfri figur.',
    'rows' => 18,
    'tip_text' => 'Kopiera gärna kod från ett tidigare exempel eller en uppgift för att enkelt komma igång.'
  ])
<div class="px-2 sm:px-8 lg:px-48">


  </div>
</div>
@endsection