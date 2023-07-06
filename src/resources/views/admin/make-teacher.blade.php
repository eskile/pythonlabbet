@extends('template-page')
@section('title', 'Användare | Pythonlabbet.se')
@section('content')

<style>
    .mx-auto { margin-left: 0; }
</style>

@livewire('make-teacher', [
    'userName' => $user->name,
    'userEmail' => $user->email,
    'userIsTeacher' => $user->is_teacher
])

@endsection
