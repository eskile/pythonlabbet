@extends('template-page')
@section('title', 'Status på klass')
@section('description', '')
@section('content')

<h1>Status för klass {{$class}}</h1>
<p>Avklarade sektioner är markerade gröna i tabellen. 
Klicka på elevens namn för att se en lista över alla avklarade uppgifter, med möjlighet att kommentera uppgiften.</p>

<!-- <p>Visa endast: <a class="text-green-500 hover:underline" href="grundkurs-del-1">Grundkurs del 1</a> | <a class="text-green-500 hover:underline" href="grundkurs-del-2">Grundkurs del 2</a> | <a class="text-green-500 hover:underline" href="rita-med-turtle">Rita med turtle</a> -->

<?php $section_names = array('basics.introduction', 'basics.print', 'basics.simple-calc', 'basics.variables', 'basics.input', 'basics.logic', 'basics.if', 'basics.while', 'basics.random'); ?>
<h2>Grundkurs del 1</h2>
<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Namn</th>
        @foreach($section_names as $key => $section_name)
        <th class="pr-1"><a class="text-green-500 hover:underline" href="{{ route($section_name) }}" title="{{ substr(route($section_name), strrpos(route($section_name), '/') + 1) }}">{{ $key+1 }}</a> </th>
        @endforeach
    </tr>
    
    
    
    @foreach($matrix as $id => $sections)
        <tr class="border-b">
        <td class="pr-3 py-1"><a href="/larare/elever/{{$id}}" class="text-green-500 hover:underline">{{$names[$id] }}</a></td>
        @foreach($section_names as $section_name)
            @if(in_array($section_name, $sections))
            <td class="border bg-green-500 w-8"></td>
            @else
            <td class="border bg-gray-200 w-8"></td>
            @endif
        @endforeach
        </tr>
    @endforeach
</table>

<?php $section_names = array('basics-2.functions', 'basics-2.lists', 'basics-2.for', 'basics-2.more-print', 'basics-2.more-lists', 'basics-2.tuples', 'basics-2.math', 'basics-2.dictionary', 'basics-2.set'); ?>
<h2>Grundkurs del 2</h2>
<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
    <th class="py-1 pr-8 text-left">Namn</th>
    @foreach($section_names as $key => $section_name)
    <th class="pr-1"><a class="text-green-500 hover:underline" href="{{ route($section_name) }}" title="{{ substr(route($section_name), strrpos(route($section_name), '/') + 1) }}">{{ $key+1 }}</a> </th>
    @endforeach
    </tr>
    
    
    @foreach($matrix as $id => $sections)
        <tr class="border-b">
        <td class="pr-3 py-1"><a href="/larare/elever/{{$id}}" class="text-green-500 hover:underline">{{$names[$id] }}</a></td>
        @foreach($section_names as $section_name)
            @if(in_array($section_name, $sections))
            <td class="border bg-green-500 w-8"></td>
            @else
            <td class="border bg-gray-200 w-8"></td>
            @endif
        @endforeach
        </tr>
    @endforeach
</table>

<?php $section_names = array('turtle.introduction', 'turtle.circles', 'turtle.variables-repetition', 'turtle.functions', 'turtle.random', 'turtle.coordinates', 'turtle.tasks', 'turtle.recursion-fractals'); ?>
<h2>Rita med turtle</h2>
<table class="table-auto mb-4">
    <tr class="border-b-4 py-2">
        <th class="py-1 pr-8 text-left">Namn</th>
        @foreach($section_names as $key => $section_name)
            <th class="pr-1"><a class="text-green-500 hover:underline" href="{{ route($section_name) }}" title="{{ substr(route($section_name), strrpos(route($section_name), '/') + 1) }}">{{ $key+1 }}</a> </th>
        @endforeach
    </tr>
    
    
    @foreach($matrix as $id => $sections)
        <tr class="border-b">
        <td class="pr-3 py-1"><a href="/larare/elever/{{$id}}" class="text-green-500 hover:underline">{{$names[$id] }}</a></td>
        @foreach($section_names as $section_name)
            @if(in_array($section_name, $sections))
            <td class="border bg-green-500 w-8"></td>
            @else
            <td class="border bg-gray-200 w-8"></td>
            @endif
        @endforeach
        </tr>
    @endforeach
</table>

<h2>Problem</h2>
@if(count($problem_array) == 0)
<p>Ingen elev i klassen har provat något problem.</p>
@else
<p><span class="bg-green-500">Grönt</span> betyder att problemet är löst och <span class="bg-yellow-100">gult</span> betyder att eleven har försökt. Siffran i rutan visar antal klick på "Rätta"-knappen.
Klicka i rutan för att se koden.</p>

<div class="overflow-x-auto pt-52">
    <table class="table-auto mb-4">
        <tr class="border-b-4 py-2">
            <th class="py-1 pr-8 text-left">Namn</th>
            @foreach($problem_array as $problem_id => $problem_name)
                <th class="pr-1"><div class="transform -rotate-45 translate-x-4 translate-y-0 w-8 whitespace-nowrap h-10"><a class="text-green-500 hover:underline" href="{{ route($problem_id) }}">{{ $problem_name }}</a></div> </th>
            @endforeach
        </tr>
        
        
        @foreach($problem_matrix as $id => $problems)
            <tr class="border-b">
            <td class="pr-3 py-1"><a href="/larare/elever/{{$id}}" class="text-green-500 hover:underline">{{$names[$id] }}</a></td>
            @foreach($problem_array as $problem_id => $problem_name)
                @if(array_key_exists($problem_id, $problems))
                    @if($problems[$problem_id]['solved'])
                    <td class="border bg-green-500"><a href="/larare/uppgifter/{{$id}}/{{$problem_id}}"><div class="w-8 text-center">{{$problems[$problem_id]['attempts']}}</div></a></td>
                    @else
                    <td class="border bg-yellow-100"><a href="/larare/uppgifter/{{$id}}/{{$problem_id}}"><div class="w-8 text-center">{{$problems[$problem_id]['attempts']}}</div></a></td>
                    <!-- <td class="border bg-yellow-100 w-8 text-center">{{ $problems[$problem_id]['attempts'] }}</td> -->
                    @endif
                @else
                <td class="border bg-gray-200 w-8"></td>
                @endif
            @endforeach
            </tr>
        @endforeach
    </table>
</div>
@endif

@endsection