@extends('template-problem')
@section('title', 'Problemlösning: Sannolikhet n händelser')
@section('description', 'Skriv ett program i Python som beräknar sannolikheten för n händelser med sannolikheten 1/n.')
@section('content')

<h1 class="mt-3">Sannolikhet vid n händelser</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Säg att det är 1% chans att vinna på en lott.
    Det är då lätt att tänka att om vi köper 100 lotter så kommer vi i princip säkert vinna på någon lott.
    Eller att vi köper 1000 lotter och att sannolikheten för vinst på varje lott är 1/1000 = 0.001 (0,1%). Då är det väl nästan säkert vi vinner?
    Eller vad är sannolikheten egentligen?
    </p>
    <p>Din uppgift är att beräkna sannolikheten för vinst om du köper n lotter och sannolikheten för vinst på en lott är 1/n.</p>
    <p>Enda input från användaren är heltalet n, och enda utskrift är sannolikheten för minst en vinst. 
        Avrunda svaret till fyra decimaler med hjälp av <i>round(p,4)</i>.</p>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                2
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
                0.75
            </div>
        </div>
    </div>
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 2</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                3
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 2</h3>
            <div class="p-2 bg-gray-200 border">
                0.7037
            </div>
        </div>
    </div>
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 3</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                4
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 3</h3>
            <div class="p-2 bg-gray-200 border">
                0.6836
            </div>
        </div>
    </div>
</div>

<p class="text-sm">PS. Om du har lärt dig om talet e, räkna ut 1 - 1/e och jämför med resultatet för ett stort n i den här uppgiften.</p>

<?php 
$correctInput = json_encode( array(array("10"), array("1000")) );
$correctOutput = json_encode( array(array("0.6513"), array("0.6323") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.probability-one-over-n',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection