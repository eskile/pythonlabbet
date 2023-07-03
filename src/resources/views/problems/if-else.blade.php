@extends('template-problem')
@section('title', 'Problemlösning: Tillämpa if och else')
@section('description', 'Skriv ett program i Python som skriver ut olika saker beroende på användarens input.')
@section('content')

<h1 class="mt-3">Vilket programmeringsspråk gillar du?</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Fråga användaren vilket programmeringsspråk de gillar mest. Skriv ut <span class="border">Du är klok!</span> om <span class="border">Python</span> eller <span class="border">python</span> skrivs in och skriv ut <span class="border">Du är tokig!</span>
    om något annat skrivs in.
    </p>
    
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                Python<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-200 border">
            Du är klok!
            </div>
        </div>
    </div>
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 2</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                python<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 2</h3>
            <div class="p-2 bg-gray-200 border">
            Du är klok!
            </div>
        </div>
    </div>
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 3</h3>
            <div class="mr-2 p-2 bg-gray-200 border">
                C++<br>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 3</h3>
            <div class="p-2 bg-gray-200 border">
            Du är tokig!
            </div>
        </div>
    </div>
</div>
<?php 
$correctInput = json_encode( array(array("Python"), array("python"), array("Java")) );
$correctOutput = json_encode( array(array("Du är klok!"), array("Du är klok!"), array("Du är tokig!") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.if-else',
    'code' => '',
    'rows' => 15,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection