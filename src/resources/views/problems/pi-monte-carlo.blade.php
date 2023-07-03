@extends('template-problem')
@section('title', 'Problemlösning: Uppskatta pi med hjälp av slumptal')
@section('description', 'Skriv ett program i Python som uppskattar pi med hjälp av slumptal, en kvadrat och en cirkel.')
@section('content')

<h1 class="mt-3">Uppskatta pi med hjälp av slumptal</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Din uppgift är att man hjälp av en cirkel inskriven i en kvadrat, uppskatta värdet av pi. 
    Tänk dig att du slumpar ut punkter inom kvadraten nedan. De flesta punkter hamnar inom cirkeln medan en del hamnar utanför den.
    Använd det för att göra en uppskattning på pi.
    </p>
    <div class="text-center py-4">
        <img class="mx-auto max-h-48" src="/img/circle-in-square.svg">
    </div>
    <p>Programmet tar ett heltal som input: Antal punkter n som ska slumpas ut.</p>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                10
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
                3.2
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 2</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                10000
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 2</h3>
            <div class="p-2 bg-gray-200 border">
                3.1544
            </div>
        </div>
    </div>
</div>

<p class="text-sm">Observera att "Exempel output" inte behöver stämma exakt eftersom det är slumptal involverade. Men du bör se att närmevärdet på pi blir bättre med större n.</p>

<?php 
$correctInput = json_encode( array(array("10"), array("100"), array("1000")) );
$correctOutput = json_encode( array(array("3.2"), array("3.04"), array("3.104") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.pi-monte-carlo',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här. Klicka på "Klarmarkera" när du löst uppgiften.',
    'useDoneButton' => true
])

@endsection