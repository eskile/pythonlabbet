@extends('template-page')
@section('title', 'Min klass | Pythonlabbet.se')
@section('description', 'Se vilken klass du tillhör eller acceptera inbjudan till en klass.')
@section('content')

@livewire('my-class', ['user_id' => $user_id])

@endsection
