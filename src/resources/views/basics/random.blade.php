@extends('template-section')
@section('title', 'Slumptal med random-modulen i Python')
@section('description', 'Datorer kan generera slumptal även om det egentligen inte är slump på riktigt. I Python kan vi använda funktionen randint från modulen random.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/bXSPJbXPbU8" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<h1 class="mt-5">Slumptal</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>En dator kan generera pseudoslumptal</li>
    <li>Importa funktionen <i>randint</i> från modulen <i>random</i></li>
    <li>Använda <i>randint</i> för att skapa slumptal</li>
</ul>

<h2>Hur skapar en dator slumptal?</h2>
<p>När det gäller slumptal måste vi skilja på <b>äkta</b> slumptal och <b>pseudoslumptal</b>.</p>
<p>Enligt fysikens lagar finns det äkta slumptal i naturen och de går att mäta.
För vissa avancerade applikationer, till exempel banksäkerhet, behövs slumptal som är omöjliga att gissa sig till. 
Det finns dyr hårdvara som säger sig skapa äkta slumptal. Äkta slumptal är dock omöjliga att skapa i en vanlig dator.</p>

<p>I en vanlig dator skapas slumptal genom en matematisk formel. 
För att den inte ska ge samma talföljd varje gång används ett <b>frö</b> (engelska: seed).
Fröet brukar tas från systemtiden, alltså vad klockan är på datorn när slumpgeneratorn startas.
Dessa slumptal kallas pseudoslumptal, de inte helt äkta slumptal men tillräckligt bra för de allra flesta användningsområdena.
</p>

<h2>Slumptalsgeneratorn i Python</h2>
<p>I modulen <i>random</i> (svenska: slump) finns ett antal funktioner för att skapa slumptal. 
Vi kommer använda oss av funktionen <i>randint</i>. Den här funktionen skapar slumpmässiga heltal i ett angivet intervall. 
Om du skriver <i>randint(1,6)</i> så skapas ett slumptal, som minst ett och som störst sex.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Hur funktionen <span class="border">randint</span> används. Testa att köra programmet flera gånger.</p>
  <pre><code class="language-python">from random import randint # importera funktionen randint från random
slumptal = randint(1,6) # skapa ett slumptal 1-6</code></pre>
  <div id="example-randint-code" class="hidden">from random import randint
slumptal = randint(1,6)
print(slumptal)</div>
	<button type="button" id="example-randint" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("from random import randint
print(randint(0,101))"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'random_predict',
    'code' => $code,
    'options' => ['Ett tal som är minst 0 och störst 101','Ett tal som är minst: 1 och störst 100'],
    'correct' => 1
])

<?php 
$correctInput = json_encode( array(array("0")) );
$correctOutput = json_encode( array(array("Antal ettor: 346", "Antal tvåor: 339", "Antal treor: 315")) );
$code = $code = json_encode( array("from random import randint", "i = 1", "x1 = 0", "x2 = 0", "x3 = 0", "", "while i <= 1000:", "    # ÄNDRA HÄR", "    if slumptal == 1:", "        x1 = x1 + 1", "    elif slumptal == 2:","        x2 = x2 + 1", "    else:", "        x3 = x3 + 1", "    i = i + 1", "print('Antal ettor: ' + str(x1))", "print('Antal tvåor: ' + str(x2))", "print('Antal treor: ' + str(x3))") );?>
@livewire('editor-modify-correct', [
    'editorId' => 'random_modify',
    'code' => $code,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Ändra i koden',
    'text' => 'Skapa en variabel <span class="border">slumptal</span> som får ett nytt slumpmässigt värde 1-3 för varje ny loop. Tanken med programmet är att skapa 1000 slumptal med värde 1-3 och sedan skriva ut hur många vi fick av varje.',
    'tip_text' => 'Använd <span class="border">randint(1,3)</span> för att få ett slumpat värde i intervallet [1,3].'
])

<?php 
$correctInput = json_encode( array(array("0")) );
$correctOutput = json_encode( array(array("9") ));
?>
@if(request()->session()->get('easy_mode'))
<?php $code = json_encode( array("from random import randint","tärning_1 = randint(1,6)") ); ?>
@livewire('editor-modify-correct', [
    'editorId' => 'random-make',
    'code' => $code,
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa: Summan av två tärningskast',
    'text' => 'Skriv kod som skriver ut summan av två tärningskast med en vanlig tärning (skriv endast ut summan).',
    'tip_text' => 'Du behöver två slumpade tal, så behöver använda <span class="border">randint(1,6)</span> två gånger och sedan addera resultaten.'
])
@else
<?php $code = json_encode( array("from random import randint","") ); ?>
@livewire('editor-modify-correct', [
    'editorId' => 'random-make',
    'code' => $code,
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa: Summan av två tärningskast',
    'text' => 'Skriv kod som skriver ut summan av två tärningskast med en vanlig tärning (skriv endast ut summan).',
    'tip_text' => 'Du behöver två slumpade tal, så behöver använda <span class="border">randint(1,6)</span> två gånger.'
])
@endif

<h2>Slumptal mellan 0 och 1</h2>
<p>Det finns andra funktioner i modulen <i>random</i> och en av dem heter just <i>random</i>. Funktionen har alltså samma namn som modulen. 
Funktionen <i>random</i> skapar slumptal av typen <i>float</i> mellan 0 och 1. Det kan vara till exempel vara användbart i samband med sannolikheter.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Det är ca 21% chans att vinna något på en Triss-lott. Koden slumpar ett värde mellan 0 och 1 och simulerar om du vann eller inte på en lott.</p>
  <p>Fundera på: spelar det någon större roll om vi använder p < 0.21 eller p <= 0.21?</p>
  <pre><code class="language-python">from random import random
p = random()
if p < 0.21:
  print('Du vann något!')
else:
  print('Ingen vinst.')</code></pre>
  <div id="example-random-probability-code" class="hidden">from random import random
p = random()
if p < 0.21:
  print('Du vann något!')
else:
  print('Ingen vinst.')</div>
	<button type="button" id="example-random-probability" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

@endsection