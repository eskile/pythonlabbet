@extends('template-page')
@section('title', 'Skapa elevkonto| Pythonlabbet.se')
@section('description', 'Med ett lärarkonto kan du snabbt skapa konto till alla elever i klassen.')
@section('content')

<h1>Skapa elevkonto</h1>
<p>Lägg in alla elever i rutan nedanför. <b>En elev per rad</b>. 
Observera att det inte finns något krav på att namnet är på formen <em>Förnamn Efternamn</em>. 
Namnet kan väljas helt fritt, exempelvis "Elev 1", Elev 2" och så vidare. Något som är enklare att komma ihåg kan dock vara att föredra.</p>
<p>Det finns tre olika sätt att skriva varje rad.<p>
<ol class="mb-5">
    <li class="mb-1"><span style="margin-right: 20px;" class="border"><em>Förnamn Efternamn</em></span> I detta fall automatgenereras epost (@pythonlabbet.se) och lösenord.</li>
    <li class="mb-1"><span style="margin-right: 20px;" class="border"><em>Förnamn Efternamn, epost@exempel.se</em></span> Endast lösenord automatgenereras.</li>
    <li class="mb-1"><span style="margin-right: 20px;" class="border"><em>Förnamn Efternamn, epost@exempel.se, lösenord</em></span></li>
</ol>
<p>Fyll i <b>skola</b> endast ifall e-postadresser ska genereras. Epost-domänen blir @[skola].pythonlabbet.se.</p>
<p>Om du vill att eleverna ska enkelt kunna logga in med <b>Google</b> så måste e-post fyllas i och e-posten måste vara ett Google-konto.</p>
<p>Det går att skapa konto till nya elever för en befintlig klass genom att välja klass i rullistan (syns inte om du inte har några klasser).</p>
@livewire('create-accounts')

@endsection
