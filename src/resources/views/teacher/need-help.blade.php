@extends('template-page')
@section('title', 'Hjälp - en översikt över elever som behöver återkoppling | Pythonlabbet.se')
@section('description', '')
@section('content')

<h2>Lista på elever som behöver hjälp</h2>
<p>I listan nedan kan du klicka på uppgifter elever behöver hjälp med för att <b>se, köra och kommentera koden</b>.</p>
    <p>Detta gäller uppgifter där eleven har klickat på "Be om hjälp". 
    Om du kommenterar en uppgift försvinner de från listan nedan. 
    Du kan också klicka på släng-ikonen för att snabbt ta bort ur listan.</p>

<script>
if(window.performance.getEntriesByType("navigation")[0].type === "back_forward") {
    location.reload(true);
}
</script>

@livewire('student-need-help')

@endsection
