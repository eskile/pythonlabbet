@extends('template-section')
@section('title', 'Indata från användaren i Python med input()')
@section('description', 'De flesta program behöver indata från användaren. Här lär du dig använda den inbyggda funktionen input i Python.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/uZNN90Hlc1M" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<h1 class="mt-5">Indata från användaren</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Använda funktionen <i>input</i></li>
    <li>Skriva ditt första användbara program</li>
</ul>

<h2>Funktionen input</h2>
<p>De flesta program behöver någon sorts indata från användaren. Ofta kommunicerar användaren med programmet genom musen eller tangentbordet, men det kan 
också vara en fil som är indata till programmet. Vi ska titta på hur vi kan skriva in information till programmet med tangentbordet.</p>
<p>Med funktionen <i>input</i> läser Python en rad text från användaren. 
Här på Pythonlabbet kommer det upp en popup-ruta där du kan skriva när du använder input-funktionen.
Resultat av <i>input</i> är en <b>sträng</b>, vi säger att funktionen <i>input</i> <b>returnerar</b> en sträng.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Läser in en rad text och skriver sedan ut vad du har skrivit.</p>
  <pre><code class="language-python">text = input()
print(text)</code></pre>
  <div id="example-input-simple-code" class="hidden">text = input()
print(text)</div>
	<button type="button" id="example-input-simple" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Du kan skriva ett meddelande till användaren i argumentet till input.</p>
  <pre><code class="language-python">namn = input('Vad heter du?')
print('Hej ' + namn + '!')</code></pre>
  <div id="example-input-msg-code" class="hidden">namn = input('Vad heter du?')
print('Hej ' + namn + '!')</div>
	<button type="button" id="example-input-msg" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("text = input()
print( type(text) )"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'input_predict',
    'code' => $code,
    'options' => ['&lt;class &#39;float&#39;&gt;', '&lt;class &#39;int&#39;&gt;','&lt;class &#39;str&#39;&gt;'],
    'correct' => 3,
    'text' => 'Läs koden nedan och försök lista ut vad programmet skriver ut. Kör programmet efter du svarat och se om du fick rätt.'
])

<p>Input-funktionen ger oss alltså en sträng. Vi säger att funktionen <b>returnerar</b> en sträng. Det innebär att vi måste konvertera returvärdet om vi frågar
användaren efter ett tal och vi sedan vill räkna med det. Risken är att användaren skriver något som inte går att konvertera till ett tal och då fungerar inte
vårt program. Det går att lösa med felhantering men det ska vi inte lära oss nu.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Räkna ut arean av en kvadrat. Prova gärna ett decimaltal, tänk på att använda punkt. Vad händer om du skriver in något som inte kan omvandlas till ett tal?</p>
  <pre><code class="language-python">sida = input('Skriv in kvadratens sida:')
#strängen sida måste nu omvandlas till ett decimaltal
sida = float(sida)
area = sida * sida</code></pre>
  <div id="example-input-square-code" class="hidden">sida = input('Skriv in kvadratens sida:')
sida = float(sida)
area = sida * sida

print('Arean är ' + str(area))</div>
	<button type="button" id="example-input-square" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>


<?php 
$code = json_encode( array("pi = 3.14", "r = input('Skriv in cirkelns radie:')", "area = pi*r*r", "print(area)") );
$correctInput = json_encode( array(array("2.1")) );
$correctOutput = json_encode( array(array("13.8474") ));
?>

@if(request()->session()->get('easy_mode'))
@livewire('editor-modify-correct', [
    'editorId' => 'input-modify',
    'code' => $code,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'text' => 'Koden nedan fungerar inte som den ska eftersom <span class="border">r</span> är en sträng som inte går att räkna med. Konvertera <span class="border">r</span> med hjälp av funktionen <span class="border">float</span>.',
    'tip_text' => 'Använd <span class="border">float(r)</span>.'
])
@else
@livewire('editor-modify-correct', [
    'editorId' => 'input-modify',
    'code' => $code,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'text' => 'Koden fungerar inte som den ska. Kan du fixa det? Tänk på att decimaltal ska fungera som indata.',
    'tip_text' => 'Efter rad 2 är <span class="border">r</span> en sträng och det går inte att multiplicera med strängar. Typkonvertera <span class="border">r</span> med <span class="border">float</span>.'
])
@endif

<?php 
$correctInput = json_encode( array(array("2.0", "1.1")) );
$correctOutput = json_encode( array(array("1.1") ));
?>
@if(request()->session()->get('easy_mode'))
<?php 
$code = json_encode( array("höjd = float(input('Skriv in höjden på triangeln:'))", "bas = float(input('Skriv in basen på triangeln:'))","","" ) );
?>
@livewire('editor-modify-correct', [
    'editorId' => 'input-make',
    'code' => $code,
    'rows' => 15,
    'showReset' => true,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Räkna ut arean på en triangel',
    'text' => 'Programmet ska ta två inputs från användaren: höjden och basen på en triangel. Skriv ut arean på triangeln (skriv bara ut talet).
    Programmet ska klara av decimaltal.',
    'tip_text' => 'Utgå ifrån koden i exemplet ovan (arean av en kvadrat). Använd formeln A = b*h/2.'
])
@else
@livewire('editor-modify-correct', [
    'editorId' => 'input-make',
    'code' => '',
    'rows' => 15,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Räkna ut arean på en triangel',
    'text' => 'Programmet ska ta två inputs från användaren: höjden och basen på en triangel. Skriv ut arean på triangeln (skriv bara ut talet).
    Programmet ska klara av decimaltal.',
    'tip_text' => 'Utgå ifrån koden i exemplet ovan (arean av en kvadrat). För att räkna ut arean på en triangel behövs två inputs. Använd formeln A = b*h/2.'
])
@endif

<p>Vill du träna på en liknande uppgift? Se aktiviteten <a target="_tab" class="text-green-500 hover:underline" href="/problemlosning/rektangelns-omkrets">Rektangelns omkrets</a>.</p>

@endsection
