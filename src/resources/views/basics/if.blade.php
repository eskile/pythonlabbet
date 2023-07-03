@extends('template-section')
@section('title', 'if-satsen i Python')
@section('description', 'En if-sats används för att ett program ska kunna göra olika saker beroende på situationen. Här ska vi lära oss och if och else.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/WgD04OVwcYk" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<h1 class="mt-5">if-satsen</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig</p>
<ul>
    <li>Hur du skriver en <i>if</i>-sats</li>
    <li>Om <i>elif</i> och <i>else</i></li>
</ul>

<h2>Enkla if-satser</h2>
<p>Nu ska vi lära oss hur vi kan få programmet att köra olika delar av koden beroende på olika villkor.
Att kunna styra vilken kod som körs i olika situationer är helt grundläggande inom programmering.</p>
<p>Tänk vad som händer när du trycker på tangentbordet. 
Vad som ska hända då beror såklart på vilken tangent du har tryckt på.
<b>Om</b> (engelska: if) du har tryckt på ESC kanske något ska avbrytas och <b>om</b> du trycker på Enter händer något helt annat.
</p>
<p>Syntaxen (hur man skriver) för en if-sats är <i>if villkor:</i> där villkor är ett <b>logiskt uttryck</b>, alltså sant eller falskt.
Om villkoret är sant så körs koden under if-satsen, är villkoret falskt så hoppas koden över. I Python indenteras koden under if i ett eget block
(se <a class="text-green-500 hover:underline" href="/grundkurs/introduktion">första avsnittet</a>).

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En första if-sats. Prova ändra på värdet i x och se vad som händer.</p>
  <pre><code class="language-python">x = 10
if x == 10:
    print('x är lika med 10')
print('Slut')</code></pre>
  <div id="example-first-if-code" class="hidden">x = 10
if x == 10:
    print('x är lika med 10')
print('Slut')</div>
	<button type="button" id="example-first-if" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Vi testar om användaren heter Darth Vader eller Yoda och skriver i så fall ut ett meddelande. Observera att Python gör skillnad på små och stora bokstäver.</p>
  <pre><code class="language-python">namn = input('Skriv ditt namn')
if namn == 'Darth Vader':
    print('Du är inte snäll.')
if namn == 'Yoda':
    print('Du är jättesnäll.')
print('Hejdå ' + namn)
    </code></pre>
  <div id="example-if-code" class="hidden">namn = input('Skriv ditt namn')
if namn == 'Darth Vader':
    print('Du är inte snäll.')
if namn == 'Yoda':
    print('Du är jättesnäll.')
print('Hejdå ' + namn)</div>
	<button type="button" id="example-if" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php 
$correctInput = json_encode( array(array("42"), array("101")) );
$correctOutput = json_encode( array(array("Test av tal"), array("Test av tal", "Ditt tal är större än 100.")) );
$code = json_encode( array("print('Test av tal')", "tal = input('Skriv in ett heltal')", "if int(tal) > 100:", "print('Ditt tal är större än 100.')") );?>
@livewire('editor-modify-correct', [
    'editorId' => 'if_modify',
    'code' => $code,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'text' => 'Koden nedan innehåller ett indenteringsfel. Det är upp till dig att fixa koden.',
    'tip_text' => 'Rad 4 måste indenteras.'
    
    
])

<?php 
$correctInput = json_encode( array(array("-11"), array("-10"), array("0") ));
$correctOutput = json_encode( array(array("Stanna inne"), array("Gå ut"), array("Gå ut") ));
?>

@if(request()->session()->get('easy_mode'))
<?php $code = json_encode( array("temperatur = int(input('Vad är temperaturen utomhus?'))", "","if temperatur >= -10:","    print('Gå ut')","","#Hantera < -10 här", "print('Stanna inne')", ) );?> 
@livewire('editor-modify-correct', [
    'editorId' => 'if-make',
    'code' => $code,
    'rows' => 10,
    'showReset' => true,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv ett program som frågar användaren om temperaturen (heltal) utomhus. Om temperaturen är mindre än -10, skriv ut <b class="border">Stanna inne</b>.
    Ifall temperaturen är större än eller lika med -10, skriv ut <b class="border">Gå ut</b>.',
    'tip_text' => 'Använd två if-satser för att skriva ut rätt meddelande beroende på användarens input.'
])
@else
<?php $code = json_encode( array("# Utskrifterna som behövs i programmet:","print('Stanna inne')", "print('Gå ut')") );?> 
@livewire('editor-modify-correct', [
    'editorId' => 'if-make',
    'code' => $code,
    'rows' => 10,
    'showReset' => true,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Skriv ett program som frågar användaren om temperaturen (heltal) utomhus. Om temperaturen är mindre än -10, skriv ut <b class="border">Stanna inne</b>.
    Ifall temperaturen är större än eller lika med -10, skriv ut <b class="border">Gå ut</b>.',
    'tip_text' => 'Börja med <span class="border">input</span> och spara i en variabel. Använd sedan två if-satser för att skriva ut rätt meddelande beroende på användarens input.'
])
@endif

<h2>else</h2>
<p>Ibland är det bra att köra en viss kod <b>om</b> något är sant (som vi gjorde med en if-sats) och <b>annars</b> (engelska: else) köra någon annan kod.
Du kan använda <i>else</i> för att köra kod ifall villkoret i if-satsen är falskt.
En <i>else</i> går inte använda ensamt, utan används alltid i samband med <i>if</i>.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ett enkelt exempel på användning av else. Notera att else är på samma indenteringsnivå som if.</p>
  <pre><code class="language-python">namn = input('Vad heter du?')
if namn == 'Elsa':
    print('Jag tror din syster heter Anna.')
else:
    print('Du heter inte Elsa.')</code></pre>
  <div id="example-simple-else-code" class="hidden">namn = input('Vad heter du?')
if namn == 'Elsa':
    print('Jag tror din syster heter Anna.')
else:
    print('Du heter inte Elsa.')</div>
	<button type="button" id="example-simple-else" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ett annat enkelt exempel på användning av else.</p>
  <pre><code class="language-python">alder = int(input('Hur gammal är du?'))
if alder >= 18:
    print('Du är vuxen!')
else:
    print('Du är under 18 år.')</code></pre>
  <div id="example-else-age-code" class="hidden">alder = int(input('Hur gammal är du?'))
if alder >= 18:
    print('Du är vuxen!')
else:
    print('Du är under 18 år.')</div>
	<button type="button" id="example-else-age" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("x = 42
if x != 42:
    print('Rad 3')
else:
    print('Rad 5')"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_else_predict',
    'code' => $code,
    'options' => ['Rad 3','Rad 5'],
    'correct' => 2,
    'correct_text' => 'Bra! Eftersom x inte är lika med 42 så är villkoret i if-satsen falskt och därmed skrivs inte Rad 3 ut, utan istället körs koden i else-blocket.',
])

