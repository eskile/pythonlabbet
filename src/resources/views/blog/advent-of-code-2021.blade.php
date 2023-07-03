@extends('blog.template-blog')
@section('title', 'Advent of Code 2021 - första veckans lösningar på video')
@section('description', 'Om en månad börjar årets roligaste programmeringsäventyr - Advent of Code.')
@section('content')

<h1>Advent of Code 2021 - sammanfattning</h1>
<p class="text-sm text-gray-500">11 januari 2022 - av Pythonlabbet</p>
<p>Ännu en trevlig omgång av Advent of Code är avslutad. Jag tror det här var de svåraste problemen hittills.</p>
<p>En bra indikator på hur omständigt ett problem är att lösa är att titta på hur lång tid det tar för den 100:e bästa att få båda stjärnor.
Förra året var <a target="_tab" class="text-green-500 hover:underline" href="https://adventofcode.com/2020/day/20">dag 20</a> (leta sjömonster) nog den som tog längst tid och det tog över en timme
för den 100:e personen. När det börjar närma sig en timme eller till och med gå över, då vet man att det kommer bli tufft.</p>
<p>I år var det <a target="_tab" class="text-green-500 hover:underline" href="https://adventofcode.com/2021/day/18">dag 18</a> som var den första riktigt svåra uppgiften. 
Den följdes av en ännu svårare på <a target="_tab" class="text-green-500 hover:underline" href="https://adventofcode.com/2021/day/19">dag 19</a>. Den tog mer än en timme för 100:e bästa.
<p>Dag 19 handlade om sonder i havet som mätte positionen på olika "fyrer". Sonderna visste inte sina egna positioner och därför behövde olika sonders data samköras för att räkna ut deras
    inbördes relativa positioner. Problemet var dessutom att sonden inte visste sin egen orientering så den kunde vara roterad på 24 olika sätt i relation till en annan sond. 
    Uppgiften var att räkna ut hur många unika fyrer sonderna detekterat. Ja som ni hör, den var besvärlig.</p>

<p>Dag 20 var relativt enkel men sedan kom andra stjärnan på dag 21 som var ganska svår. Samma sak på dag 22, den andra stjärnan är svår. Eftersom jag var på semester och inte ville sitta och koda i flera timmar
slutade jag här. Dag 23 och dag 24 är dock också svåra vad jag kan se. Ändå är det nästan 10 000 person i skrivande stund som har gjort alla stjärnor för 2021! </p>

<p>Hoppas ni kunde njuta av årets upplaga trots att det blev lite oväntat svårt.</p>

<hr>

<h2>Advent of Code 2021 - dag 7</h2>
<p class="text-sm text-gray-500">7 december 2021 - av Pythonlabbet</p>

<p>Dag 7 är här och vi har hittat en svärm av krabbor som kör små ubåtar. Helt normalt i Advent of Code-världen!</p>

<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/nWxDBiJnG7o" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<p class="mt-5">Första veckan är härmed klar. Lycka till med resten av uppgifterna!</p>

<hr>

<h2>Advent of Code 2021 - dag 6</h2>
<p class="text-sm text-gray-500">6 december 2021 - av Pythonlabbet</p>
<p>Vi har hittat massor av fiskar! Vi ska modellera deras tillväxt genom att anta att alla fiskar förökar sig exakt var sjunde dag.
    Idag är vi extra glada för Python. Svaret i del 2 är <b>väldigt</b> stort så det är skönt att Python inte har en övre gräns på talstorlekar.
</p>
<p>Jag råkade spela in båda mina skärmar när jag gjorde videon så var tvungen att klippa till videon. Men det blev helt okej ändå.</p>
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/79lyZ0onqM0" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<p class="mt-5">Jag tänkte göra en video imorgon också, sen får jag se vad jag hinner.</p>

<hr>

<h2>Advent of Code 2021 - dag 5</h2>
<p class="text-sm text-gray-500">5 december 2021 - av Pythonlabbet</p>
<p>I dagens problem ska vi räkna antalet gånger linjer korsar varandra. I första delen endast horisontella och vertikala linjer och
    i andra delen kan linjerna även vara diagonaler med 45 graders vinkel.</p>
<p><a class="text-green-500 hover:underline" href="/exempel/advent-of-code-2021-dag-5">Här hittar ni min kod.</a></p>
 
<hr>

    
<h2>Advent of Code 2021 - dag 4</h2>
<p class="text-sm text-gray-500">4 december 2021 - av Pythonlabbet</p>
<p>Idag spelar vi bingo med en jättestor bläckfisk. Nu på helgen nöjer jag mig med att bara visa koden.
För dag 4 använde jag en del funktioner för bättre struktur.</p>

<p>För del 1 spelar jag bingo tills en vinnare är hittad och skriver då ut "final score". 
I del 2 spelas det på alla bräder som inte finns i mängden av bräde som exkluderas.
Om en bräda är klar läggs till den exkluderade brädor.</p>
<p>Observera att bräderna egentligen borde nollställas mellan del 1 och 2.
    Men det blir ingen skillnad på resultatet, ser ni varför?</p>

<p><a class="text-green-500 hover:underline" href="/exempel/advent-of-code-2021-dag-4">Här hittar ni min kod.</a></p>

<hr>

<h2>Advent of Code 2021 - dag 3</h2>
<p class="text-sm text-gray-500">3 december 2021 - av Pythonlabbet</p>
<p>Igår hade jag visst ställt in videon på att publiceras 3 dec kl 21, det är fixat nu.</p>
<p>Idag tog svårighetsgraden ett hyfsat stort kliv till del 2. Det går också att se på <a target="_tab" class="text-green-500 hover:underline" href="https://adventofcode.com/2021/stats">statistiken</a>,
en större andel har bara en stjärna än vad det varit de två första dagarna. Videon nedan blev också mer än 15 minuter jämfört 5 min och 7 min tidigare.</p>
<p>Jag tror det blir svårt att hinna göra videolösningar nu till helgen så troligtvis är jag tillbaka med video på måndag. Får se om jag göra dag 4, 5, eller 6 då. Kanske tar den som är roligast.</p>
<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/_MaOq7LJeUw" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<p class="mt-5">Trevlig helg!</p>

<hr>

<h2>Advent of Code 2021 - dag 2</h2>
<p class="text-sm text-gray-500">2 december 2021 - av Pythonlabbet</p>
<p>Ikväll publiceras min lösning för dag 2. Idag har jag använt <a target="_tab" class="text-green-500 hover:underline" href="https://repl.it">repl.it</a>.
</p>
<p>Äventyret med ubåten fortsätter och idag ska ta reda på vart vi ska.<p>

<p>Jag kan tipsa om att titta på den globala topplistan, det går att se detaljer för varje dag. 
    Idag hade en användare löst båda delarna på mindre än en och en halv minut.
Men precis som skaparen Eric Wastl så rekommenderar jag starkt att inte försöka lösa problemen
så fort som möjligt. Mycket mysigare att ta det lugnt och njuta av historien!</p>

<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/4erftzzdrGs" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<p class="mt-5">Jag erkänner att det var lite otaktiskt att kalla min variabel för hur långt farkosten kommit för <i>x</i>.
Just eftersom <i>X</i> används i beskrivningen i texten.</p>

<hr>

<h2>Advent of Code 2021 - dag 1</h2>
<p class="text-sm text-gray-500">1 december 2021 - av Pythonlabbet</p>
<p><b>Kl 21 ikväll</b> finns följande video tillgänglig som visar lösningar på dagens äventyr.</p>

<p>Det verkar som att en klantig nisse <a target="_tab" class="text-green-500 hover:underline" href="https://adventofcode.com/2021/day/1">tappat nycklarna till släden i havet</a> och det är vår uppgift att leta rätt på dem.</p>

<p>I videon använder jag <a class="text-green-500 hover:underline" href="https://pythonlabbet.se/koda">pythonlabbet.se/koda</a>.
Imorgon kommer jag visa hur man kan göra på Replit. 
Det gör jag för att jag tycker det är viktigt att visa hur man kan lösa de här problemen utan att behöva installera något på datorn.</p>

<p>För att förstå lösningen är det framförallt avsnitten <a class="text-green-500 hover:underline" href="https://pythonlabbet.se/grundkurs/listor">listor</a>
och <a class="text-green-500 hover:underline" href="https://pythonlabbet.se/grundkurs/for-satsen">for-satsen</a> som är bra att ha gått igenom.

<div class="relative" style="padding-top: 56.25%">
    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube-nocookie.com/embed/ZzKgLdQkGLY" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<p class="mt-5">Om du vill förenkla koden, prova att använda en listbyggare att skapa <i>rows</i>. Det finns också ett knep för att undvika att ta summan elementen,
kan du komma på det?</p>

<p>Hoppas ni också ser fram emot dag 2!</p>

<hr class="my-5">


