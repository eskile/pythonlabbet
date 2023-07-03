@extends('template-page')
@section('title', 'Ändra inställningar')
@section('description', '')
@section('content')

<h2>Inställningar för {{ $class }}</h2>
<p>Här kan du ställa in om klassen ska se videos och lösningar och om "Enkelt läge" ska vara aktivt.</p>

@livewire('change-user-settings', ['class_id' => $class_id])

@endsection
