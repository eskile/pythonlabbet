@extends('template-section')
@section('title', 'Repetitioner med while-satsen i Python')
@section('description', 'Att kunna köra kod ett antal gånger beroende på ett villkor är oerhört centralt inom programming. Vi utforskar ämnet med while-satsen.')
@section('content')
@include('reference', ['basics1' => true])

@if(request()->session()->get('show_videos'))
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/2lIJhTrvwvQ" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<h1 class="mt-5">while-satsen</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig om</p>
<ul>
    <li>Loopar (repetera kod) med <i>while</i></li>
    <li>Vad <i>continue</i> är</li>
    <li>Vad <i>break</i> gör</li>
</ul>

<h2>Enkla loopar med while</h2>
<p>En annan oerhört viktig del inom programmering är att kunna köra samma kod om och igen. En loop är kod som repeteras tills villkoret för att loopen ska fortsätta inte längre är uppfyllt.
I de flesta programmeringsspråk finns den så kallade while-satsen. I Python skriver vi <i>while villkor:</i>, det repeterar en bit kod <b>medans</b> (engelska: while) villkoret är sant.

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En while-sats används för att skriva ut talen ett till tio.</p>
  <pre><code class="language-python">x = 1
while x <= 10:
    print(x)
    x = x + 1</code></pre>
  <div id="example-simple-while-code" class="hidden">x = 1
while x <= 10:
    print(x)
    x = x + 1</div>
	<button type="button" id="example-simple-while" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>I exemplet ovan startar x med värdet ett. På rad 2 kommer programmet till while och testar om x <= 10, och det är ju sant. 
Då tar vi oss ner i kodblocket under while, skriver ut <i>1</i> och sedan ges x + 1 till x. Vi adderar helt enkelt ett till x (plussar på x med 1) och x är nu lika med två.
Eftersom vi är i en while-loop kommer vi tillbaka till rad 2 och testar om x fortfarande är mindre eller lika med 10. Det stämmer ju (x = 2), så vi kör koden inuti while-satsen igen.
Programmet fortsätter på det här viset tills <i>10</i> skrivs ut och värdet 11 sparas i x. 
Då när programmet kommer tillbaka till rad 2 stämmer det inte längre att x <= 10, därmed är vi klara med while-satsen.</p>

<p>Det är förståeligt om du tycker att <i>x = x + 1</i> ser konstigt ut. Inom matematiken betyder det något helt annat.
Därför är det viktigt att här komma ihåg att <i>=</i> betyder tilldelning i Python (och de flesta programmeringsspråk).
</p>

<p>Det är väldigt viktigt att du förstår exemplet och texten ovan så läs gärna om det tills du förstår det. Var inte heller rädd för att experimentera med koden.
Fundera på: vad händer om vi missar att öka x med ett i varje loop?</p>

@if(request()->session()->get('easy_mode'))
<?php $code = trim(json_encode("x = 0
while x < 2:
    print(x)
    x = x + 1"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'while_predict',
    'code' => $code,
    'correct_text' => 'I varje repetition ökar värdet på x med ett. När x ökat till två är villkoret x < 2 falskt och while avslutas.',
    'options' => ['0
1','0
1
2', '1
2'],
    'correct' => 1
])
@else
<?php $code = trim(json_encode("x = 2
while x > 0:
    print(x)
    x = x - 1"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'while_predict',
    'code' => $code,
    'correct_text' => 'I varje repetition minskar värdet på x med ett. När x minskat till noll är villkoret x > 0 falskt och while avslutas.',
    'options' => ['2
1','2
1
0', '2
0'],
    'correct' => 1
])
@endif

<?php $code = json_encode( array("x = 1", "while x <= 10:", "    print(x)", "    x = x + 1") );?>
@livewire('editor-modify', [
    'editorId' => 'while_modify_odd',
    'code' => $code,
    'correctAnswer' => array("1","3", "5", "7", "9"),
    'title' => 'Ändra i koden',
    'text' => 'Ändra i while-loopen så att endast udda tal mellan 1 och 10 skrivs ut (talet 1 ska vara med).',
    'tip_text' => 'Istället för att x ökar med ett för varje iteration, ändra så att x ökar med två istället.'
])

<p>Kom du på vad som händer om vi glömmer öka x med ett för varje loop eller för varje iteration som det också kallas?
Då kommer aldrig loopen att avslutas och vi får en <b>oändlig loop</b>. Alla programmerare råkar förr eller senare ut för en oändlig loop, det är en ganska vanlig bugg.

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>En oändlig loop. Om du kör koden nedan kan det till slut krascha din webbläsare. Därför finns stopp-knappen! Den är bra att ha när programmet råkat hamna i en oändlig loop.
  Kan du ändra koden så att programmet stannar?</p>
  <pre><code class="language-python">x = 0
while x < 5:
    print(x)</code></pre>
  <div id="example-infinite-loop-code" class="hidden">x = 0
while x < 5:
    print(x)</div>
	<button type="button" id="example-infinite-loop" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel - ett enkelt "spel"</h3>
  <p>I det här enkla spelet ska du gissa på vad resultatet av en beräkning är. Om du gissar smart kan du ganska snabbt hitta svaret! Påminnelse: operatorn % betyder rest vid division.</p>
  <pre><code class="language-python">x = -1
facit = 124861357 % 107
while x != facit:
    x = int( input('Vad tror du 124861357 % 107 är?') )
    if x < facit:
        print('Du gissade för litet.')
    elif x > facit:
        print('Du gissade för stort.')
print('Du gissade på ' + str(x) + ' och det är rätt!')
</code></pre>
  <div id="example-guess-game-code" class="hidden">x = -1
facit = 124861357 % 107
while x != facit:
    x = int( input('Vad tror du 124861357 % 107 är?') )
    if x < facit:
        print('Du gissade för litet.')
    elif x > facit:
        print('Du gissade för stort.')
print('Du gissade på ' + str(x) + ' och det är rätt!')</div>
	<button type="button" id="example-guess-game" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
    <p class="pt-3">Så här fungerar programmet i stora drag: Loopen körs <b>medan</b> gissningen <b>inte är lika med</b> facit. Väl inne i loopen får x värdet av den nya gissningen. Vi testar om x är större än eller mindre än det rätta svaret
    och skriver ut något lämpligt. När while slutligen ser att x != facit är falskt (vi har ett rätt svar), så avbryts loopen, och vi skriver ut att användaren gissat rätt.</p>
</div>


<h2>break och continue</h2>
<p>För att avbryta en loop under körning används <i>break</i>. För att forsätta med nästa iteration utan att köra mer kod i nuvarande iteration, används <i>continue</i>. 
Som vi ser i exemplet nedan kan <i>break</i> till exempel användas om man alltid vill köra koden i loopen minst en gång.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Koden i while-loopen körs alltid minst en gång. Villkoret för att avbryta while-satsen ligger i slutet istället. Med <span class="border">while True:</span> körs loopen tills den avbryts.</p>
  <pre><code class="language-python">while True:
    svar = input('Vilket år blev Gustav Vasa kung?')
    if svar == '1523':
        break</code></pre>
  <div id="example-vasa-code" class="hidden">while True:
    svar = input('Vilket år blev Gustav Vasa kung?')
    if svar == '1523':
        break
print('Grattis! Du lyckades rymma från loopen!')</div>
	<button type="button" id="example-vasa" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ett program som skriver ut roten ur (vilket är samma sak som att ta upphöjd till en halv) på input. Om användaren ger ett negativt tal används <span class="border">continue</span> för att inte beräkna roten ur på ett negativt tal. Noll används för att avsluta.</p>
  <pre><code class="language-python">while True:
    tal = float( input('Vad vill du ta roten ur av? (Avsluta med 0)') )
    if tal < 0:
        continue
    elif tal == 0:
        break
    print(tal**0.5)</code></pre>
  <div id="example-squareroot-code" class="hidden">while True:
    tal = float( input('Vad vill du ta roten ur av? (Avsluta med 0)') )
    if tal < 0:
        continue
    elif tal == 0:
        break
    print(tal**0.5)</div>
	<button type="button" id="example-squareroot" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel - är talet ett primtal?</h3>
  <p>Nu ska vi göra ett enkelt test av ett heltal för att se om det är ett primtal.
      Ett primtal är bara delbart med sig själv och ett.
      Vi testar helt enkelt om det finns något tal som motsäger det.
      Vi behöver inte testa att dividera tal som är större än roten ur talet. Varför?</p>
      <p>Om du provar några stora slumpmässiga tal så får du se att det är ganska svårt att hitta på ett stort primtal.</p>
  <pre><code class="language-python">tal = int( input('Vilket tal vill du testa?') )
x = 2
primtal = True
while x <= tal ** 0.5:
    if tal % x == 0:
        primtal = False
        break
    x = x + 1
    
if primtal:
    print(str(tal) + ' är ett primtal.')
else:
    print(str(tal) + ' är INTE ett primtal.')</code></pre>
  <div id="example-prime-code" class="hidden">tal = int( input('Vilket tal vill du testa?') )
x = 2
primtal = True
while x <= tal ** 0.5:
    if tal % x == 0:
        primtal = False
        break
    x = x + 1

if primtal:
    print(str(tal) + ' är ett primtal.')
else:
    print(str(tal) + ' är INTE ett primtal.')
    print('Det är delbart med ' + str(x) + '.')</div>
	<button type="button" id="example-prime" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

@if(request()->session()->get('easy_mode'))
<?php $code = trim(json_encode("x = 1
while x < 100:
    x = 2 * x
print(x)"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'while_two_predict',
    'code' => $code,
    'options' => ['4','8', '16','32','64', '128'],
    'correct' => 6,
    'correct_text' => 'Bra!! Värdet x är alltid en tvåpotens. Eftersom 64 < 100 så kommer x få värdet 128 i sista iterationen.'
])
@else
<?php $code = trim(json_encode("x = 1
loopar = 0
while x < 100:
    x = 2 * x
    loopar = loopar + 1
print(str(x) + ',' + str(loopar))"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'while_two_predict',
    'code' => $code,
    'options' => ['64,6','99,6', '128,6','64,7','99,7', '128,7'],
    'correct' => 6,
    'correct_text' => 'Snyggt! Värdet x är alltid en tvåpotens. Eftersom 64 < 100 så kommer x få värdet 128 i sista iterationen och eftersom 2<sup>7</sup> = 128 så innebär det att loopar = 7 vid utskriften.'
])
@endif

<?php 
$correctInput = json_encode( array(array("3"), array("4")) );
$correctOutput = json_encode( array(array("7", "14", "21"), array("7", "14", "21", "28") ));
$code = json_encode( array("n = int(input('Antal:'))", "", "i = 1", "while i <= n:", "    #skriv kod här", "    i = i + 1") );
?>
@if(request()->session()->get('easy_mode'))
@livewire('editor-modify-correct', [
    'editorId' => 'while-make-multiplication',
    'code' => $code,
    'rows' => 10,
    'showReset' => true,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Multiplikationstabellen',
    'text' => 'Ditt program ska ta ett heltal n som input av användaren. Därefter ska programmet skriva ut de n första talen i multiplikationstabellen för 7.
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 1</h3>
            <div class="mr-2 p-2 bg-gray-500 text-white">
                5
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 1</h3>
            <div class="p-2 bg-gray-500 text-white">
            7<br>14<br>21<br>28<br>35
            </div>
        </div>
    </div>
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input 2</h3>
            <div class="mr-2 p-2 bg-gray-500 text-white">
                2
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output 2</h3>
            <div class="p-2 bg-gray-500 text-white">
            7<br>14
            </div>
        </div>
    </div>',
    'tip_text' => 'Skriv ut <span class="border">i * 7</span> i varje iteration.'
])
@else
@livewire('editor-modify-correct', [
    'editorId' => 'while-make-multiplication',
    'code' => '',
    'rows' => 10,
    'showReset' => false,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Multiplikationstabellen',
    'text' => 'Ditt program ska ta ett heltal n som input av användaren. Därefter ska programmet skriva ut de n första talen i multiplikationstabellen för 7.
    <div class="flex mb-5">
        <div class="w-1/2">
            <h3 class="font-bold">Exempel input</h3>
            <div class="mr-2 p-2 bg-gray-500 text-white">
                5
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Exempel output</h3>
            <div class="p-2 bg-gray-500 text-white">
            7<br>14<br>21<br>28<br>35
            </div>
        </div>
    </div>',
    'tip_text' => 'Du behöver kod som repeteras n gånger. Om x är din variabel som ökar för varje iteration och börjar på ett, skriv ut <span class="border">x * 7</span> i varje iteration.'
])
@endif

<p>Vill du träna mer på <i>while</i>? Se aktiviteten <a target="_tab" class="text-green-500 hover:underline" href="/problemlosning/lan-med-ranta">Lån med ränta</a>.</p>

@endsection