@if(request()->session()->get('easy_mode'))
<?php $code = trim(json_encode("x = 0
if x > 0:
    print('Feel the force!')
else:
    print('Do or do not. There is no try.')"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_else_predict2',
    'code' => $code,
    'options' => ['You will find only what you bring in.','Great warrior. Wars not make one great.','Feel the force!','Do or do not. There is no try.'],
    'correct' => 4,
    'correct_text' => 'Bra! Eftersom villkoret vid if-satsen (x > 0) är falsk så körs koden else-blocket.',
])
@else
<?php $code = trim(json_encode("x = 0
if x > 0:
    print('Feel the force!')
else:
    print('Do or do not. There is no try.')

if x < 0:
    print('Great warrior. Wars not make one great.')
else:
    print('You will find only what you bring in.')"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'if_else_predict2',
    'code' => $code,
    'options' => ['Feel the force!
You will find only what you bring in.','Do or do not. There is no try.
Great warrior. Wars not make one great.','Feel the force!
Great warrior. Wars not make one great.','Do or do not. There is no try.
You will find only what you bring in.'],
    'correct' => 4,
    'correct_text' => 'Bra! Eftersom båda villkoren vid if-satserna (x > 0 och x < 0) är falska så körs koden i de båda else-blocken.',
])
@endif

<h2>elif</h2>
<p>De flesta programmeringsspråk har något som heter <span class="italic">else if</span> eller <span class="italic">elseif</span> (svenska: <b>annars om</b>).
I Python används istället förkortningen <i>elif</i>.
Precis som för <i>else</i> används <i>elif</i> bara i samband med en if-sats och programmet kommer bara dit om villkoret i if-satsen ovan är falsk.
Skillnaden är att med <i>elif</i> skriver vi ett nytt villkor som måste vara sant för att kodblocket under ska köras.</p>
<p>Du kan använda hur många <i>elif</i> du vill på rad. 
En if-sats börjar att alltså med <i>if villkor:</i>, följt av inga, en eller flera <i>elif villkor:</i> och avslutas eventuellt med en <i>else:</i>.
Tänk dig att <i>else</i> är det som händer om inga villkor ovanför är sanna.
<p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En meny med hjälp elif och else.</p>
  <pre><code class="language-python">menyval = int( input('Gör ditt val:') )
if menyval == 1:
    print('Pizza beställd.')
elif menyval == 2:
    print('Hamburgare beställd.')
elif menyval == 3:
    print('Soppa beställd.')
else:
    print('Ditt val är inte giltigt.')</code></pre>
  <div id="example-elif-code" class="hidden">print('MENY')
print('1. Pizza\n2. Hamburgare\n3. Soppa')
menyval = int( input('Gör ditt val:') )
if menyval == 1:
    print('Pizza beställd.')
elif menyval == 2:
    print('Hamburgare beställd.')
elif menyval == 3:
    print('Soppa beställd.')
else:
    print('Ditt val är inte giltigt.')</div>
	<button type="button" id="example-elif" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Varför inte bara använda flera <i>if</i> i rad? 
    Med <i>elif</i> som ovan kör programmet <b>endast ett</b> kodblock (en <i>print</i>).
    Med flera <i>if</i> utförs alla som är sanna och det kan vara flera block.
</p>

<?php 
$correctInput = json_encode( array(array("4"), array("5")) );
$correctOutput = json_encode( array(array("MENY","1. Pizza","2. Hamburgare","3. Soppa","4. Pannkaka","Pannkaka beställd."), array("MENY","1. Pizza","2. Hamburgare","3. Soppa","4. Pannkaka","Ditt val är inte giltigt.")) );
$code = json_encode( array("print('MENY')","print('1. Pizza\\n2. Hamburgare\\n3. Soppa\\n4. Pannkaka')","menyval = int( input('Gör ditt val:') )","if menyval == 1:","    print('Pizza beställd.')","elif menyval == 2:","    print('Hamburgare beställd.')","elif menyval == 3:","    print('Soppa beställd.')", "#Ändra här", "#print('Pannkaka beställd.')", "else:","    print('Ditt val är inte giltigt.')")
);?>
@livewire('editor-modify-correct', [
    'editorId' => 'if_modify_menu',
    'code' => $code,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Ändra i koden',
    'text' => 'Vi glömde pannkaka i menyn i exemplet ovan! Ändra i koden så att <b class="border">Pannkaka beställd.</b> skrivs ut om användaren väljer 4.',
    'tip_text' => 'Precis som för menyvalen 1-3 ska det finnas kod för menyval 4. Glöm inte att indentera rad 11!'
])

<?php 
$correctInput = json_encode( array( array("-2"), array("0"), array("2" ) ) ) ;
$correctOutput = json_encode( array(array("Negativt"), array("Noll"), array("Positivt")) );
$code = json_encode( array("tal = int(input('Skriv in ett tal:'))", "", "if tal > 0:", "    print('Positivt')", "#fortsätt här") );
?>

@if(request()->session()->get('easy_mode'))
@livewire('editor-modify-correct', [
    'editorId' => 'if-make-elif',
    'code' => $code,
    'rows' => 10,
    'showReset' => true,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Ditt program ska ta ett heltal som input. Om användaren skriver in ett negativt tal ska programmet skriva ut <b class="border">Negativt</b>, om talet är positivt ska programmet skriva ut <b class="border">Positivt</b> och annars skrivs <b class="border">Noll</b> ut.',
    'tip_text' => 'Efter <span class="border">if</span>, använd <span class="border">elif</span> och <span class="border">else</span>. Du kan utgå från exemplet ovan för att få rätt på syntaxen.'
])
@else
@livewire('editor-modify-correct', [
    'editorId' => 'if-make-elif',
    'code' => '',
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Ditt program ska ta ett heltal som input. Om användaren skriver in ett negativt tal ska programmet skriva ut <b class="border">Negativt</b>, om talet är positivt ska programmet skriva ut <b class="border">Positivt</b> och annars skrivs <b class="border">Noll</b> ut.',
    'tip_text' => 'Typkonvertera användarens input med <span class="border">int</span>. Använd sedan <span class="border">if</span>, <span class="border">elif</span> och <span class="border">else</span>. Du kan utgå från exemplet ovan för att få rätt på syntaxen.'
])
@endif

<p>Vill du träna på en liknande uppgift? Se aktiviteten <a target="_tab" class="text-green-500 hover:underline" href="/problemlosning/vilket-programmeringssprak">Vilket programmeringsspråk</a>.</p>

@endsection