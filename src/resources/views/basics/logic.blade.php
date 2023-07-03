@extends('template-section')
@section('title', 'Logiska uttryck Python')
@section('description', 'Ett logiskt uttryck är antingen sant eller falskt. Värdet av ett logiskt uttryck kan sparas i en boolesk variabel.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/cHmC7frv5Lk?vq=hd720" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<h1 class="mt-5">Logiska uttryck</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig</p>
<ul>
    <li>Vad ett logiskt uttryck är</li>
    <li>En ny boolesk datatyp som kan spara värdet sant eller falskt</li>
    <li>Hur <i>and</i> och <i>or</i> används i logiska uttryck</li>
</ul>

<h2>Logiska uttryck</h2>
<p>Ett logisk uttryck är något som antingen är <b>sant</b> (engelska: true) eller <b>falskt</b> (engelska: false).
Säg att vi frågar efter användarens ålder. Är användarens ålder är större än 18? Det är antingen sant eller falskt. 
Vi kan skriva <i>ålder > 18</i> och detta är ett logiskt uttryck. 
Om vi använder <i>print</i> på ett logiskt uttryck i Python kommer vi att få antingen <i>True</i> eller <i>False</i> som utskrift.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Två exempel på logiska uttryck som är sanna. I båda fallen jämförs en variabel med ett tal.</p>
  <pre><code class="language-python">x = 5
print(x == 5) #x är lika med 5? (sant)
print(x != 10) #x är INTE lika med 10? (sant)
</code></pre>
<code><div id="example-true-expressions-code" class="hidden">x = 5
print(x == 5) #x är lika med 5? (sant)
print(x != 10) #x är INTE lika med 10? (sant)</div></code>
	<button type="button" id="example-true-expressions" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Notera att två likhetstecken <i>==</i> används för att jämföra om två saker är lika. 
Det är ett mycket vanligt fel att råka skriva endast ett likhetstecken vid jämförelse.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Två exempel på logiska uttryck som är falska. I detta exempel jämförs två variabler med varandra.</p>
  <pre><code class="language-python">x = 5
y = 10
print(x > y) #x är större än y? (falskt)
print(y <= x) #y är mindre än eller lika med x? (falskt)
</code></pre>
<code><div id="example-false-expressions-code" class="hidden">x = 5
y = 10
print(x > y) #x är större än y? (falskt)
print(y <= x) #y är mindre än eller lika med x? (falskt)</div></code>
	<button type="button" id="example-false-expressions" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>I exemplena ovan användes olika sorters jämförelser och de vanligaste jämförelserna sammanfattas i tabellen nedan.</p>

<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Jämförelse</th>
        <th class="pr-4 text-left">Betyder</th>
    </tr>
    <tr class="border-b">
        <td>==</td>
        <td>Lika med</td>
    </tr>
    <tr class="border-b">
        <td>!=</td>
        <td>Inte lika med</td>
        
    </tr>
    <tr class="border-b">
        <td><</td>
        <td>Mindre än</td>
    </tr>
    <tr class="border-b">
        <td>></td>
        <td>Större än</td>
    </tr>
    <tr class="border-b">
        <td><=</td>
        <td>Mindre än eller lika med</td>
    </tr>
    <tr class="border-b">
        <td>>=</td>
        <td>Större än eller lika med</td>
    </tr>
</table>

<p>Det går bra att jämföra heltal (int) med decimaltal (float), däremot går det inte av naturliga skäl att jämföra tal med strängar.
Mellan två strängar går det utmärkt att använda alla jämförelser ovan. Strängarna jämförs alfabetiskt, till exempel är <i>'sol' < 'stjärna'</i> sant.

@if(request()->session()->get('easy_mode'))
<?php $code = trim(json_encode("a = 5
b = 12
print(a == b)
print(3*a > b)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_predict_numbers',
    'code' => $code,
    'options' => ['False
False','True
True','True
False','False
True'],
    'correct' => 4
])
@else
<?php $code = trim(json_encode("a = 180
b = 360
print(a != b)
print(2*a >= b)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_predict_numbers',
    'code' => $code,
    'options' => ['False
False','False
True','True
False','True
True'],
    'correct' => 4
])
@endif

<?php $code = trim(json_encode("print('python' > 'c++') 
print('programmering' == 'programmera')"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_predict_strings',
    'code' => $code,
    'options' => ['False
False','False
True','True
False','True
True'],
    'correct' => 3
])

@if(request()->session()->get('easy_mode'))
<?php $code = trim(json_encode("x = 2**4
print(x >= 16)
print(x <= 16)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_predict_trick',
    'code' => $code,
    'options' => ['True
True','False
False'],
    'correct' => 1,
])
@else
<?php $code = trim(json_encode("x = 0.1 + 0.1 + 0.1
print(x)
print(x == 0.3)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_predict_trick',
    'code' => $code,
    'options' => ['0.3
False','0.3
True'],
    'correct' => 1,
    'correct_text' => 'Visst är det konstigt? Det här märkliga resultatet beror att flyttal representeras som ettor och nollor i datorn. Poängen med övningen är att visa på risken att använda == mellan flyttal.',
    'wrong_text' => 'Förlåt mig. Det här är en kuggfråga. Prova igen och se en förklaring. Fundera en stund: vad skulle kunna ligga bakom?'
])
<p>Om du vill läsa mer om vad som egentligen hände i övningen ovan, <a target="_tab" class="text-green-500 hover:underline" href="https://docs.python.org/3/tutorial/floatingpoint.html">se här på python.org</a>.
@endif


<h2>Datatyp för sant eller falskt</h2>

<p>Det går utmärkt att spara <b>värdet</b> av ett logiskt uttryck (<i>True</i> eller <i>False</i>) i en variabel. 
Det kallas för en boolesk (engelska: boolean) variabel. Ordet boolesk kommer du inte höra ofta, oftast används 
det engelska ordet boolean eller bara bool. En boolean är den datatyp som tar minst plats i minnet, den behöver bara en bit.
0 för <i>False</i> och 1 för <i>True</i>.

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p><i class="bg-green-100">True</i> sparas i variablen x eftersom 3 > 2 är sant.</p>
  <pre><code class="language-python">x = 3 > 2</code></pre>
  <div id="example-boolean-code" class="hidden">x = 3 > 2
print(x)</div>
	<button type="button" id="example-boolean" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Kombinera logiska uttryck</h2>
<p>Vi ska nu använda två så kallade logiska operatorer, <i>and</i> (svenska: och) och <i>or</i> (svenska: eller).</p>
<p>Med <i>and</i> måste uttrycken på <b>båda</b> sidor om <i>and</i> vara sanna för att det kombinerade uttrycket ska vara sant.
Om något av uttrycken runt <i>and</i> är falskt så blir hela uttrycket falskt.
En vanlig användning är att se efter om en variabel är <b>inom</b> ett intervall, se exemplet nedan.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel på and</h3>
  <p>Se efter om variabel x ligger mellan 10 och 20. Prova att ändra på x.</p>
  <pre><code class="language-python">x = 15
print(x > 10 and x < 20)</code></pre>
  <div id="example-and-code" class="hidden">x = 15
print(x > 10 and x < 20)</div>
	<button type="button" id="example-and" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Med <i>or</i> behöver <b>minst</b> ett av uttrycken runt <i>or</i> vara sant för att det kombinerade uttrycket ska bli sant. 
För att det kombinerade uttrycket ska vara falskt måste alltså båda logiska uttryck runt <i>or</i> vara falska. 
En vanlig användning är att se om en variabel är <b>utanför</b> ett intervall, se exemplet.<p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel på or</h3>
  <p>Se efter om variabel x ligger utanför intervallet [10, 20]. Prova att ändra på x.</p>
  <pre><code class="language-python">x = 5
print(x < 10 or x > 20)</code></pre>
  <div id="example-or-code" class="hidden">x = 5
print(x < 10 or x > 20)</div>
	<button type="button" id="example-or" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("x = 42
print(x == 42 and x > 50)
print(x == 42 or x > 50)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'logic_predict_and_or',
    'code' => $code,
    'options' => ['False
False','False
True','True
False','True
True'],
    'correct' => 2,
    'correct_text' => 'Precis! Det första uttrycket är falskt efter det inte stämmer att x > 50 och båda uttrycket runt and måste vara sanna. Det andra uttrycket är sant efter x == 42 och det räcker med att ett uttryck är sant.',
])

@endsection