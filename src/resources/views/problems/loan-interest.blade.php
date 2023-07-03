@extends('template-problem')
@section('title', 'Problemlösning: Lån med ränta')
@section('description', 'Skriv ett program i Python som totalt lån efter ränta.')
@section('content')

<h1 class="mt-3">Lån med ränta</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Anton ska köpa bil och funderar på att ta ett billån. Räntan är 5%. Låt Anton skriva in hur stort lån han vill ta (hela kronor) och skriv sedan ut hur stort lånet kommer att vara efter varje år i fem år om han varken betalar ränta eller amortering.
    </p>
    <p>Om lånet är 10 000 kr är lånet efter 1 år: \(10000\cdot1.05\) kr och efter två år är lånet \(10000\cdot1.05\cdot1.05\) kr eller \(10000\cdot1.05^2\) kr.</p>
    <p>Använd den inbyggda funktionen <i>round()</i> för att avrunda lånet till ett heltal. Exempelvis är <i>round(2.75)</i> lika med 3. Skriv ut lånesumman utan enhet.</p>
    
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                10000<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
            10500<br>
            11025<br>
            11576<br>
            12155<br>
            12763
            </div>
        </div>
    </div>
</div>
<?php 
$correctInput = json_encode( array(array("100"), array("1")) );
$correctOutput = json_encode( array(array("105","110","116","122","128"), array("1","1","1","1","1") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.loan-interest',
    'code' => '',
    'rows' => 15,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection