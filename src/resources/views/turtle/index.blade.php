@extends('template-course')
@section('title', 'Rita med turtle-modulen i Python | pythonlabbet.se')
@section('description', 'Lär dig grunderna i Python med hjälp av turtle-modulen och genom att rita med olika funktioner. ')
@section('content')
    
<h1 class="mb-0">Rita med turtle</h1>
<!-- <p class="text-sm text-gray-500">18 avsnitt - 9 videos</p> -->
<h2>Om kursen</h2>
<p>Här kommer du lära dig grunderna i Python med hjälp av modulen turtle. Turtle används för att rita på en rityta.</p>
<p>Först lär du dig om enkla ritfunktioner för att sedan lära om variabler, repetioner, funktioner och slumpen.</p>

<div class="flex justify-center flex-wrap">
    <div class="text-left w-96 p-5">
        @if(count($turtle) == 9)
        <p class="mb-0 font-medium">&#9989; Turtle</p>
        @else
        <p class="mb-0 font-medium">Turtle</p>
        @endif
        @include('turtle-links')
    </div>

</div>

@endsection