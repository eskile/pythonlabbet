@extends('template-section-canvas')
@section('title', 'Introduktion till Turtle | Pythonlabbet' )
@section('description', 'Lär dig grunderna i Python genom att rita med modulen Turtle.')
@section('content')
@include('reference', ['turtle' => true])

<div class="max-w-screen-xl mx-auto">
  <div class="px-2 sm:px-8 lg:px-48">

    <h1>Introduktion till turtle</h1>
    <p class="mb-1">Här får du lära dig</p>
    <ul>
        <li>använda <i>turtle</i> för att rita på skärmen</li>
        <li>att rita en kvadrat i olika färger</li>
    </ul>

  <div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Så fungerar det</h3>
    <p>I alla avsnitt finns en antal uppgifter. Längst ned på sidan står hur många uppgifter som är avklarade och hur många det finns i avsnittet.</p>
    <p>Alla exempel har grön bakgrundsfärg. Testa alltid att köra koden! Uppgifter har olika bakgrundsfärger beroende på typ av uppgift. Tryck på "<b>Markera klar</b>" när du känner dig klar med en uppgift.</p>
    <!-- <p>Klicka på "Visa tips" om du tycker en uppgift är svår. Det finns inget krav på att alla uppgifter ska vara avklarade för att fortsätta.</p>  -->
    <p>Det finns inget krav på att alla uppgifter ska vara avklarade för att fortsätta.</p> 
    <p><b>Ta god tid på dig!</b> Läs text och exempel noga. Programmering är inte alltid lätt i början!</p>
  </div>

    <h2>En sköldpadda</h2>
    <p>I Python finns en modul som heter <i>turtle</i> för att rita på skärmen. 
    Turtle är enkelt att använda och används främst i undervisningssyfte.</p>
    <p>Du styr en sköldpadda som <b>ritar med en penna när den vandrar</b>. 
      Sköldpaddan kan gå framåt, bakåt och den kan vrida på sig.
      Den kan också ta upp pennan så att den inte ritar medan den vandrar
      och senare sätta ner pennan igen.
    </p>
    <p>För att få tillgång till ritfunktionerna skriver vi <i>from turtle import *</i>.
    Den koden innebär att vi importerar alla funktioner som finns i modulen turtle. Efter importen
    kan vi använda funktionerna.</p>

    <h2>Gå framåt</h2>
    <p>Vi börjar med att få sköldpaddan att gå framåt. Sköldpaddan börjar i mitten av ritrutan
      och huvudet är riktat åt höger. Skriv <i>forward(100)</i> för att sköldpaddan
      ska röra sig 100 steg framåt. Som standard är ritrutan 400 x 400. I ett senare avsnitt ska vi lära oss ändra storleken på ritrutan.
</p>
    <p>I det här avsnittet används <i>shape('turtle')</i> för att rita som en sköldpadda. 
    Standardfiguren är en triangel.</p>  

<div class="bg-green-100 p-8 mb-4">
      <h3 class="text-2xl">Exempel</h3>
      <p>Vi låter sköldpaddan gå framåt 100 steg. </p>
      <pre><code class="language-python">from turtle import *
shape('turtle')

forward(100)</code></pre>
    <div id="example-fd-code" class="hidden">from turtle import *
shape('turtle')

forward(100)</div>
      <button type="button" id="example-fd" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>

<p>Prova gärna att ändra antalet steg i exemplet ovan. Se också vad som händer om du tar bort raden <i class="border">shape('turtle')</i> ?

<div class="bg-green-100 p-8 mb-4">
      <h3 class="text-2xl">Exempel</h3>
      <p>Vi låter sköldpaddan gå bakåt 100 steg. </p>
      <pre><code class="language-python">from turtle import *
shape('turtle')

back(100)</code></pre>
    <div id="example-bw-code" class="hidden">from turtle import *
shape('turtle')

back(100)</div>
      <button type="button" id="example-bw" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>

<h2>Svänga</h2>
<p>För att svänga sköldpaddan 90 grader vänster och höger skrivs <i>left(90)</i> respektive <i>right(90)</i>.
Inuti parantesen går det att skriva vilket gradtal som helst.

    <div class="bg-green-100 p-8 mb-4">
      <h3 class="text-2xl">Exempel</h3>
      <p>Svänga vänster och höger med 90 grader.</p>
      <pre><code class="language-python">left(90) #sväng vänster
forward(100) #gå framåt
right(90) #sväng höger
forward(100) #gå framåt</code></pre>
      <div id="example-turn-code" class="hidden">from turtle import *
shape('turtle')

left(90) #sväng vänster
forward(100) #gå framåt
right(90) #sväng höger
forward(100) #gå framåt</div>
      <button type="button" id="example-turn" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    </div>

<p>I exemplet ovan står så kallade <b>kommentarer</b> efter de fyra kommandona. 
  En kommentar startas med <i>#</i> och ignoreras av Python. Nu till den första uppgiften.</p>

</div>  
<?php $code = json_encode( array("from turtle import *", "shape('turtle')", "", "forward(100)", "left(90)","forward(100)", "left(90)","forward(100)", "left(90)","forward(100)", "left(90)" ) );?>
@livewire('editor-canvas-quiz', [
  'editorId' => 'turtle-quiz-intro-square',
  'code' => $code,
  'options' => ['En rak linje','En triangel', 'En kvadrat', "En cirkel"],
  'correct' => 3,
  'correct_text' => 'Rätt!'
])
<div class="px-2 sm:px-8 lg:px-48">
  
