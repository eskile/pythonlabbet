<div wire:poll.visible.5000ms="refreshNeedHelp">
    @foreach($need_help as $help)
        <!-- null check -->
        @if(!$help)
            @continue
        @endif
        
        @if($help->section != null)
        <p>
            Namn: {{ $help->name }}<br>Uppgift: <a class="text-green-500 hover:underline" href="/larare/uppgifter/{{$help->student_id}}/{{$help->code_id}}">  {{$help->section}}</a>
            <button wire:click="markComplete({{$help->student_id}},'{{$help->code_id}}')" class="w-5 ml-5 focus:outline-none"><img src="/img/trash.svg"></button>
        </p>
        @else
        <p>
            Namn: {{ $help->name }}<br>Problem: <a class="text-green-500 hover:underline" href="/larare/uppgifter/{{$help->student_id}}/{{$help->code_id}}">  {{$help->problem_name}}</a>
            <button wire:click="markComplete({{$help->student_id}},'{{$help->code_id}}')" class="w-5 ml-5 focus:outline-none"><img src="/img/trash.svg"></button>
        </p>
        @endif
        
    @endforeach
</div>
