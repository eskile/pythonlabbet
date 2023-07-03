@extends('template-section')
@section('title', 'Lexikon eller "dictionary" i Python')
@section('description', 'Lexikon i Python (dictionary på engelska) är en datastruktur som har nycklar och värden. Till varje nyckel finns ett värde.')
@section('content')
@include('reference', ['basics1' => true, 'basics2' => true])

<h1>Lexikon eller "dictionary"</h1>
<p class="mb-1">I det här avsnittet kommer du att lära dig att</p>
<ul>
    <li>Förstå vad lexikon är bra att använda till</li>
    <li>Olika metoder att skapa ett lexikon</li>
    <li>Läsa från och använda ett lexikon</li>
</ul>

<h2>Vad är ett lexikon?</h2>
<p>Ett lexikon (engelska: dictionary) består av nycklar och värden. <b>Till varje nyckel finns ett värde</b>.
En nyckel måste vara <b>unik</b> medan ett värde kan finnas flera gånger i samma lexikon.
Nycklar används för att komma åt värdet som associeras med den nyckeln.</p>

<p>Genom att Python använder något som kallas <em>hashing</em> går det snabbt att ta fram ett värde när vi har nyckeln.
Det behövs ingen sökning. I princip gäller att även om ett lexikon är väldigt stort så tar det inte längre tid att hitta ett värde.
Det är den stora <b>fördelen</b> med lexikon.
</p>

<p>Vanliga typer för nycklar är tal och strängar men det fungerar också att ha exempelvis tupler som nycklar. 
Det går att ha alla sorts objeket som är oföränderliga (engelska: immutable). Listor fungerar alltså inte som nycklar.
Som värde går det däremot bra med listor eller vilken annan typ som helst.</p>

<h2>Skapa ett lexikon</h2>
<p>Det går att skapa ett lexikon på en rad med syntaxen <p><i>lexikon = {nyckel_1: värde_1, nyckel_2: värde_2, ...}</i></p>
<p>För att sedan läsa till exempel värde_1 kan vi skriva <i>lexikon[nyckel_1]</i>.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ett lexikon med priserna för olika frukter. För tydlighet skrivs varje element på en egen rad. Observera att två olika frukter kan ha samma pris.</p>
  <pre><code class="language-python">priser = {
    'äpplen': 29, 
    'bananer': 24, 
    'apelsiner': 19, 
    'vindruvor': 29
}
pris_bananer = priser['bananer']
  </code></pre>
  <div id="example-fruit-dict-code" class="hidden">priser = {
    'äpplen': 29,
    'bananer': 24,
    'apelsiner': 19,
    'vindruvor': 29
}
pris_bananer = priser['bananer']

print('Hela lexikonet:',priser)
print('Bananpris:', pris_bananer,'kr/kg')
  </div>
	<button type="button" id="example-fruit-dict" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Det går också att först skapa ett tomt lexikon med <i>dict()</i> eller <i>{}</i> och sedan lägga till nyckel-värde-par en och en. 
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Lägg till element i ett från början tomt lexikon. Nycklarna är universitetsstäder och värden är antal studenter.</p>
  <pre><code class="language-python">studenter = dict()
studenter['Lund'] = 32036
studenter['Uppsala'] = 35556
studenter['Stockholm'] = 37484
  </code></pre>
  <div id="example-students-code" class="hidden">studenter = dict()
studenter['Lund'] = 32036
studenter['Uppsala'] = 35556
studenter['Stockholm'] = 37484

print('Antal studenter i Lund är', studenter['Lund'])</div>
	<button type="button" id="example-students" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Om vi skriver ett värde till en nyckel som redan finns i vårt lexikon så skrivs värdet över.
    För att se hur många nyckel-värde-par det finns i ett lexikon kan <i>len()</i> användas.
</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Vi ser att antal element i ett lexikon förbli samma om vi skriver till en nyckel som redan finns.</p>
  <pre><code class="language-python">favoritmat = {
    'Emil': 'Sushi',
    'Leo': 'Hamburgare',
    'Tanja': 'Pizza'
}
element_1 = len(favoritmat) # 3 element

