@extends('template-section')
@section('title', 'Mängder eller "set" i Python')
@section('description', 'En mängd är en oordnad samling av element. En viktig egenskap hos en mängd är att det inte kan innehålla dubbletter. I Python heter mängder "set".')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])

<h1>Mängder eller "sets"</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Förstå vad en mängd är och vad det används till</li>
    <li>Lägga till, ta bort och se efter om ett element finns i mängden</li>
</ul>

<h2>Vad är en mängd?</h2>
<p>Mängder är ett vanligt begrepp i matematiken. En mängd är en <b>samling av element</b>. Dubletter är inte tillåtna.
Om vi försöker lägga till ett element som redan finns i mängden händer ingenting, mängden förblir densamma.</p>

<p>I Python kallas en mängd för <i>set</i>, vilket också är det engelska ordet för mängd. 
De <b>vanligaste funktionerna</b> för mängder är att lägga till element, ta bort element och se om ett element finns i mängden.

<p>Om bara de vanligaste funktionerna används är likheterna mellan mängder och lexikon stora.
För mängder i Python finns dock specialiserade funktioner som är användbara just för mängder.
På två mängder kan vi till exempel använda unionen (lägga ihop) och snittet (se vilka värden som finns i båda mängder).
För läsbarhetens skull rekommenderas att använda en mängd ifall det räcker.</p>

<h2>Vanliga funktioner</h2>
<p>Precis som för lexikon finns det två vanliga sätt att skapa en mängd på. Se exempel nedan.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skapa en mängd med klamrar.</p>
  <pre><code class="language-python">mängd = {1, 2, 3}</code></pre>
  <div id="example-set-create-code" class="hidden">mängd = {1, 2, 3}
print(mängd)</div>
	<button type="button" id="example-set-create" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Skapa en tom mängd och lägg sedan till element ett och ett.</p>
  <pre><code class="language-python">mängd = set()
mängd.add(1)
mängd.add(2)
mängd.add(3)
mängd.add(3) #händer inget, 3 finns redan.
  </code></pre>
  <div id="example-set-create-2-code" class="hidden">mängd = set()
mängd.add(1)
mängd.add(2)
mängd.add(3)
mängd.add(3) #händer inget, 3 finns redan.

print(mängd)</div>
	<button type="button" id="example-set-create-2" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>För att <b>ta bort</b> ett element ur en mängd finns bland annat <i>mängd.pop()</i> och <i>mängd.remove(element)</i>.
Funktionen <i>pop</i> returnerar elementet som tas bort och kan användas om det inte spelar något roll vilket element som plockas ut ur listan.</p>

<p>Använd <i>remove</i> för att ta bort ett specifikt element. Observera att <i>remove</i> ger <em>Keyerror</em> om elementet som du försöker ta bort inte finns. 
Om du inte vill det så finns <i>mängd.discard(element)</i> som fungerar även om elementet inte finns i mängden.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ta bort ett element med <span class="border">pop()</span> och <span class="border">remove(element)</span>.</p>
  <pre><code class="language-python">husdjur = {'Katt', 'Hund', 'Get', 'Zebra'}
husdjur.remove('Zebra')
borttaget = husdjur.pop()
  </code></pre>
  <div id="example-set-pop-code" class="hidden">husdjur = {'Katt', 'Hund', 'Get', 'Zebra'}
husdjur.remove('Zebra')
print(husdjur)
borttaget = husdjur.pop()
print('Borttaget:',borttaget)
print(husdjur)</div>
	<button type="button" id="example-set-pop" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>För att se <b>om ett element finns i mängden</b> används <i>in</i> precis som för nycklar hos ett lexikon.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Se om ett element finns i mängden med <span class="border">in</span>.</p>
  <pre><code class="language-python">husdjur = {'Katt', 'Hund', 'Get', 'Zebra'}
if 'Hund' in husdjur:
    print('Hund finns i mängden husdjur.')
  </code></pre>
  <div id="example-set-in-code" class="hidden">husdjur = {'Katt', 'Hund', 'Get', 'Zebra'}
