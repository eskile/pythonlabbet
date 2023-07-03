@extends('template-page')
@section('title', 'Överblick grundkurs del 1')
@section('description', '')
@section('content')

<h1>Överblick - Grundkurs del 1 för {{$class}}</h1>
<p>Avklarade sektioner är markerade gröna i tabellen. 
Klicka på elevens namn för att se en lista över alla avklarade uppgifter, med möjlighet att kommentera uppgiften.</p>


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

@endsection