<h2>Färger</h2>
<p>Vi kanske vill rita finare figurer med färger. 
  Med funktionen <i>color(färg)</i> där <em>färg</em> är en så kallad textsträng eller bara <b>sträng</b>
  kan vi ändra färgen på sköldpaddans penna. 
  Det går bra att anropa den här funktionen flera gånger i ett program.  


<p>En textsträng är helt enkelt en sträng av tecken, till exempel bokstäver. 
  I Python skrivs en sträng genom att använda <i>''</i> eller <i>""</i>. 
Vi har faktiskt redan använt en sträng ovan när vi skrev <i>'turtle'</i>. </p>

<p>Till exempel kan vi anropa funktionen <i>color</i> med <i>'red'</i> eller <i>'blue'</i> som <b>argument</b>. 
Argument är det som står innan för parantesen, alltså <em>färg</em>.
Vi tittar på ett exempel där vi ritar med både röd och blå färg.</p>
  
<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Rita en röd linje och en blå linje.</p>
  <pre><code class="language-python">color('blue') #ändra färg till blå
forward(50)
color('red') #ändra färg till röd
forward(500)
  </code></pre>
  <div id="example-two-colors-code" class="hidden">from turtle import *
shape('turtle')

color('blue') #ändra färg till blå
forward(50)
color('red') #ändra färg till röd
forward(50)</div>
	<button type="button" id="example-two-colors" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>


<p>Det finns 140 olika färger med namn - <a target="_tab" class="text-green-500 hover:underline" href="https://www.w3schools.com/colors/colors_hex.asp">här kan du se alla</a>.
Rutorna nedan visar några vanliga färger och motsvarande engelska namn. Det spelar ingen roll om du använder stora eller små bokstäver för färg.
</p>
<div class="flex flex-wrap mb-3">
  <div class="w-36 h-12 text-white flex" style="background-color:#000000"><span class="text-xl m-auto">Black</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#c0c0c0"><span class="text-xl m-auto">Silver</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#808080"><span class="text-xl m-auto">Gray</span></div>
  <div class="w-36 h-12 flex" style="background-color:#ffffff"><span class="text-xl m-auto">White</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#ff0000"><span class="text-xl m-auto">Red</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#008000"><span class="text-xl m-auto">Green</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#0000ff"><span class="text-xl m-auto">Blue</span></div>
  <div class="w-36 h-12 flex" style="background-color:#ffff00"><span class="text-xl m-auto">Yellow</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#800080"><span class="text-xl m-auto">Purple</span></div>
  <div class="w-36 h-12 flex" style="background-color:#ffc0cb"><span class="text-xl m-auto">Pink</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#ffa500"><span class="text-xl m-auto">Orange</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#a52a2a"><span class="text-xl m-auto">Brown</span></div>
  <div class="w-36 h-12 flex" style="background-color:#00ffff"><span class="text-xl m-auto">Cyan</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#00008b"><span class="text-xl m-auto">DarkBlue</span></div>
  <div class="w-36 h-12 flex" style="background-color:#add8e6"><span class="text-xl m-auto">LightBlue</span></div>
  <div class="w-36 h-12 flex" style="background-color:#00ff00"><span class="text-xl m-auto">Lime</span></div>
  <div class="w-36 h-12 flex" style="background-color:#ff00ff"><span class="text-xl m-auto">Magenta</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#800000"><span class="text-xl m-auto">Maroon</span></div>
  <div class="w-36 h-12 text-white flex" style="background-color:#808000"><span class="text-xl m-auto">Olive</span></div>
  <div class="w-36 h-12 flex" style="background-color:#7fffd4"><span class="text-xl m-auto">Aquamarine</span></div>
</div>

<p>Det finns naturligtvis sätt att rita vilken färg om helst. Vi återkommer till hur.</p>
<p>Nu ska du få göra den första interaktiva övningen. Följ instruktionen och klicka på "Markera klar" när du är nöjd med vad du gjort.</p>
  </div>  
  <?php $code = json_encode( array("from turtle import *", "shape('turtle')", "", "#ändra färg här", "forward(100)", "left(90)","#ändra färg här","forward(100)", "left(90)","color('lightblue')","forward(100)", "left(90)","color('blue')","forward(100)", "left(90)" ) );?>
  @livewire('editor-canvas-modify', [
    'editorId' => 'turtle-intro-colored-square',
    'code' => $code,
    'title' => 'Ändra i koden',
    'text' => 'I kvadraten som ritas har två sidor en annan färg än svart. Ändra i koden så att kvadraten har olika färger på alla sidor. Glöm inte att klicka på "Markera klar" när du är färdig.',
    'tip_text' => 'Byt raderna <span class="border">#ändra färg här</span> mot till exempel <span class="border">color(\'cyan\')</span> och <span class="border">color(\'darkblue\')</span>.'
  ])
  
  <?php $code = json_encode( array("from turtle import *", "shape('turtle')", "", "forward(100)", "left(120)","forward(100)","#sväng vänster 120 grader", "", "#gå framåt 100 steg","") );?>
  @livewire('editor-canvas-modify', [
    'editorId' => 'turtle-intro-create-triangle',
    'code' => $code,
    'title' => 'Skapa',
    'text' => 'Fortsätt på koden och rita en triangel. Glöm inte att klicka på "Markera klar" när du är färdig.',
    'tip_text' => 'Gör precis som kommentarerna i koden säger.'
  ])  
  <div class="px-2 sm:px-8 lg:px-48">
  </div>
</div>
@endsection