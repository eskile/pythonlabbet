@extends('template-example')
@section('title', 'Kommentera elevkod')
@section('description', '')
@section('content')

    
    @livewire('teacher-view', [
        'user' => $user,
        'editorId' => $code_id,
        'code' => $code,
        'showReset' => false,
        'correctAnswer' => array("N/A"),
        'correctInput' => '',
        'correctOutput' => '',
        'title' => $problem_name,
        'studentName' => $name
    ])
    
@endsection