#ändrar värdet för en existerande nyckel
favoritmat['Tanja'] = 'Corn Flakes'
element_2 = len(favoritmat) # 3 element

#lägger till ett nytt nyckel-värde-par
favoritmat['Christine'] = 'Popcorn'
element_3 = len(favoritmat) # 4 element</code></pre>
  <div id="example-food-code" class="hidden">favoritmat = {
    'Emil': 'Sushi',
    'Leo': 'Hamburgare',
    'Tanja': 'Pizza'
}
element_1 = len(favoritmat) # 3 element

#ändrar värdet för en existerande nyckel
favoritmat['Tanja'] = 'Corn Flakes'
element_2 = len(favoritmat) # 3 element

#lägger till ett nytt nyckel-värde-par
favoritmat['Christine'] = 'Popcorn'
element_3 = len(favoritmat) # 4 element

print(element_1)
print(element_2)
print(element_3)</div>
	<button type="button" id="example-food" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = trim(json_encode("antal = {
    'bananer':5,
    'apelsiner':7,
    'päron':3
} 
antal['bananer'] += 3
antal['päron'] -= 2
antal['apelsiner'] //= 2
frukter = antal['bananer'] + antal['päron'] + antal['apelsiner']
print(frukter)
frukter = 2"), '"');?>
@livewire('editor-quiz', [
    'editorId' => 'dictionary_predict',
    'code' => $code,
    'options' => ['2','12', '12.5', '15'  ],
    'correct' => 2
])

<h2>Använda lexikon</h2>
<p>Som vi såg tidigare kan ett värde läsas genom att skriva <i>lexikon[nyckel]</i>.
Om inte nyckeln finns i lexikonet blir det fel i programmet. </p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel med fel</h3>
  <p>Testa koden för att se vilket fel det blir när en nyckel som inte finns används.</p>
  <pre><code class="language-python">lexikon = dict()
print(lexikon['nyckel_som_inte_finns'])
  </code></pre>
  <div id="example-keyerror-code" class="hidden">lexikon = dict()
print(lexikon['nyckel_som_inte_finns'])</div>
	<button type="button" id="example-keyerror" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Vi kan se om nyckeln existerar med <i>if nyckel in lexikon:</i>. 
Det går generellt mycket snabbt att se <b>om en nyckel finns</b> eller inte, och det tar samma korta tid även om lexikonet är väldigt stort.
Det kan jämföras med att istället ha en <b>lista</b> med nycklar, då tar det mycket längre tid att se om nyckeln finns i en stor lista jämfört med en liten lista.
(<em>Överkurs:</em> I en dubbelt så stor lista så tar det dubbelt så lång tid att söka efter ett värde. I ett lexikon är tiden oberoende av storleken.)
</p> 

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Om nyckeln finns i listan skriver vi ut värdet, annars informerar vi om att nyckeln inte finns.</p>
  <pre><code class="language-python">milj_invånare = {
    'Sverige':10.4,
    'Danmark':5.8,
    'Norge':5.4,
    'Finland':5.5
}
nyckel = input('Skriv land.')

if nyckel in milj_invånare:
    print(nyckel, milj_invånare[nyckel])
else:
    print(nyckel, 'finns inte i registret.')
  </code></pre>
  <div id="example-key-in-code" class="hidden">milj_invånare = {
    'Sverige':10.4,
    'Danmark':5.8,
    'Norge':5.4,
    'Finland':5.5
}

nyckel = input('Skriv land.')
if nyckel in milj_invånare:
    print(nyckel, milj_invånare[nyckel])
else:
    print(nyckel, 'finns inte i registret.')</div>
	<button type="button" id="example-key-in" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>Det är enkelt att <b>ta bort</b> element ur ett lexikon.
Det görs med <i>lexikon.pop(nyckel)</i>.

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Ta bort ett nyckel-värde-par ur ett lexikon.</p>
  <pre><code class="language-python">användare = {
    'id': 2814,
    'namn': 'Darth Vader',
    'personlighet': 'ond'
  }

användare.pop('personlighet')
  </code></pre>
  <div id="example-pop-code" class="hidden">användare = {
    'id': 2814,
    'namn': 'Darth Vader',
    'personlighet': 'ond'
  }

användare.pop('personlighet')
print(användare)</div>
	<button type="button" id="example-pop" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php 
$correctInput = json_encode( array(array("1")) );
$correctOutput = json_encode( array(array("{'namn': 'Emil', 'ålder': 37, 'stad': 'Lund', 'gift': True, 'barn': False, 'språk': ['C++', 'Python', 'Javascript', 'PHP'], 'stjärntecken': 'Lejon'}", "{'namn': 'Emil', 'ålder': 38, 'stad': 'Lund', 'gift': True, 'barn': True, 'språk': ['C++', 'Python', 'Javascript', 'PHP', 'Engelska']}")) );
$code = json_encode( array("persondata = {","    'namn': 'Emil',","    'ålder': 37,","    'stad': 'Lund',","    'gift': True,","    'barn': False,","    'språk': ['C++', 'Python', 'Javascript', 'PHP'],","    'stjärntecken': 'Lejon'","}","print(persondata)", "", "# Skriv kod för att ändra i persondata här") );?>
@livewire('editor-modify-correct', [
    'editorId' => 'dictionary_modify',
    'code' => $code,
    'rows' => 25,
    'correctInput' => $correctInput,
    'correctOutput' => $correctOutput,
    'title' => 'Ändra i koden',
    'add_code' => 'print(persondata)',
    'text' => 'Det har smugit in sig ett par fel i <span class="border">persondata</span>. Följande saker måste ändras: <ul><li>Lägg till <b>ett år</b> på åldern.</li><li>Ändra status på barn till <span class="border">True</span>.</li><li> Lägg till <b>Engelska</b> sist i listan på språk.</li><li> Dessutom gillar Emil inte horoskop så <b>ta bort</b> nyckeln <span class="border">stjärntecken</span> från lexikonet.</li></ul><p>Programmet ska inte skriva ut mer än vad som redan skrivs ut på rad 10.</p><p>Observera att det inte fungerar att ändra på rad 1-8. Lägg till kod nedanför rad 11.',
    'tip_text' => 'Se exemplet ovan hur en nyckel tas bort. För att t.ex. ändra åldern kan du skriva <span class="border">persondata[\'ålder\'] += 1</span>.'
])

<h2>Iterera över ett lexikon</h2>
<p>Ett lexikon kan itereras över genom att dels iterera över alla nycklar och dels genom att iterera över alla värden.</p>
<p>För att iterera över att alla nycklar skriver vi <i>for nyckel in lexikon:</i>, där
<i>nyckel</i> är en variabel som i tur och ordning innehåller nyckel för nyckel genom loopen.

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Iterera över nycklarna i ett lexikon.</p>
  <pre><code class="language-python">grand_slams = {
    'Court': 24,
    'Williams': 23,
    'Graf': 22,
    'Federer': 20,
    'Nadal': 20,
    'Djokovic': 20
  }

for spelare in grand_slams:
    print(spelare, 'har', grand_slams[spelare], 'Grand Slam segrar.')
  </code></pre>
  <div id="example-iterate-keys-code" class="hidden">grand_slams = {
    'Court': 24,
    'Williams': 23,
    'Graf': 22,
    'Federer': 20,
    'Nadal': 20,
    'Djokovic': 20
  }

for spelare in grand_slams:
    print(spelare, 'har', grand_slams[spelare], 'Grand Slam segrar.')</div>
	<button type="button" id="example-iterate-keys" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<p>För att iterera över värdena i ett lexikon kan vi använda funktionen <i>lexikon.values()</i> som returnerar en lista av alla värden.</p>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Iterera över värdena i ett lexikon.</p>
  <pre><code class="language-python">grand_slams = {
    'Court': 24,
    'Williams': 23,
    'Graf': 22,
    'Federer': 20,
    'Nadal': 20,
    'Djokovic': 20
  }

for segrar in grand_slams.values():
    print('Antal segrar', segrar)</code></pre>
  <div id="example-iterate-values-code" class="hidden">grand_slams = {
    'Court': 24,
    'Williams': 23,
    'Graf': 22,
    'Federer': 20,
    'Nadal': 20,
    'Djokovic': 20
  }

for segrar in grand_slams.values():
    print('Antal segrar', segrar)</div>
	<button type="button" id="example-iterate-values" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>

<?php $code = json_encode( array("besök = { (0,1): 131, (0,2): 79, (0,3): 58, (0,4): 47, (0,5): 20, (0,6): 18, (0,7): 23, (0,8): 19, (0,9): 12, (1,0): 186, (1,1): 81, (1,2): 34, (1,3): 47, (1,4): 33, (1,5): 22, (1,6): 21, (1,7): 20, (1,8): 20, (1,9): 16, (2,0): 78, (2,1): 59, (2,2): 47, (2,3): 29, (2,4): 30, (2,5): 17, (2,6): 20, (2,7): 20, (2,8): 11, (2,9): 16, (3,0): 47, (3,1): 48, (3,2): 35, (3,3): 25, (3,4): 18, (3,5): 17, (3,6): 12, (3,7): 13, (3,8): 11, (3,9): 8, (4,0): 33, (4,1): 33, (4,2): 25, (4,3): 25, (4,4): 20, (4,5): 21, (4,6): 15, (4,7): 16, (4,8): 10, (4,9): 8, (5,0): 36, (5,1): 27, (5,2): 21, (5,3): 18, (5,4): 11, (5,5): 11, (5,6): 10, (5,7): 17, (5,8): 13, (5,9): 9, (6,0): 16, (6,1): 18, (6,2): 18, (6,3): 14, (6,4): 18, (6,5): 10, (6,6): 14, (6,7): 12, (6,8): 9, (6,9): 6, (7,0): 24, (7,1): 20, (7,2): 21, (7,3): 16, (7,4): 13, (7,5): 12, (7,6): 9, (7,7): 10, (7,8): 8, (7,9): 9, (8,0): 24, (8,1): 16, (8,2): 12, (8,3): 16, (8,4): 15, (8,5): 10, (8,6): 10, (8,7): 12, (8,8): 9, (8,9): 6, (9,0): 15, (9,1): 14, (9,2): 9, (9,3): 12, (9,4): 13, (9,5): 12, (9,6): 11, (9,7): 12, (9,8): 10, (9,9): 5 }", "") );?>
@livewire('editor-make', [
    'editorId' => 'dictionary-create', 
    'text' => 'Myran Myra bor i koordinaten (0,0). Ibland vandrar hon till en annan koordinat och sedan hem igen. 
    Hon reser alltid parallellt med x- och y-axeln. Hon har samlat vilka koordinater hon har besökt och hur många gånger hon besökt dem i ett lexikon. 
    <span class="block my-2">Ett element som <span class="border">(3,2): 35</span> betyder att Myra besökt koordinaten (3,2) 35 gånger.</span>
    <span class="block my-2">Nu vill Myra veta vilken koordinat som hon har spenderat <b>mest tid</b> att gå fram och tillbaka till. Hon vandrar alltid lika fort.</span>
    <span class="block my-2">Till koordinaten (3,2) har Myra vandrat sträckan 35*(2+3)*2 fram och tillbaka.</span>
    <span class="block my-2">Skriv ut rätt koordinat på formen <span class="border">(x,y)</span>.</span>', 
    'code' => $code, 'rows' => 20,
    'correctAnswer' => array("(5,7)"),
    'tip_text' => 'Iterera över alla elementen och räkna ut hur lång tid det tagit totalt för varje element. Uppdatera variabler över största värdet och för vilken koordinat det största värdet gäller i loopen.'
])

@endsection