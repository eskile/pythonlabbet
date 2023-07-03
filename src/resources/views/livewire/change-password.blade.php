<div>   
    @foreach($students as $student)
    @if(empty($student))
        @continue
    @endif
    <p><b>Namn:</b>: {{ $student->name}}
    <br>E-post: {{$student->email}}
    <br>
    @if($id_change == $student->id && empty($message))
        <input wire:model="pwd" type="text" class="border focus:outline-none"><a class="pl-3 text-green-500 hover:underline" wire:click="changePwd({{$id_change}})" href="javascript:void(0);">Ändra</a>
        
    @elseif($id_change == $student->id && !empty($message))
        <div>{{ $message }}</div>
    @else
        <a class="text-green-500 hover:underline" wire:click="updateId({{$student->id}})" href="javascript:void(0);">Nytt lösenord</a>
    @endif
    </p>
    @endforeach
</div>
