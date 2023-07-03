@extends('template-course')
@section('title', 'Grunderna i Python | pythonlabbet.se')
@section('description', 'Lär dig grunderna i Python med hjälp av vår interaktiva kurs i två delar.')
@section('content')
    
<h1 class="mb-0">Grundkursen</h1>
<p class="text-sm text-gray-500">18 avsnitt - 9 videos</p>
<h2>Om kursen</h2>
<p>
    I grundkursen får du lära dig grunderna för att programmera med Python. Kursen är uppdelad i två delar. 
    Efter den första delen har du tillräckliga kunskaper för att lösa problem på egen hand under <a class="text-green-500 hover:underline" href="/problemlosning">problemlösning</a>.
    
</p>
<p>
    I <b>del 1</b> lär du dig de allra mest centrala begreppen inom programmering. Det innefattar att visa information för användaren,
    ta emot indata och hur vi kan styra vad programmet med if-satser och logiska uttryck.
</p>
<p>Efter <b>del 2</b> är du en riktig pythonprogrammerare. Med denna delkurs kommer du klara mycket på egen hand.
Dessutom har du med dessa grunder stora möjligheter att utforska mer avancerade delar av både Python och programmering.</p>

<div class="flex justify-center flex-wrap">
    <div class="text-left w-96 p-5">
        @if(count($basics) == 9)
        <p class="mb-0 font-medium">&#9989; Grundkurs - del 1</p>
        @else
        <p class="mb-0 font-medium">Grundkurs - del I</p>
        @endif
        @include('basics-links')
    </div>

    <div class="text-left w-96 p-5">
        @if(count($basics2) == 9)
        <p class="mb-0 font-medium">&#9989; Grundkurs - del 2</p>
        @else
        <p class="mb-0 font-medium">Grundkurs - del 2</p>
        @endif

        @include('basics2-links')
        

    </div>
</div>

@endsection