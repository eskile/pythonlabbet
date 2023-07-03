@extends('template-course')
@section('title', 'Grundkurs del II i Python | pythonlabbet.se')
@section('description', 'Här fortsätter grundkursen med begrepp som funktioner, listor, slices, tuples och mycket annat. Lär dig grunderna i Python med hjälp av vår interaktiva kurs.')
@section('content')
<div class="px-0 sm:px-8 md:px-24 lg:px-24 xl:px-48 py-4 lg:py-12">
    @if(count($basics2) == 9)
    <h1>&#9989; Grundkurs - del 2</h1>
    <p>Du är klar med den här delkursen.</p>
    @else
    <h1>Grundkurs - del 2</h1>
    <p>Välkommen till den andra delen av grundkursen i Python. Efter att du klarat denna del har du kunskaper för att verkligen testa dina vingar inom programmering.</p>
    @endif
    <div>
        @include('basics2-links')

    </div>
</div>
@endsection