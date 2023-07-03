@extends('template-problem')
@section('title', 'Problemlösning: Multipler av 3 och 5')
@section('description', 'Project Eulers första problem översatt till svenska.')
@section('content')

<h1 class="mt-3">Multiplar av 3 och 5</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Om vi listar alla naturliga tal under 10 som är multiplar av 3 och 5, så får vi 3, 5, 6 och 9. Summan av dessa multiplar är 23. 
    </p>
    <p>Hitta summan av alla multiplar av 3 och 5 under 1000. Skriv endast ut summan.</p>
</div>

<p class="text-sm">Detta är en svenska översättning av det <a target="_tab" class="text-green-500 hover:underline" href="https://projecteuler.net/problem=1">första problemet</a> på Project Euler.</p>

<?php 
$correctInput = json_encode( array(array("0") ));
$correctOutput = json_encode( array(array("233168")));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.euler-multiples-3-5',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
])

@endsection