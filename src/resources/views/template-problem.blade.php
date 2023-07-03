<!DOCTYPE html>
<html class="bg-gray-50" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        @include('css')
        <link rel="stylesheet" type="text/css" href="/css/prism-vs.css">
        <link rel="stylesheet" data-name="vs/editor/editor.main" href="/monaco-editor/package/min/vs/editor/editor.main.css">
        @livewireStyles
        <style>
            .token.builtin { color: #0000ff; }
        </style>
        <script>
            let editors = {};
        </script>
        @include('analytics')
    </head>

    <body class="antialiased  bg-white border-b min-h-screen">
        @include('nav')

        @guest
        <div class="mb-4 p-2 bg-red-700 text-white px-8 lg:px-48">Logga in för att kunna spara vad du har gjort.</div>
        @endguest

        <div class="m-2 text-sm text-gray-500">
            <a class="hover:underline" href="/problemlosning"><< Tillbaka till problemlösning</a>
        </div>

        @include('small-screen-warning')

        <div class="max-w-screen-xl mx-auto">
            <div class="px-8 lg:px-48 mb-96">
                @yield('content')
            </div>
        </div>

        @include('footer')
        
        @include('all-scripts')
    </body>
</html>
