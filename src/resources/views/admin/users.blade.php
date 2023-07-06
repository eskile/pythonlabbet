@extends('template-page')
@section('title', 'Användare | Pythonlabbet.se')
@section('content')

<style>
    td { padding: 0 10px 0; }
    .mx-auto { margin-left: 0; }
    .max-w-screen-xl {
        max-width: 1800px;
    }
</style>

<table class="mb-5" style="width:100%">
    <tr>
        <th>Skapad</th>
        <th>E-post</th>
        <th>Namn</th>
        <th>Last login</th>
        <th>Google</th>
    </tr>
    @foreach ($users as $user)
        <tr class="{{ $user->is_teacher ? 'bg-green-500' : '' }}">
            <td>{{ $user->created_at }}</td>
            <td><a href="/admin/make-teacher/{{ $user->id }}">{{ $user->email }}</a></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->last_login }}</td>
            <td>@if($user->social_id) Ja @endif</td>
        </tr>
    @endforeach
</table>
 
{{ $users->links() }}

@endsection
