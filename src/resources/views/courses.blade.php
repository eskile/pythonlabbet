@extends('template-course')
@section('title', 'Alla kurser på Pythonlabbet | pythonlabbet.se')
@section('description', 'Lär dig Python med våra interaktiva kurser Börja rita med turtle eller börja direkt med grundkursen.')
@section('content')
    
<h1 class="mb-0">Alla kurser</h1>
<p class="text-sm text-gray-500">3 kurser - 26 avsnitt - 9 videos</p>
<p>Här finns en förteckning av alla kurser och alla avsnitt som finns på Pythonlabbet. Vi rekommenderar att börja med turtlekursen eller grundkurs del 1. 
    I <b>turtlekursen</b> lär du dig att rita med Python och det är en informell introduktion till textprogrammering. <b>Grundkursen</b> är noggrannare med begreppen utan att bli för strikt
    och output är text.</p>
    <p>I grundkursen <b>rättas uppgifterna automatiskt</b> medan i turtlekursen behöver du själv avgöra när uppgifterna är klara. Om du har en lärare kopplad till ditt konto kan läraren testa din kod
        och hjälpa dig med kommentarer.
    </p>
    <p> För att arbeta med projekten under
    <a class="text-green-500 hover:underline" href="/problemlosning">problemlösning</a> behöver du minst kunna begreppen i grundkurs del 1. </p>


<h2>Kurser att börja med</h2>   

<div class="flex justify-left flex-wrap">
    <div class="text-left w-96 p-5">
        @if(count($basics) == 9)
        <p class="mb-0 font-medium">&#9989; Grundkurs - del 1</p>
        @else
        <p class="mb-0 font-medium">Grundkurs - del I</p>
        @endif
        @include('basics-links')
    </div>

    <div class="text-left w-96 p-5">
        @if(count($turtle) >= 6)
        <p class="mb-0 font-medium">&#9989; Rita med turtle</p>
        @else
        <p class="mb-0 font-medium">Rita med turtle</p>
        @endif

        @include('turtle-links')
    </div>
    
</div>
<p>
    I <b>grundkurs del 1</b> lär du dig de allra mest centrala begreppen inom programmering. Det innefattar att visa information för användaren,
    ta emot indata och hur vi kan styra vad programmet med if-satser och logiska uttryck.
</p>
<p><b>Rita med turtle</b> ger dig en friare och visuell introduktion till textprogrammering. Först lär du dig om några turtle-funktioner som behövs
för att kunna rita. Därefter introduceras begrepp som variabler, repetitioner, funktioner och slumptal.</p>

<p>Av dessa två kurser går det bra att börja med vilken som, beroende på preferenser.</p>


<h2>Kurser att fortsätta med</h2>
<div class="flex justify-left flex-wrap">
    <div class="text-left w-96 p-5">
        @if(count($basics2) == 9)
        <p class="mb-0 font-medium">&#9989; Grundkurs - del 2</p>
        @else
        <p class="mb-0 font-medium">Grundkurs - del 2</p>
        @endif
        <p class="text-sm text-gray-500">Förkunskaper: Grundkurs del 1</p>
        @include('basics2-links')
    </div>
</div>
<p>Efter <b>grundkurs del 2</b> kan du grunderna i Python. Efter denna delkurs kommer du klara mycket på egen hand.
Du får stora möjligheter att utforska mer avancerade delar av både Python och programmering. Gärna med egna projekt!</p>
@endsection