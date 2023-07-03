<!DOCTYPE html>
<html class="bg-gray-200 h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    <body class="antialiased bg-white border-b min-h-screen">
        <div class="flex flex-col min-h-screen">
            @include('nav')
            @include('small-screen-warning')
            <div class="px-2 sm:px-8 lg:px-48 my-5 max-w-screen-xl mx-auto" style="flex: 1;">
                @yield('content')
            </div>
            
        
        @include('footer')
        </div>
    </body>
</html>
