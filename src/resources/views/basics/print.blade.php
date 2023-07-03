@extends('template-section')
@section('title', 'print() - Skriv ut i Python')
@section('description', 'Lär dig skriva ut text och tal på skärmen med Python. Med flera interaktiva övningar blir det enkelt att lära sig programmering.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/wQMlYxpV60k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif
<h1 class="mt-5">Funktionen print</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Skriva ut text med <i>print</i></li>
    <li>Skriva ut tal med <i>print</i></li>
</ul>
<h2>Skriva ut text</h2>
<p>Ett enkelt sätt att få ditt program att kommunicera med omvärlden är att skriva ut text på skärmen. I Python görs det med funktionen <i>print</i>.</p>
<div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Exempel</h3>
    <p>Skriver ut texten <span class="border">Hello World</span> på skärmen. Tecknet <span class="border">'</span> hittar du precis till vänster om enter-knappen.</p>
    <pre><code class="language-python">print('Hello World!') #Skriver ut Hello World!</code></pre>
    <div id="example-hello-world-code" class="hidden">print('Hello World!') #Skriver ut Hello World!</div>
    <button type="button" id="example-hello-world" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>
<p>
    <i>Hello World</i> är ett exempel på vad som inom programmering kallas för en textsträng eller bara <b>sträng</b>. 
    I Python kan <i>print</i> användas till att skriva ut strängar, tal, listor och mycket annat.
    Det är ofta användbart när man programmerar för att se vad som händer i programmet och för att kommunicera med användaren.
    Notera att vi använder <i>'</i> runt strängen för att berätta för Python att det är en sträng.
</p>

<?php $code = trim(json_encode("#Jag vill bara säga en sak
print('Jag älskar Python.')"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'print_predict',
    'code' => $code,
    'options' => ['print(\'Jag älskar Python.\')','Jag älskar Python.', '\'Jag älskar Python.\''],
    'correct' => 2,
    'correct_text' => 'Rätt, det är texten innanför enkelcitationstecknen som skrivs ut.'
])

<h2>Skriva ut tal</h2>
<p>
    Med <i>print</i> kan vi även skriva ut tal. Det går också bra att göra en uträkning inuti parentesen. Observera att inom programmering används
    <b>decimalpunkt</b> istället för decimalkomma. Exempelvis skrivs 3,14 som 3.14 i vår kod nedan. Observa också att en asterisk <i>*</i> används för multiplikation.
</p>

<div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Exempel</h3>
    <p>Ett par exempel där vi skriver ut tal</p>
    <pre><code class="language-python">print(42) #Skriver ut 42
print(3.14*5*5) #Räknar ut 3.14*5*5 och skriver ut resultatet
    </code></pre>
    <div id="example-hej-varlden-code" class="hidden">print(42)
print(3.14*5*5)</div>
    <button type="button" id="example-hej-varlden" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>
<p>
    Som du ser i exemplet ovan ger varje ny print en ny rad. Så fungerar <i>print</i> som standard, så länge vi inte ger funktionen andra inställningar.
</p>
<?php $code = trim(json_encode("print('10 / 3 = ')
print(10 / 3)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'print_predict2', 
    'code' => $code,
    'options' => ['10 / 3 = 3,333333333333333','10 / 3 =
3.333333333333333'],
        'correct' => 2,
        'correct_text' => 'Bra! Varje ny print ger en ny rad i utskriften (det går att ställa in print för att göra annorlunda men det tar vi senare).'
    ])

<p>I ett senare avsnitt ska vi lära oss hur vi kan skriva ut både tal och en textsträng på samma rad.
Nu är det dags att prova ändra i koden och skriva ett första eget program.</p>


<?php $code = json_encode( array("print(Hej du!)") );?>
@livewire('editor-modify', [
    'editorId' => 'print_find',
    'code' => $code,
    'correctAnswer' => array("Hej du!"),
    'tip_text' => "Texten innanför parentesen är inte en sträng. Om texten har symbolen <span class=\"border\">'</span> på båda sidor om sig blir det en sträng."
])

<p>
    Felet ovan är ett såkallat syntax error. Det är den enklaste sortens fel att åtgärda. I felmeddelandet får vi ofta
    reda på att det är just en felskrivning och vilken rad felet är på. 
</p>

@livewire('editor-make', [
    'editorId' => 'print_create', 
    'text' => 'Skriv kod som skriver ut <b>Just nu är det år</b> på första raden och <b>'.date("Y").'</b> på andra raden.', 
    'code' => '', 'rows' => 6,
    'correctAnswer' => array("Just nu är det år", date("Y")),
    'tip_text' => "Använd funktionen <span class=\"border\">print</span> för att skriva ut en rad. Exempelvis <span class=\"border\">print('Just nu är det år')</span>."
])

@endsection