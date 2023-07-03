@extends('template-problem')
@section('title', 'Problemlösning: Kvadratsumma differens')
@section('description', 'Project Eulers sjätte problem översatt till svenska.')
@section('content')

<h1 class="mt-3">Kvadrat summa differens</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Summan av kvadraterna av de första tio naturliga talen är
        $$1^2+2^2+...+10^2=385$$
    Kvadraten av summan av de första tio naturliga talen är
        $$(1+2+...+10)^2=55^2=3025$$
    I detta fall är differensen mellan summan av kvadraterna och kvadraten av summan \( 3025-385=2640 \).
    </p>
    <p>Skriv ut differensen mellan summan av kvadraterna av de första 100 naturliga talen och kvadraten av summan.</p>
</div>
<p class="text-sm">Detta är en svenska översättning av det <a target="_tab" class="text-green-500 hover:underline" href="https://projecteuler.net/problem=6">sjätte problemet</a> på Project Euler.</p>

<?php 
$correctInput = json_encode( array(array("0") ));
$correctOutput = json_encode( array(array("25164150")));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.euler-sum-square-difference',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])
@endsection