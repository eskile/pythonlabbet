<div>
    <h2>Mina projekt</h2>
    <p>Gå till <a class="text-green-500 hover:underline" href="/koda">editorn</a> för att arbeta med dina projekt.
Nedan ser du en lista över dina sparade projekt. Klicka på "ta bort" för att ta bort ett sparat projekt.</p>
    @if(count($saves) == 0)
        <p><em>Du har inga sparade projekt.</em></p>
    @else
        @foreach($saves as $id => $save)
            @if($save != '')
                <p>Projekt: <b>{{ $save }}</b> (<a onclick="deleteProject({{ $id }}, '{{ $save }}')"; class="text-green-500 hover:underline" href="javascript:void(0);">ta bort</a>)</p>
            @else
                <p>Projekt: <b>[Ej namngett]</b> (<a onclick="deleteProject({{ $id }}, '{{ $save }}')"; class="text-green-500 hover:underline" href="javascript:void(0);">ta bort</a>)</p>
            @endif
        @endforeach
    @endif
</div>

<script>
    function deleteProject(id, name) {
        if( confirm('Bekräfta att du vill ta bort projektet ' + name + '.') ) {
            console.log('emitting delete-project event');
            Livewire.emit('delete-project', id);
        }

    }
</script>