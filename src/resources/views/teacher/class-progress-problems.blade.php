@extends('template-page')
@section('title', 'Status på klass')
@section('description', '')
@section('content')

<h1>Överblick av lösta problem för {{$class}}</h1>


@if(count($problem_array) == 0)
<p>Ingen elev i klassen har provat något problem.</p>
@else

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
<p>Avklarade sektioner är markerade gröna i tabellen. 
Klicka på elevens namn för att se en lista över alla avklarade uppgifter, med möjlighet att kommentera uppgiften.</p>
<p><span class="bg-green-500">Grönt</span> betyder att problemet är löst och <span class="bg-yellow-100">gult</span> betyder att eleven har försökt. Siffran i rutan visar antal klick på "Rätta"-knappen.
Klicka i rutan för att se koden.</p>

@endif

@endsection