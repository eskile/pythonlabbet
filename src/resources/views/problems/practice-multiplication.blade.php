@extends('template-problem')
@section('title', 'Problemlösning: Träna multiplikationstabellen')
@section('description', 'Skriv ett program i Python som tränar användaren i vald multiplikationstabell.')
@section('content')

<h1 class="mt-3">Träna multiplikationstabellen</h1>
<p class="mb-1 text-sm italic">Förkunskaper: Grundkurs del I</p>
<div id="problem-text">
    <p>Dags att träna <a target="_tab" href="https://sv.wikipedia.org/wiki/Pippi_L%C3%A5ngstrump_(bok)">pluttifikation</a>! 
    Ditt program tar först två heltal som input, vilken multiplikationstabell som önskas (x) och sedan hur många tal (n) som ska tränas.
    Slumpa n tal ur multiplikationstabellen för x och skriv ut om användaren svarade rätt eller fel (se exemplet). 
    Avsluta med att skriva ut hur många tal användaren klarade av.</p>
    <p>Användaren ska tränas att multiplicera med ett slumpa) tal som är mellan 0 och 10 (inklusive, 0 och 10 kan alltså vara med).</p>
    <p>Tänk på att utskrifterna måste vara på exakt samma <b>format</b> (eftersom talen slumpas kommer du inte se exakt samma räkneuppgifter) som i exemplet för att du ska kunna få rätt.

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
</div>
<?php 
$correctInput = json_encode( array(array("4", "1", "16"), array("4", "1", "15"), array("9", "2", "36","90")) );
$correctOutput = json_encode( array(array("4*4=","16 Rätt","Du klarade 1 av 1"), array("4*4=","15 Fel","Du klarade 0 av 1"), array("4*9=","36 Rätt","10*9=","90 Rätt", "Du klarade 2 av 2") ));
?>
@livewire('editor-problem', [
    'editorId' => 'problem.multiplication-table',
    'code' => '',
    'rows' => 20,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv din kod här.'
])

@endsection
<!-- 
from random import randint
x = int( input('Välj multitabell:') )
n = int( input('Antal träningar:') )

correct = 0
for i in range(n):
    y = randint(0,10)
    print(str(y)+'*'+str(x)+'=')
    ans = int(input('Svar:'))
    if ans == x*y:
        print(ans, 'Rätt')
        correct += 1
    else:
        print(ans, 'Fel')
print('Du klarade', correct, 'av', n) -->