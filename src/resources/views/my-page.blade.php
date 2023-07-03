@extends('template-page')
@section('title', 'Mina sidor | Pythonlabbet.se')
@section('description', '')
@section('content')

<h1>Mina sidor</h1>
@if($nr_completed_tasks == 0)
    <p>Välkommen till mina sidor!</p>
    <p>Du har inte gjort någon uppgift ännu.</p>
@else
    <p>Du har gjort klart <b>{{ $nr_completed_sections }}</b> avsnitt och <b>{{ $nr_completed_tasks }}</b> uppgifter.
@endif

@if($last_task_name)
    <p>Din senast avklarade uppgift är: <b>{{ $last_task_name->name}}</b> (<a class="text-green-500 hover:underline" href="{{ route($last_task_name->section )}}">till avsnittet</a>).
@endif

@if($nr_solved_problems == 0)
    <p>Du har inte löst något problem ännu
@else
    <p>Du har löst <b>{{ $nr_solved_problems }}</b> problem
@endif
(<a class="text-green-500 hover:underline" href="/problemlosning">till problemen</a>).</p>
@livewire('delete-free-code')

@endsection
