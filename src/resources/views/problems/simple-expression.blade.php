@extends('template-problem')
@section('title', 'Problemlösning: Beräkna uttrycket')
@section('description', 'Skriv ett program i Python som beräknar uttrycket i problemtexten.')
@section('content')

<h1 class="mt-3">Beräkna uttrycket</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Skriv ett program som beräknar och skriver ut vad uttrycket nedan är lika med.
    $$\dfrac{2^{10} \cdot 3^5}{1+5\cdot107}$$
    </p>

    <p>Täljaren är ungefär lika med 250 000 och nämnaren är drygt 500. Svaret bör alltså vara ungefär 500. Var noggrann med parenteser!</p>
</div>

<?php 
$correctInput = json_encode( array(array(0)) );
$correctOutput = json_encode( array(array("464.2388059701493") ) );
?>
@livewire('editor-problem', [
    'editorId' => 'problem.simple-expression',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection