@extends('template-page')
@section('title', 'För lärare | Pythonlabbet.se')
@section('description', 'Med ett lärarkonto kan du snabbt skapa konto till alla elever i klassen och se hur det går för dem medan de arbetar.')
@section('content')

<h1>Lärare</h1>
@if($is_teacher)
<p class="text-sm">Du är verifierad som lärare.</p>

<h2>Mina klasser</h2>
@if(empty($classes))
<p><em>Här kan du se dina klasser när du skapat dem.</em></p>
@else
    <div class="flex flex-wrap">
        @foreach($classes as $class)
        <div class="h-64 w-64 p-2 m-2 border shadow-md">
            <div class="h-8 w-max text-center text-xl pl-3">{{ $class }}</div>
            <div class="h-18 w-max">
                <ul>
                    <li><a class="text-green-500 hover:underline" href="/larare/klasser/{{ $class }}">Överblick</a></li>
                    <li class="ml-5"><a class="text-green-500 hover:underline" href="/larare/klasser/{{ $class }}/grundkurs-del-1">Grundkurs del 1</a></li>
                    <li class="ml-5"><a class="text-green-500 hover:underline" href="/larare/klasser/{{ $class }}/grundkurs-del-2">Grundkurs del 2</a></li>
                    <li class="ml-5"><a class="text-green-500 hover:underline" href="/larare/klasser/{{ $class }}/turtle">Turtle-kursen</a></li>
                    <li class="ml-5"><a class="text-green-500 hover:underline" href="/larare/klasser/{{ $class }}/problem">Problem</a></li>
                    <li><a class="text-green-500 hover:underline" href="/larare/klasser/fri-kod/{{ $class }}">Sparade projekt (/koda)</a></li>
                    <li><a class="text-green-500 hover:underline" href="/larare/installningar/{{ $class }}">Inställningar</a></li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
@endif

<h2 class="mb-0">Mina inställningar</h2>
@livewire('teacher-settings')


<h2 class="mb-0">Lärarfunktioner</h2>

<div class="text-xl">
    <a class="text-green-500 hover:underline" href="/larare/skapa-elevkonto"><img class="w-28 h-32 inline" src="/img/create-accounts.svg">Skapa elevkonto</a>
</div>
<div class="text-xl">
    <a class="text-green-500 hover:underline" href="/larare/lagg-till-elev-till-klass"><img class="w-28 h-12 inline" src="/img/add-student.svg">Lägg till befintliga användare till en klass</a>
</div>
<div class="text-xl">
    <a class="text-green-500 hover:underline" href="/larare/behover-hjalp"><img class="w-28 h-32 inline" src="/img/student-help.svg">Se uppgifter elever behöver hjälp med</a>
</div>
<div class="text-xl mb-5">
    <a class="text-green-500 hover:underline" href="/larare/andra-losenord"><img class="w-28 h-16 inline" src="/img/change-password.svg">Ändra lösenord för elever</a>
</div>
<div class="text-xl">
    <a class="text-green-500 hover:underline" href="/larare/ta-bort-konto"><img class="w-28 h-12 inline" src="/img/remove-accounts.svg">Ta bort klasser</a>
</div>
    
@else
<p class="text-sm">Du är <b>inte</b> verifierad som lärare.</p>
<h2>Skapa lärarkonto</h2>
<p>Skapa ett vanligt konto och ta kontakt på <em>info@pythonlabbet.se</em> för att slutföra ett lärarkonto.
Pythonlabbet är reklamfritt och är <b>gratis</b> tack vare sponsring från <a class="text-green-500 hover:underline" href="https://hyrbil24.se">hyrbil24.se</a>.</p>
<p>Planen är att göra Pythonlabbet <b>open source</b> under sommaren 2023 så att alla intresserade lärare kan hjälpa till att utveckla sajten.</p>

<h2>Om lärardelen</h2>

<p>
Som verifierad lärare finns ett antal funktioner för att förenkla arbetet med en klass.
<ul>
    <li>En översikt över vilka avsnitt eleverna i klassen är färdiga med</li>
    <li>Granska och kommentera enskilda elevers lösningar</li>
    <li>En sida där du kan se vilka elever som behöver hjälp</li>
    <li>Skapa elevkonto för en hel klass</li>
    <li>Ändra lösenord för dina elever</li>
</ul>

<h3 class="text-lg"><b>Översiktsmatris över klara avsnitt</b></h3>
<p>För varje klass finns en matris som visar vilka elever som är klara med vilka avsnitt. I bilden nedan visas ett litet exempel.</p>
<div class="mb-5"><img class="mx-auto" src="/img/teacher-matrix.png"></div>

<h3 class="text-lg"><b>Skapa elevkonto för en hel klass</b></h3>
<p>För att förenkla processen att skapa konto finns en funktion för att skapa många konton på en gång. 
Det finns <b>inget krav på att använda riktiga eller hela namn</b> eller riktiga e-postadresser vid kontoskapandet. 
Det går utmärkt att låta systemet skapa e-postadresser på formen <em>namn@skola.pythonlabbet.se</em>.
Läraren kan också få alla lösenord (enkla) automatiskt skapade. 
Om lösenordet försvinner vid något tillfälle finns också möjlighet för läraren att enkelt ändra en elevs lösenord.
</p>
@endif

@endsection
