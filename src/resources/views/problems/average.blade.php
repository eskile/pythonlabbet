@extends('template-problem')
@section('title', 'Problemlösning: Medelvärdet')
@section('description', 'Skriv ett program i Python som beräknar medelvärdet av alla tal som användaren matar in.')
@section('content')

<h1 class="mt-3">Beräkna medelvärdet</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Skriv ett program som låter användaren skriva in ett antal tal, ett efter ett, och beräkna medelvärdet. Användaren avslutar inmatningen med <i>x</i>. Skriv endast ut medelvärdet.
    </p>
    <p>Du behöver inte hantera fallet att användaren inte skriver in något tal.</p>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                10<br>
                5<br>
                3<br>
                x<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
                6.0
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 2</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                -1.5<br>
                7.8<br>
                x<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 2</h3>
            <div class="p-2 bg-gray-200 border">
                3.15
            </div>
        </div>
    </div>
</div>

<?php 
$correctInput = json_encode( array(array("1", "2", "3", "x"), array("-4", "10.5","x"), array("-1", "-2", "-3.0", "x")) );
$correctOutput = json_encode( array(array("2.0"), array("3.25"), array("-2.0") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.average',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection