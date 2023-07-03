@extends('template-section')
@section('title', 'Mer om print och annat i Python')
@section('description', '')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])
<h1>Mer om print och annat</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Mer om <i>print</i>-funktionen</li>
    <li>Tips och tricks som gör Pythonlivet enklare</li>
</ul>

<h2>Flera argument</h2>
<p>Genom att skriva flera argument till <i>print</i> kan vi skriva ut flera saker på en gång. 
Om vi exempelvis vill skriva ut variablerna <i>x</i> och <i>y</i> så kan vi skriva <i>print(x, y)</i>. De kommer då på samma rad med ett mellanrum mellan dem.
Vi har naturligtvis kunnat göra det tidigare med <i>print(str(x) + ' ' + str(y))</i> men du håller säkert med om att det här är enklare att skriva. 

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skriva ut flera saker samtidigt med flera argument till <span class="border">print</span>.</p>
  <pre><code class="language-python">print('Ett', 'Två')
print('Ett', 'Två', 'Tre')
</code></pre>
  <div id="example-print-args-code" class="hidden">print('Ett', 'Två')
print('Ett', 'Två', 'Tre')</div>
    <button type="button" id="example-print-args" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Avsluta med annat än ny rad</h2>
<p>Hittills har varje <i>print</i> inneburit en ny rad i utskriften. Det är standardinställningen för <i>print</i>, men det går att ändra på med ett argumentet med namn <b>end</b>. 
Som standard är <i>end='\n'</i> där <i>\n</i> är tecknet för ny rad. Vanligast är att använda <i>end=''</i> (inget) eller <i>end=' '</i> (mellanrum) om vi vill ändra på standardbeteendet. Det här argumentet måste stå i slutet av argumenten.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Använda argumentet <span class="border">end</span> när skriver ut i en loop.</p>
  <pre><code class="language-python">talföljd = [0, 1, 1, 2, 3, 5]
for tal in talföljd:
    print(tal, end=' ')</code></pre>
  <div id="example-print-end-code" class="hidden">talföljd = [0, 1, 1, 2, 3, 5]
for tal in talföljd:
    print(tal, end=' ')</div>
    <button type="button" id="example-print-end" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Separera med annat än mellanrum</h2>
<p>Som vi sett separeras utskrifterna med mellanrum när vi använder flera argument till <i>print</i>. Det kan vi ändra på med hjälp av argumentet <b>sep</b>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Argumentet <span class="border">sep</span> används till att ställa in vad som ska separera utskrifter.</p>
  <pre><code class="language-python">print(2021,12,24, sep='-')
print('Ett', 'Två', 'Tre', sep=' / ')</code></pre>
  <div id="example-print-sep-code" class="hidden">print(2021,12,24, sep='-')
print('Ett', 'Två', 'Tre', sep=' / ')</div>
    <button type="button" id="example-print-sep" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>
    
</p>

<h2>Packa upp med operatorn *</h2>
<p>Att skriva ut talföljden i exemplet ovan kan göras utan en loop med operatorn <i>*</i>. Den "packar upp" innehållet i listan och elementen blir som argument till funktionen istället.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Packa upp elementen i listan med operatorn *.</p>
  <pre><code class="language-python">talföljd = [0, 1, 1, 2, 3, 5]
print(*talföljd)
print(*talföljd, sep='->') #sep och end går fortfarande att använda</code></pre>
  <div id="example-print-unpack-code" class="hidden">talföljd = [0, 1, 1, 2, 3, 5]
print(*talföljd)
print(*talföljd, sep='->') #sep och end går fortfarande att använda</div>
    <button type="button" id="example-print-unpack" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("print('Test', 1, 2, 3, sep=', ', end='.')
print('Slut')"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'more-print-predict-sep-end',
    'code' => $code,
    'options' => ['Test 1 2 3.
Slut','Test, 1, 2, 3.
Slut', 'Test, 1, 2, 3.Slut', 'Test 1 2 3.Slut'],
    'correct' => 3
])

<p>Det var några bra saker att känna till om <i>print</i>. Nu ska vi gå över till andra detaljer i Python som kan förenkla livet och som är bra att känna till.</p>

<h2>Strängar kan skrivas med ' eller "</h2>
<p>På Pythonlabbet används <i>'</i> till strängar, mest för att det bara krävs ett tangentbordstryck med svenskt tangentbord. I Python spelar det dock ingen roll om enkla eller dubbla citattecken används till strängar.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Två olika sätt att skriva en sträng på.</p>
  <pre><code class="language-python">a = 'En sträng'
#är samma sak som:
b = "En sträng"</code></pre>
  <div id="example-strings-code" class="hidden">a = 'En sträng'
#är samma sak som:
b = "En sträng"
print(a,b, sep = ' | ')</div>
    <button type="button" id="example-strings" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Det går inte att blanda enkla och dubbla citattecken för samma sträng.</p>

<h2>Nya operatorer</h2>
<p>Flera gånger har vi skrivit rader som <i>i = i + 1</i> för att lägga till ett till värdet på i. 
Det går att skriva förkortat <i>i += 1</i>. Operatorn <i>+=</i> lägger helt enkelt till ett värde utan att vi behöver skriva variabelns namn två gånger. I tabellen nedan kan du se fler exempel på liknande operatorer.</p>
 
<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Operator</th>
        <th class="pr-24 text-left">Exempel</th>
        <th class="text-left pl-8">Samma som</th>
    </tr>
    <tr class="border-b">
        <td>+=</td>
        <td><i>i += 1</i></td>
        <td class="pl-8"><i>i = i + 1</i></td>
    </tr>
    <tr class="border-b">
        <td>&minus;=</td>
        <td><i>i -= 1</i></td>
        <td class="pl-8"><i>i = i - 1</i></td>
    </tr>
    <tr class="border-b">
        <td>*=</td>
        <td><i>i *= 10</td>
        <td class="pl-8"><i>i = i * 10</i></td>
    </tr>
    <tr class="border-b">
        <td>/=</td>
        <td><i>i /= 2</i></td>
        <td class="pl-8"><i>i = i / 2</i></td>

    </tr>
    <tr class="border-b">
        <td>//=</td>
        <td><i>i //= 2</i></td>
        <td class="pl-8"><i>i = i // 2</i></td>

    </tr>
    <tr class="border-b">
        <td>%=</td>
        <td><i>i %= 2</i></td>
        <td class="pl-8"><i>i = i % 2</i></td>

    </tr>
    <tr class="border-b">
        <td>**=</td>
        <td><i>i **= 2</i></td>
        <td class="pl-8"><i>i = i ** 2</i></td>

    </tr>
</table>

<h2>Funktionerna strip och split på strängar</h2>
<p>Ibland innehåller en sträng oönskade tecken i början och/eller i slutet. 
  Ett exempel är när vi tar emot text från användaren, då är det lätt hänt att det kommer med något blanksteg. 
  Vi kan använda strängens inbyggda funktion <i>strip()</i> för att ta bort dessa. </p>
  <p>Precis som <i>append()</i> och <i>pop()</i> är funktioner för listor är funktioner som <i>strip()</i> endast för strängar. 
  Sådana funktioner anropas med en <b>punkt</b> efter variabelnamnet, så här <i>sträng.strip()</i>. 
  Funktionen förändrar inte strängen, för att spara resultatet behöver vi skriva <i>sträng = sträng.strip()</i>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Använda <span class="border">strip()</span> för att rensa blanksteg i början och slutet av en sträng. Klicka testa för att se hur många tecken strängen s har före och efter.</p>
  <pre><code class="language-python">s = '   pYtHoNlAbBeT    '
s = s.strip()</code></pre>
  <div id="example-strip-code" class="hidden">s = '   pYtHoNlAbBeT    '
print('Antal tecken i strängen s:', len(s))
s = s.strip()
print('Antal tecken i strängen s:', len(s))
</div>
    <button type="button" id="example-strip" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>
<p><i>strip()</i> tar även bort tecken som <i>\n</i> (ny rad) och <i>\t</i> (tabb).</p>
  
<p>En annan funktion som följer med strängar är <i>split()</i>. 
Som standard delar den upp en sträng i mindre delar som är separerade av blanka tecken (mellanrum, ny rad, tabb). 
Funktionen returnerar en lista med beståndsdelarna. 
Ett exempel är en mening, <i>split()</i> delar upp meningen i ord.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Delar upp en mening i ord med <span class="border">split()</span></p>
  <pre><code class="language-python">mening = 'Hoppas det är kul att lära sig Python'
orden = mening.split()
#orden = ['Hoppas','det','är','kul','att','lära','sig','Python']</code></pre>
  <div id="example-split-code" class="hidden">mening = 'Hoppas det är kul att lära sig Python'
orden = mening.split()
print(orden)</div>
    <button type="button" id="example-split" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Eftersom <i>strip()</i> returnerar en sträng går det att använda <i>split()</i> direkt efter <i>strip()</i> så här: <i>sträng.strip().split()</i>.
Det går dock inte att använda funktionerna i omvänd ordning eftersom <i>split()</i> returner en lista och det går inte att använda <i>strip()</i> på en lista.</p>

<?php $code = trim(json_encode("konstig_sträng = ' \\t\\n konstig sträng \\t\\n'
min_sträng = konstig_sträng.strip().split()
print(min_sträng[1])"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'more-print-predict-strip-split',
    'code' => $code,
    'options' => ['konstig_sträng','konstig sträng', 'konstig', 'sträng'],
    'correct' => 4
])

<?php 
$correctInput = json_encode( array(array("5 7 3 5")) );
$correctOutput = json_encode( array(array("20") ));
?>
@livewire('editor-modify-correct', [
    'editorId' => 'more-print-make',
    'code' => '',
    'rows' => 10,
    'showReset' => false,
    'correctAnswer' => array("N/A"),
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Skapa',
    'text' => 'Programmet ska ta emot en rad med heltal separerade av blanksteg som enda input. <br>Exempelvis  <span class="border">1 2 3</span>. Skriv ut summan av talen.',
    'tip_text' => 'Använd <span class="border">split</span> på användarens sträng vilket skapar en lista. Gå igenom listan med t.ex. en for-sats och summera talen till en variabel. Glöm inte att omvandla talen i listan med hjälp av <span class="border">int</span>.'
])

@endsection