<h2>Imorgon är det dags</h2>
<p class="text-sm text-gray-500">30 november 2021 - av Pythonlabbet</p>
<p>Imorgon bitti <b>kl 06</b> är det dags! Förra året gick jag upp kl 06 första dagen för att försöka ta en plats på den globala topplistan (svårt).
Det gick att se problemtexten men inputdatan gick inte att ladda ner. Det var för många som ville komma åt första dagens problem samtidigt
och <a target="_tab" class="text-green-500 hover:underline" href="https://www.reddit.com/r/adventofcode/comments/k4ejjz/2020_day_1_unlock_crash_postmortem/">alla servrar kraschade</a>.
Först efter sju minuter eller så gick det att ladda ner inputdatan. Då hade jag visserligen löst problemet men det finns ingen chans att komma på topplistan efter 
så lång tid första dagen.</p>

<div class="my-5"><img src="/img/blog/miniature-dag1.png"></div>

<p>Här på Pythonlabbet är lösningar på video utlovade för den första veckan. Tanken är att dessa videos publiceras på kvällen någon gång.
</p>

<p>Jag brukar skriva koden i Sublime Text eller Visual Code och det kommer jag nog göra de flesta dagar. 
Men för att visa hur ni kan göra för att lösa problemen utan att installera något kommer jag första dagen att använda Pythonlabbet
och andra dagen <a target="_tab" class="text-green-500 hover:underline" href="https://repl.it">repl.it</a>.</p>

<p>Lycka till imorgon!</p>

<hr class="my-5">

<h2>Advent of Code - 2021</h2>
<p class="text-sm text-gray-500">1 november 2021 - av Pythonlabbet</p>
<p>Om <b>en månad</b> smäller det! Nedräkningen har börjat. Den <b>1:a december kl 06</b> på morgonen svensk tid släpps det första problemet.</p>

<p>Advent of Code (<a target="_tab" class="text-green-500 hover:underline" href="https://adventofcode.com">adventofcode.com</a>)
är en <b>julkalender</b> med en <b>nytt problem varje dag</b> i december fram till det sista problemet 25 december. 
Varje problem består av två delar, när det första delproblemet är löst får man tillgång till det andra. 
För varje delproblem som löses får man en guldstjärna och klarar man alla problem får man då ihop 50 guldstjärnor.</p>

<h3 class="font-semibold">Pythonlabbet och Advent of Code</h3>
<p>Den första veckan (minst) kommer Pythonlabbet varje dag att publicera en video på en lösning på dagens problem. Hoppas vi ses då!</p> 

<h3 class="font-semibold">Svårighetsgrad</h3>
<p>De första problemen brukar vara relativt lätta och de bör gå att lösa för många elever som lärt sig grunderna i programmering. 
Speciellt det första delproblemet brukar vara lätt.
Även om svårighetsgraden varierar något upp och ner blir det definitivt <b>svårare efterhand</b>. 
I den andra halvan av julkalendern   föreställer jag mig att även många professionella programmerare blir utmanade.</p>

<h3 class="font-semibold">Bra att veta</h3>
<p>Varje problem har sin egen indata. Denna indata finns i många versioner så olika användare har olika lösningar på problemen.
En del indata är ganska stor och då kan det vara bra att spara indata i en egen fil. 
Pythonlabbet har inte stöd för att ladda in externa filer men det går bra på <a target="_tab" class="text-green-500 hover:underline" href="https://repl.it">repl.it</a>.

<h3 class="font-semibold">Gamla problem</h3>
<p>Advent of Code har varit igång sedan december 2015 och alla gamla problem finns kvar att lösa. 
Som uppvärmning inför årets upplaga har jag börjat lösa problem från just 2015 och igår löste jag dag 20. Fem kvar!
<p><a target="_tab" class="text-green-500 hover:underline" href="https://adventofcode.com/2020/day/1">Dag 1 2020</a>
- ta gärna en titt på förra årets första problem.

<div class="my-5"><img src="/img/blog/advent-of-code-emil-2015.png"></div>


<h3 class="font-bold">Statistik 2020</h3>
<p>Bilden nedan visar statistik för Advent of Code 2020. 
En guldstjärna representerar ett par tusen användare som klarat båda delar och en silverstjärna representerar de som klarat första delen. 
Det är alltså över 170 000 användare som klarat minst första delproblemet. I skrivande stund har nästan 13 000 användare klarat alla problem. 

<div class="my-5"><img src="/img/blog/advent-of-code-2020-statistik.png"></div>


@endsection