@extends('template-course')
@section('title', 'Problemlösning i Python | pythonlabbet.se')
@section('description', 'Här hittar du olika små projekt att göra i Python.')
@section('content')

<h1>Problemlösning</h1>
<p>Här kan du träna dina färdigheter i Python genom att koda projekt med olika svårighetsgrader.</p>

<table class="table-auto mb-1 w-full">
    <tr class="border bg-gray-200">
        <th class="w-2/5 text-left p-1">Namn</th>
        <th class="w-1/5 text-left p-1">Svårighetsgrad<sup class="font-normal text-xs">1</<sup></th>
        <th class="w-1/5 text-left p-1">Nivå<sup class="font-normal text-xs">2</<sup></th>
        <th class="w-1/5 text-left p-1">Förkunskaper</th>
    </tr>

    @foreach ($problems as $problem)
        @if(in_array($problem->id, $solved_problems))
        <tr class="bg-green-100">
        @else
        <tr>
        @endif
            <td class="w-2/5 border p-1">
                <a class="text-green-500 hover:underline" href="{{ route( $problem->id ) }}">{{ $problem->name }}</a>
            </td>
            <td class="w-1/5 border p-1">
                @switch($problem->difficulty)
                    @case(1)
                        <div class="w-10 h-2 bg-green-500"></div>
                    @break
                    @case(2)
                    <div class="w-10 h-2 bg-blue-500"></div>
                    @break
                    @case(3)
                    <div class="w-10 h-2 bg-red-500"></div>
                    @break
                    @case(4)
                    <div class="w-10 h-2 bg-black"></div>
                    @break
                @endswitch
            </td>
            <td class="w-1/5 border p-1">
                @switch($problem->age_group)
                    @case(1)
                        10 - 12
                    @break
                    @case(2)
                        13 - 15
                    @break
                    @case(3)
                        16 - 18
                    @break
                    @default
                    @break
                @endswitch
            </td>
            <td class="w-1/5 border p-1">
                @switch($problem->prerequisite)
                    @case(1)
                        Grundkurs del 1
                    @break
                    @case(2)
                        Grundkurs del 2
                    @break
                    @default
                    @break
                @endswitch
            </td>
        </tr>
    @endforeach
</table>

<p class="text-xs mb-0"><sup>1</sup>Som i skidbacken är gröna enklast, sedan blå, röd och sist svart som är svårast.</p>
<p class="text-xs"><sup>2</sup>Nivå indikerar en ålder där de matematiska begrepp som behövs i uppgiften har lärts ut. Det går utmärkt att lösa problemen för äldre elever.</p>

{{ $problems->links() }}

@endsection