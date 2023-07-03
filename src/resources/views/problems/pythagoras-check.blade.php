@extends('template-problem')
@section('title', 'Problemlösning: Är triangeln rätvinklig?')
@section('description', 'Skriv ett program i Python som kontrollerar om triangelns sidor innebär att triangeln är rätvinklig.')
@section('content')

<h1 class="mt-3">Är triangeln rätvinklig?</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>För rätvinkliga trianglar säger Pythagoras sats att 
    $$a^2+b^2=c^2$$
    där a och b är kateter och c är hypotenusen. 
    </p>
    <p>Pythagoras sats gäller <b>om och endast om</b> triangeln är rätvinklig, vilket betyder att om ekvationen inte är uppfyllt så är triangeln inte rätvinklig.</p>
    <p>Ditt program ska ta tre inputs, a, b och c, i den ordningen. Programmet behöver endast fungera för heltal. Skriva ut <span class="border">Ja</span> om triangeln
    är vinkelrät och <span class="border">Nej</span> om så inte är fallet.

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                3<br>
                4<br>
                5<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output</h3>
            <div class="p-2 bg-gray-200 border">
                Ja
            </div>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                1<br>
                2<br>
                3<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output</h3>
            <div class="p-2 bg-gray-200 border">
                Nej
            </div>
        </div>
    </div>
</div>
<?php 
$correctInput = json_encode( array(array("3", "4", "6"), array("12", "5", "13"), array("20", "21", "29")) );
$correctOutput = json_encode( array(array("Nej"), array("Ja"), array("Ja") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.pythagoras-check',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection