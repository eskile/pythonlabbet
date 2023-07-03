@extends('template-page')
@section('title', 'Ändra lösenord')
@section('description', '')
@section('content')

<h1>Ändra lösenord för elever</h1>
<p>Här kan du ändra lösenord för alla dina elever. Skriv in det nya lösenordet i textfältet och klicka på "Ändra". Endast ett lösenord kan ändras i taget.</p>

@livewire('change-password')

@endsection