if 'Hund' in husdjur:
    print('Hund finns i mängden husdjur.')</div>
	<button type="button" id="example-set-in" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("m = {31, 92}
m.add(92)
m.remove(92)
m.add(94)

if 92 in m:
    a = m.pop()
    b = m.pop()
    print(a+b)
else:
    a = m.pop()
    b = m.pop()
    print(abs(b - a))
    "), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'set-quiz',
    'code' => $code,
    'options' => ['-61', '61', '63', '123'],
    'correct' => 3
])

<h2>Dubbletter och set()</h2>
<p>Det finns ett enkelt knep för att räkna antalet <b>unika element</b> i en lista eller en tupel. Om listan eller tupeln omvandlas till en mängd försvinner automatiskt alla dubletter.
Tänk bara på att ordningen på elementen inte bevaras. </p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Vi använder <span class="border">set()</span> på lista för att ta bort alla dubbletter.</p>
  <pre><code class="language-python">lista = [3, 7, 2, 3, 6, 8, 3]
mängd = set(lista)
antal_unika_elemement = len(mängd) # 5 st
antal_dubbletter = len(lista) - len(mängd) # 2 st
  </code></pre>
  <div id="example-set-unique-code" class="hidden">lista = [3, 7, 2, 3, 6, 8, 3]
mängd = set(lista)
antal_unika_elemement = len(mängd) # 5 st
antal_dubbletter = len(lista) - len(mängd) # 2 st

print('Unika element:', antal_unika_elemement)
print('Dubbletter:', antal_dubbletter)</div>
	<button type="button" id="example-set-unique" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<h2>Iterera över en mängd</h2>
<p>Om vi vill iterera igenom hela mängden element för element och samtidigt hålla mängden intakt kan vi enkelt göra det med <i>for</i>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Iterera över en mängd. Mängden ser likadan ut efteråt.</p>
  <pre><code class="language-python">racketlon = {'bordtennis', 'badminton', 'squash', 'tennis'}
for sport in racketlon:
    print(sport)
  </code></pre>
  <div id="example-set-for-code" class="hidden">racketlon = {'bordtennis', 'badminton', 'squash', 'tennis'}
for sport in racketlon:
    print(sport)</div>
	<button type="button" id="example-set-for" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Om vi istället vill <b>ta ut</b> ett element i taget tills mängden är tom kan vi använda 
<i>while mängd:</i> och <i>mängd.pop()</i> som exemplet nedan visar. While-satsen <i>while mängd:</i>
fortsätter tills mängden är tom. Det är alltså viktigt att mängden med säkerhet till slut blir tom, 
annars blir det en oändlig loop.</p>

</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ta ut ett element i taget från en mängd tills mängden är tom.</p>
  <pre><code class="language-python">mängd = {'Carina', 'Per-Göran', 'Elisabeth', 'Ola'}
while mängd:
    namn = mängd.pop()
    print('Utplockat namn', namn)
  </code></pre>
  <div id="example-set-while-pop-code" class="hidden">mängd = {'Carina', 'Per-Göran', 'Elisabeth', 'Ola'}
while mängd:
    namn = mängd.pop()
    print('Utplockat namn', namn)

print(mängd) #tom mängd  </div>
	<button type="button" id="example-set-while-pop" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php 
$correctInput = json_encode( array(array("3", "test", "test", "annan"), array("3", "test", "testar", "Test")) );
$correctOutput = json_encode( array(array("Du skrev in 2 unika element."), array("Du skrev in 3 unika element.")) );
$code = json_encode( array("n = int(input('Hur många element vill du skriva in?'))","","lista = []","for i in range(n):","    element = input()","    lista.append(element)","","# räkna ut unika_element här","","print('Du skrev in', unika_element, 'unika element.')") );?>
@livewire('editor-modify-correct', [
    'editorId' => 'set-modify',
    'code' => $code,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Ändra i koden',
    'add_code' => '',
    'text' => 'Programmet nedan tar emot ett antal strängar från användaren och lägger i en lista. Använd vad du lärt dig om mängder för att räkna ut hur många unika element som användaren har skrivit in. Spara antalet i variabeln <span class="border">unika_element</span>.',
    'tip_text' => 'Gör om listan till en mängd. Antalet element i mängden är antal unika element.'
])


@endsection