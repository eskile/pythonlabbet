@extends('template-problem')
@section('title', 'Problemlösning: Gottfried Leibniz formel')
@section('description', 'Beräkna pi i Python med hjälp Gottfried Leibniz formel.')
@section('content')

<h1 class="mt-3">Beräkna pi med Gottfried Leibniz formel</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Enligt Gottfried och Leibniz går det att beräkna pi med hjälp av följande formel:
    $$\frac{\pi}{4} = 1 - \frac{1}{3} + \frac{1}{5} - \frac{1}{7} + \frac{1}{9} - ...$$
    Låt användaren välja antal termer som input. Skriv sedan ut vad närmevärdet på pi blir. I formeln ovan visas fem termer. Glöm inte bort 4:an!
    </p>
    <p>Experimentera gärna med ditt program. Hur många termer behöver du för att få två decimalers noggrannhet på pi? Fem decimaler?
    $$\pi = 3.1415926535...$$
    Ovan visas pi med de första tio korrekta decimalerna.
    </p>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                1
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
                4.0
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 2</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                5
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 2</h3>
            <div class="p-2 bg-gray-200 border">
                3.33968253968254
            </div>
        </div>
    </div>
</div>

<?php 
$correctInput = json_encode( array(array("1000") ) );
$correctOutput = json_encode( array(array("3.140592653839794") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.pi-gottfried-leibniz',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection