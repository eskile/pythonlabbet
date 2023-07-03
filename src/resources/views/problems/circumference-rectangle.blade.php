@extends('template-problem')
@section('title', 'Problemlösning: Omkretsen av rektangel')
@section('description', 'Skriv ett program i Python som beräknar omkretsen av en rektangel om du får reda på bredd och höjd.')
@section('content')

<h1 class="mt-3">Beräkna omkretsen på rektangel</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Låt användaren skriva in bredd och höjd (heltal) på en rektangel och skriv sedan ut omkretsen.
    </p>
    
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                2<br>
                3<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
            10
            </div>
        </div>
    </div>
</div>
<?php 
$correctInput = json_encode( array(array("2","3"), array("7", "9")) );
$correctOutput = json_encode( array(array("10"), array("32") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.circumference-rectangle',
    'code' => '',
    'rows' => 15,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection