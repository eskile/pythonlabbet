@extends('template-problem')
@section('title', 'Problemlösning: Jämna Fibonacci-tal')
@section('description', 'Project Eulers andra problem översatt till svenska.')
@section('content')

<h1 class="mt-3">Jämna Fibonacci-tal</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Varje nytt tal i Fibonacci-talföljden är summan av de två tidigare talen. Startar vi med 1 och 2, så är det första tio talen som följer.</p>
    <p>1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ...</p>
    <p>Hitta <b>summan</b> av de tal i Fibonacci-talföljden som inte överstiger fyra miljoner och är jämna tal. Skriv endast ut summan.</p>
</div>

<p class="text-sm">Detta är en svenska översättning av det <a target="_tab" class="text-green-500 hover:underline" href="https://projecteuler.net/problem=2">andra problemet</a> på Project Euler.</p>

<?php 
$correctInput = json_encode( array(array("0") ));
$correctOutput = json_encode( array(array("4613732")));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.euler-even-fibonacci-numbers',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection