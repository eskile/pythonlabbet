@extends('template-problem')
@section('title', 'Problemlösning: Största primfaktor')
@section('description', 'Project Eulers tredje problem översatt till svenska.')
@section('content')

<h1 class="mt-3">Största primfaktor</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Primfaktorerna i 13195 är 5, 7, 13 och 29.</p>
    <p>Vad är den största primfaktorn i 600851475143?</p>
    <p>Skriv endast ut denna primfaktor för att få rätt.</p>
</div>
<p class="text-sm">Detta är en svenska översättning av det <a target="_tab" class="text-green-500 hover:underline" href="https://projecteuler.net/problem=3">tredje problemet</a> på Project Euler.</p>

<?php 
$correctInput = json_encode( array(array("0") ));
$correctOutput = json_encode( array(array("6857")));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.euler-largest-prime-factor',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection