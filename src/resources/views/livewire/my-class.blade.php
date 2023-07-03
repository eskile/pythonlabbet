<div class="min-w-full mx-0">
<h1>Min klass</h1>
    @if($has_class)
    <p>Du är en elev i klass: <b>{{ $class_name }}</b></p>
    @else
    <p>Du är inte elev i någon klass än.</p>
    @endif
    @if($has_invitation)
    <h2>Inbjudan</h2>
    <p>Du har en inbjudan att vara med i klass <b>{{$invitation_class}}</b></p>
    <button wire:click="accept()" type="button" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring">Acceptera inbjudan</button>
    @endif
    @if($has_error)
    <p class="mt-3"><b>FEL: </b>{{ $error_msg}}</p>
    @endif

</div>
