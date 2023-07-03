@extends('template-section')
@section('title', 'Enkla beräkningar i Python')
@section('description', 'Lär dig om de vanligaste operatorerna i Python, som addition, subtraktion, multiplikation, heltalsdivision och rest.')
@section('content')

<h1></h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li></li>
    <li></li>
</ul>

@endsection


$$2^{1000}$$ mathjax
\(2^{1000}\) mathjax inline

* Länk *
<a target="_tab" class="text-green-500 hover:underline" href="https://docs.python.org/3/tutorial/floatingpoint.html">se här på python.org</a>
<a class="text-green-500 hover:underline" href=""></a>

<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/0N8Lray6MKw" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

*** EXAMPLE ***
<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p></p>
  <pre><code class="language-python">from turtle import *
#kod
  </code></pre>
  <div id="example-X-code" class="hidden">from turtle import *
#kod
  </div>
	<button type="button" id="example-X" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>


*** QUIZ ***
<?php $code = trim(json_encode("print('4' + '2')
print(4 + 2)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'simple_calc_predict',
    'code' => $code,
    'options' => ['6
6','42
6'],
    'correct' => 2
])


*** MODIFY ***
<?php $code = json_encode( array("print(1000 / 3)") );?>
@livewire('editor-modify', [
    'editorId' => 'simple_calc_modify',
    'code' => $code,
    'correctAnswer' => array("333"),
    'title' => 'Ändra i koden',
    'text' => 'Ändra i koden så att en heltalsdivision utförs istället för vanlig division.'
])

*** MODIFY CORRECT (with input) ***
<?php 
$correctInput = json_encode( array(array("42"), array("101")) );
$correctOutput = json_encode( array(array("Test av tal"), array("Test av tal", "Ditt tal är större än 100.")) );
$code = json_encode( array("print('Test av tal')", "tal = input('Skriv in ett heltal')", "if int(tal) > 100:", "    print('Ditt tal är större än 100.')") );?>
@livewire('editor-modify-correct', [
    'editorId' => 'if_modify',
    'code' => $code,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Ändra i koden',
    'add_code' => '',
    'text' => 'Ändra i koden så att en heltalsdivision utförs istället för vanlig division.'
])


*** MAKE CORRECT with input (still using modify) ***

<?php 
$correctInput = json_encode( array(array("2.0", "1.1")) );
$correctOutput = json_encode( array(array("1.1") ));
?>
@livewire('editor-modify-correct', [
    'editorId' => 'input-make',
    'code' => '',
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Räkna ut arean på en triangel',
    'text' => 'Programmet ska ta två inputs från användaren: höjden och basen på en triangel. Skriv ut arean på triangeln (skriv bara ut talet).
    Programmet ska klara av decimaltal.'
])

*** MAKE ***
@livewire('editor-make', [
    'editorId' => 'print_create', 
    'task' => 'Skriv kod som skriver ut <b>Just nu är det år</b> på första raden och <b>'.date("Y").'</b> det är på andra raden.', 
    'code' => '', 'rows' => 6,
    'correctAnswer' => array("Just nu är det år", date("Y"))
])

@livewire('progress', ['section' => Route::current()->getName() ])

@if(request()->session()->get('easy_mode'))
EASY MODE ÄR AKTIVERAT!
@endif

*** PROBLEM ***
@extends('template-problem')
@section('title', 'Problemlösning: Träna multiplikationstabellen')
@section('description', 'Skriv ett program i Python som tränar användaren i vald multiplikationstabell.')
@section('content')

<h1 class="mt-3"></h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<p>
</p>

<div class="flex mb-5">
    <div class="w-1/2">
        <h3 class="font-bold">Exempel input</h3>
        <div class="mr-2 p-2 bg-gray-200 border">
            7<br>
            3<br>
            28<br>
            15<br>
            7<br>
        </div>
    </div>
    <div class="w-1/2">
        <h3 class="font-bold">Exempel output</h3>
        <div class="p-2 bg-gray-200 border">
            4*7=<br>28 Rätt<br>
            2*7=<br>15 Fel<br>
            1*7=<br>7 Rätt<br>
            Du klarade 2 av 3
        </div>
    </div>
</div>

New problems:
https://csunplugged.org/en/plugging-it-in/binary-numbers/how-binary-digits-work/#python
https://csunplugged.org/en/plugging-it-in/kidbots/modulo/#python

<?php 
$correctInput = json_encode( array(array("4", "1", "16"), array("4", "1", "15"), array("9", "2", "36","90")) );
$correctOutput = json_encode( array(array("4*4=","16 Rätt","Du klarade 1 av 1"), array("4*4=","15 Fel","Du klarade 0 av 1"), array("4*9=","36 Rätt","10*9=","90 Rätt", "Du klarade 2 av 2") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.multiplication-table',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection