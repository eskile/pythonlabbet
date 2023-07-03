@extends('template-page')
@section('title', 'Elevöversikt')
@section('description', '')
@section('content')

<h2>Elevöversikt för {{ $name}}
<p>Nedan visas en lista över alla uppgifter och problem som eleven har sparad kod för. 
Klicka på en uppgift för att se koden och för att kunna kommentera den.</p>

@if(count($saves) == 0 && count($problem_saves) == 0)
<p><b>Eleven har ingen sparad kod.</b></p>
@else
    <div class="flex">
    @if(count($saves) != 0)
        <div class="w-1/2">
            <h3>Uppgifter</h3>
        @foreach($saves as $save)
            <p><a class="text-green-500 hover:underline" href="/larare/uppgifter/{{$save->id}}/{{$save->code_id}}">{{ $save->section }}</a><br>
        @endforeach
        </div>
    @endif
    @if(count($problem_saves) != 0)
        <div class="w-1/2">
            <h3>Problem</h3>
        @foreach($problem_saves as $save)
            <p><a class="text-green-500 hover:underline" href="/larare/uppgifter/{{$save->id}}/{{$save->code_id}}">{{ $save->section }}</a><br>
        @endforeach
        </div>
    @endif
    </div>
@endif


@endsection
