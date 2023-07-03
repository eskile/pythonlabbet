@extends('template-section')
@section('title', 'Introduktion - grundkurs | Pythonlabbet' )
@section('description', 'Här startar grundkursen i Python. Lär dig om vad Python är, kommenterar och indentering.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/0N8Lray6MKw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif
<h1 class="mt-5">Introduktion</h1>
<p class="mb-1">Här får du lära dig om</p>
<ul>
    <li>Vad Python är och vad det är för sorts språk</li>
    <li>Vad indentering är och varför det är viktigt i Python</li>
    <li>Hur en kommentar i koden ser ut</li>
</ul>

<div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Så fungerar det</h3>
    <p>I alla avsnitt finns en antal uppgifter. Längst ned på sidan står hur många uppgifter som är avklarade och hur många det finns i avsnittet.</p>
    <p>Alla exempel har grön bakgrundsfärg. Testa alltid att köra koden! Uppgifter har olika bakgrundsfärger beroende på typ av uppgift, när du klarat en uppgift får den grön bakgrundsfärg.</p>
    <p>Klicka på "Visa tips" om du tycker en uppgift är svår. Det finns inget krav på att alla uppgifter ska vara avklarade för att fortsätta.</p> 
    <p><b>Ta god tid på dig!</b> Läs text och exempel noga. Programmering är inte alltid lätt i början!</p>
</div>

<h2>Vad är Python?</h2>
<p>
    Python är ett programmeringsspråk som är relativt <b>lätt att skriva och läsa</b>. Det skapades 1991 av Guido van Rossum. 
    Python 3 lanserades 2008 och det är den version av Python som används här på Pythonlabbet.
</p>
<p>
    Python är ett <b>tolkat språk</b>, vilket betyder att koden tolkas medans programmet körs.
    Det finns ett antal fördelar med det, bland annat att koden med enkelhet kan köras på olika plattformar (Windows, Mac, Linux).
    En större nackdel är att tolkade språk är långsammare än språk som omvandlar koden till maskinkod (ettor och nollor), vilka kallas kompilerade språk.
</p>
<p>
    Numera är Python <b>ett av världens mest populära programmeringsspråk</b>. Stora användningsområden är webb-appar, AI (artificiell intelligens eller maskininlärning) och vetenskapliga beräkningar. 
    Men Python går att använda till det mesta.
</p>
<h2>Indentering</h2>
<p>
    Indentering innebär att en rad eller flera rader står till höger om texten ovanför. Titta igenom exemplet nedan.
</p>
<pre class="mb-4">Här kommer först två rader text
som inte har någon indentering.
    <span class="bg-green-100">Här kommer indenterad text och</span>
    <span class="bg-green-100">dessa grönmarkerade rader tillhör</span>
    <span class="bg-green-100">samma block.</span>
Nu är vi tillbaka till text utan indentering.
Här är ytterligare en rad.
    <span class="bg-blue-100">Här är ett block som är indenterad och</span>
    <span class="bg-blue-100">dessa blåa rader är ett och samma block.</span>
        <span class="bg-red-100">Nu är vi på nästa nivå indentering.</span>
Denna rad har ingen indentering.
</pre>
<p>
    Alla rader som är indenterade ovan är färgade. De rader som har samma färg har likadan indentering och tillhör samma block. Vad ett block innebär kommer du lära dig senare i den här kursen.
</p>
<p>
    En rad indenteras med <b>fyra mellanslag</b>. Här på Pythonlabbet kan du också använda <b>TAB-knappen</b>, som sitter ovanför Caps Lock, 
    och då skrivs automatiskt fyra mellanslag. Så fungerar också många andra redigerare som används för att skriva kod.
</p>
<p>
    I många programmeringsspråk
    används klamrar { } för att visa vilka rader som hör ihop. I Python görs det med indentering. I andra språk
    är indentering bara en rekommendation och programmet fungerar lika bra utan. I Python är indentering en <b>viktig del av språket</b> och programmet 
    går inte att köra om indenteringen är felaktig.
</p>
<?php $code = json_encode( array("for i in range(3):","print(i)") );?>
@livewire('editor-modify', [
    'editorId' => 'intro_indent',
    'code' => $code,
    'correctAnswer' => array("0", "1", "2"),
    'title' => 'Rätta till felet',
    'text' => 'Någon har missat att indentera rad 2 <b>ett steg</b> (en TAB eller fyra mellansteg), rätta till felet och kör sedan programmet. Observa att du inte behöver försöka förstå koden.',
    'tip_text' => 'Sätt markören vid starten av rad 2 och tryck på mellanslag fyra gånger.'
])

<p>I koden ovan ser du att vissa ord är blåfärgade och talet 3 är grönt. 
Det vanligt att inom programmering använda en editor som markerar nyckelord, inbyggda funktioner, tal med mera med olika färger.
Färgkodning används för att det ska vara lättare att läsa koden och för att snabbare hitta fel.

<h2>Kommentarer</h2>
<p>När man programmerar är det ofta viktigt att skriva kod som andra kan förstå.
Det är också viktigt för din egen skull. Det är förvånansvärt svårt att komma ihåg hur kod man själv har skrivit fungerar, bara en kort tid efteråt.</p>

<p>
En kommentar är vanlig text som ignoreras av datorn. Att använda kommentarer gör koden blir enklare och snabbare att förstå.
Exempelvis genom att kort beskriva syftet med ett block kod med en kommentar.</p>

<p>I Python skrivs kommenterar med symbolen <i>#</i>, efterföljande text räknas som en kommentar och är inte en del av programkoden.</p>
<div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Exempel</h3>
    <p>I exemplet nedan är all grön text kommentarer. </p>
    <pre><code class="language-python"># Det här är en kommentar
import math #här importerar vi Pythons matematikbibliotek.
print(math.pi) #skriver ut pi</code></pre>
            <div id="example-hello-world-code" class="hidden"># Det här är en kommentar
import math #här importerar vi Pythons matematikbibliotek.
print(math.pi) #skriver ut pi</div>
    <button type="button" id="example-hello-world" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>
<?php $code = json_encode( 
    array("Det här ska bli världens finaste program.", "print('...')")
        );?>
@livewire('editor-modify', [
    'editorId' => 'intro_comment',
    'code' => $code,
    'correctAnswer' => array("..."),
    'title' => 'Rätta till felet',
    'text' => 'Ajdå, någon har glömt att göra första raden till en kommentar. Fixa det och kör sedan programmet.',
    'tip_text' => 'En kommentar börjar med symbolen <span class="border">#</span>.'
])

@endsection