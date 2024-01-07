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

<form action="/admin/users" method="get">
    <input type="text" name="phrase" class="border" placeholder="Namn eller e-post...">
    <button type="submit" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Sök</button>
</form>

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
