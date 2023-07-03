@extends('template-page')
@section('title', 'Översikt fri kod')
@section('description', '')
@section('content')

<h1>Sparade projekt i klassen {{ $class }}</h1>
<p>Här finns alla projekt som är sparade av elever när de arbetat med fri kod i 
    <a class="text-green-500 hover:underline" href="/koda">editorn</a>.
</p>
<p>Klicka på ett projekt för att se koden.</p>

@foreach($records as $record)
<p>{{ $record->user_name }}: <a class="text-green-500 hover:underline" href="/larare/fri-kod/{{ $record->user_id }}/{{ $record->id }}">
    @if($record->name != null)
        {{ $record->name }}
    @else
        Ej namngivet
    @endif
</a>
@endforeach

@endsection