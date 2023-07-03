<!DOCTYPE html>
<html class="h-full bg-gray-200" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Koda fritt i Python 3</title>
        <meta name="description" content="Skriv kod i Python 3 och kör den direkt på webbsajten. Ingen installation krävs.">
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
    </head>

    <body class="h-full antialiased max-w-screen-xl mx-auto bg-white border-b min-h-screen">
        @include('nav')

        @include('small-screen-warning')
        @include('reference', ['basics1' => true, 'turtle' => true, 'basics2' => true])
        <div class="lg:flex lg:flex-col">
            @livewire('teacher-free-code',[
                'editorId' => 'free-code',
                'code' => $code,
                'name' => $name,
                'projectName' => $projectName,
                ])

        </div>



        @include('footer')

        @include('all-scripts')
        

    </body>
</html>