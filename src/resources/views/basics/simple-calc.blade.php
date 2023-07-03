@extends('template-section')
@section('title', 'Enkla beräkningar i Python')
@section('description', 'Lär dig om de vanligaste operatorerna i Python, som addition, subtraktion, multiplikation, heltalsdivision och rest.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/1ML8-a1nu5c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<h1 class="mt-5">Enkla beräkningar</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig</p>
<ul>
    <li>Använda <i>+</i> på strängar</li>
    <li>Utföra enkla beräkningar</li>
    <li>Om prioriteringsordningar</li>
</ul>
<h2>Använda operatorn <i>+</i></h2>
<p>I det här avsnittet ska vi använda de vanligaste operatorerna. Typiska matematiska operatorer är <i>+</i> <i>&minus;</i> <i>*</i> och <i>/</i>. 
Av dessa är det bara <i>+</i> som går att använda mellan strängar. Att addera tal med <i>+</i> fungerar precis som du tänker dig.
</p>
<div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Exempel</h3>
    <p>Operatorn <span class="border">+</span> mellan två tal och mellan två strängar.</p>
    <pre><code class="language-python">print(10 + 5)
print('Hej' + 'då')
print('Hej ' + 'du')</code></pre>
                <div id="example-hello-world-code" class="hidden">print(10 + 5)
print('Hej' + 'då')
print('Hej ' + 'du')</div>
    <button type="button" id="example-hello-world" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>
<p>
    Som du ser i exemplet ovan med <i>'hej '</i> går det bra att använda mellansteg som avslutning på en sträng för att det ska bli ett mellanrum till nästa ord. Det <b>fungerar inte</b> att lägga ihop en sträng med ett tal, exempelvis
    fungerar inte programmet om du skriver <i class="bg-red-50">'En sträng' + 10</i>.
    
</p>

<?php $code = trim(json_encode("print('4' + '2')
print(4 + 2)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'simple_calc_predict',
    'code' => $code,
    'options' => ['6
6','42
6'],
    'correct' => 2,
    'correct_text' => 'Rätt! Som du ser är det skillnad på exempelvis &#39;4&#39; (en sträng) och 4 (ett tal).'
])

<h2>Vanliga operatorer</h2>

<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Operator</th>
        <th class="pr-24 text-left">Beskrivning</th>
        <th class="text-left pl-8">Exempel</th>
    </tr>
    <tr class="border-b">
        <td>+</td>
        <td>Addition</td>
        <td class="pl-8">10 + 5 = 15</td>
    </tr>
    <tr class="border-b">
        <td>&minus;</td>
        <td>Subtraktion</td>
        <td class="pl-8">7 &minus; 5 = 2</td>
    </tr>
    <tr class="border-b">
        <td>*</td>
        <td>Multiplikation</td>
        <td class="pl-8">2 * 4 = 8</td>
    </tr>
    <tr class="border-b">
        <td>/</td>
        <td>Division, ger decimaltal</td>
        <td class="pl-8">10 / 4 = 2.5</td>

    </tr>
    <tr class="border-b">
        <td>//</td>
        <td>Heltalsdivision, ger heltal</td>
        <td class="pl-8">11 // 5 = 2</td>

    </tr>
    <tr class="border-b">
        <td>%</td>
        <td>Rest (även kallad modulo)</td>
        <td class="pl-8">11 % 5 = 1</td>

    </tr>
    <tr class="border-b">
        <td>**</td>
        <td>Upphöjt till</td>
        <td class="pl-8">2 ** 4 = 16</td>

    </tr>
</table>

<div class="bg-green-100 p-8 mb-4">
    <h3 class="text-2xl">Exempel</h3>
    <p>Här kan du se exempel på vanliga enkla beräkningar som skrivs ut.</p>
    <pre><code class="language-python">print(15 - 5) #10
print(7 * 8) #56
print(4 / 2) #2.0
print(11 / 3) #3.666666666666667
print(11 // 3) #3
print(11 % 3) #2
print(2 ** 10) #1024
    </code></pre>
    <div id="example-hej-varlden-code" class="hidden">print(15 - 5)
print(7 * 8)
print(4 / 2)
print(11 / 3)
print(11 // 3)
print(11 % 3)
print(2 ** 10)</div>
    <button type="button" id="example-hej-varlden" class="stop-button border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = json_encode( array("print(1000 / 3)") );?>
@livewire('editor-modify', [
    'editorId' => 'simple_calc_modify',
    'code' => $code,
    'correctAnswer' => array("333"),
    'title' => 'Ändra',
    'text' => 'Ändra i koden så att en heltalsdivision utförs istället för vanlig division.',
    'tip_text' => 'Använd <span class="border">//</span> för heltalsdivision.'
])


<h2>Prioriteringsordning</h2>
<p>Som du säkert har lärt dig har multiplikation och division <b>högre prioritet</b> än addition och subtraktion. Det innebär att för ett uttryck som
$$4+7\cdot2=18$$
så utförs multiplikationen \(7\cdot2\) först och sedan adderas det resultatet till 4. Precis så fungerar det också i Python. Av de operatorer vi tittat på i det här 
avsnittet ser du prioriteringsordningen i tabellen nedan.
</p>

<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Prioritet</th>
        <th class="pr-4 text-left">Operatorer</th>
    </tr>
    <tr class="border-b">
        <td>Hög</td>
        <td>**</td>
    </tr>
    <tr class="border-b">
        <td>&nbsp;&nbsp;|</td>
        <td>* &nbsp; / &nbsp; // &nbsp; %</td>
        
    </tr>
    <tr class="border-b">
        <td>Låg</td>
        <td>+ &nbsp; &minus;</td>
    </tr>
</table>

<p>Precis som i matematiken går det att använda parenteser för att förändra ordningen. För att utföra additionen först i exemplet ovan så kan vi skriva
$$(4+7)\cdot2=22$$
Nu vet du mer om hur du kan använda Python som en miniräknare.
</p>

@if(request()->session()->get('easy_mode'))
<?php $code = trim(json_encode("print(10 + 2 ** 2 - 3)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'simple_calc_predict2',
    'code' => $code,
    'options' => ['8','10', '11', '21'],
    'correct' => 3,
    'correct_text' => 'Rätt! Här är det viktigt att tänka på prioriteringsreglerna så att upphöjt till utförs innan additionen och subtraktionen.'
                ])  
@else
<?php $code = trim(json_encode("print(10 + 2 ** 2 - 3 // 2)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'simple_calc_predict2',
    'code' => $code,
    'options' => ['5.5','12.5', '13', '70'],
    'correct' => 3,
    'correct_text' => 'Rätt! Här är det viktigt att tänka på prioriteringsreglerna så att upphöjt till och heltaldivisionen utförs innan additionen och subtraktionen.'
                ])  
@endif

@livewire('editor-make', [
    'editorId' => 'simple_calc_make', 
    'text' => 'Skriv ut vad \(2^{137} + 543\cdot263\cdot1000\) blir', 
    'code' => '', 'rows' => 6,
    'correctAnswer' => array("174224571863520493293247799005065467074472"),
    'tip_text' => 'Använd <span class="border">**</span> för att göra upphöjt till, 2 ** 137. Skriv ut med <span class="border">print</span>.'
])

<p>Talet som du beräknade ovan är väldigt stort med sina 42 siffror. Det är faktiskt ganska ovanligt att programmeringsspråk klarar så stora tal.
I Python finns ingen övre gräns för hur ett stort tal kan vara. Nackdelen med att tillåta hur stora tal som helst är att prestandan för beräkningar blir sämre.
</p>

<p>Vill du träna på en beräkning till? Se aktiviteten <a target="_tab" class="text-green-500 hover:underline" href="/problemlosning/berakna-uttrycket">Beräkna uttrycket</a>.</p>

@endsection