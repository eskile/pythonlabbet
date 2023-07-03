@extends('template-problem')
@section('title', 'Problemlösning: Summan av tärningskast')
@section('description', 'Skriv ett program i Python som simulerar tärningskast med n tärningar.')
@section('content')

<h1 class="mt-3">Summan av tärningskast</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Fråga användaren hur många tärningar n som den vill kasta. Slumpa sedan n tal mellan 1 och 6 och summera dessa. Skriv ut resultatet (endast talet).
    </p>

    <p>Testa gärna många tärningar. Stämmer summan med vad du förväntar dig?</p>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                1
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output</h3>
            <div class="p-2 bg-gray-200 border">
                3
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                10
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output</h3>
            <div class="p-2 bg-gray-200 border">
                36
            </div>
        </div>
    </div>
</div>

<?php 
$correctInput = json_encode( array(array("1000"), array("42")) );
$correctOutput = json_encode( array(array("3443"), array("133") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.dice-sum',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection