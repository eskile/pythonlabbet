@extends('template-problem')
@section('title', 'Problemlösning: Bestäm veckodag')
@section('description', 'Skriv ett program i Python räknar ut vilken veckodag det är utifrån datum.')
@section('content')

<h1 class="mt-3">Bestäm veckodag</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del 2</p>
<div id="problem-text">
    <p>Bestäm vilken veckodag det är utifrån ett datum på formatet <em>yyyy-mm-dd</em>.
    Programmet ska klara alla datum från 1900-01-01 till och med 2100-01-01.
    Guldstjärna om ditt program klarar ett större intervall &#11088;!
</p>

    <p>Skriv ut <span class="border">Ogiltigt</span> om datumet inte finns.</p>

    <p>Tänk på att det är skottår var fjärde år. 
        Undantag från var fjärde år gäller för årtal som är delbara med 100.
        Det finns i sin tur ett undantag från den regeln om årtalet är delbart med 400.
        Därför är t.ex. år 1600 och år 2000 skottår, trots att de är delbara med 100.
    </p>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                2022-12-13<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
            Tisdag
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 2</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                1983-08-18<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 2</h3>
            <div class="p-2 bg-gray-200 border">
            Torsdag
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 3</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                2050-01-01<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 3</h3>
            <div class="p-2 bg-gray-200 border">
            Lördag
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 4</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                1900-01-01<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 4</h3>
            <div class="p-2 bg-gray-200 border">
            Måndag
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 5</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                2023-02-29<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 5</h3>
            <div class="p-2 bg-gray-200 border">
            Ogiltigt
            </div>
        </div>
    </div>
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 6</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                2023-09-31<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 6</h3>
            <div class="p-2 bg-gray-200 border">
            Ogiltigt
            </div>
        </div>
    </div>
</div>
<?php 
$correctInput = json_encode( array(array("2100-01-01"), array("1905-03-01"), array("1969-07-31"), array("2030-12-13"), array("1900-01-01"), array("2024-02-29"), array("2022-00-01"), array("2022-13-01"), array("2022-12-32"), array("2022-12-00"), array("2022-11-31")) );
$correctOutput = json_encode( array(array("Fredag"), array("Onsdag"), array("Torsdag"), array("Fredag"), array("Måndag"), array("Torsdag"), array("Ogiltigt"), array("Ogiltigt"), array("Ogiltigt"), array("Ogiltigt"), array("Ogiltigt") ));
//$correctInput = json_encode( array(array("1000"), array("42")) );
//$correctOutput = json_encode( array(array("3443"), array("133") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.weekday',
    'code' => '',
    'rows' => 15,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.',
])

@endsection