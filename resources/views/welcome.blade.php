<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        @livewireStyles
    </head>
    <body >
        <div class="max-w-screen-lg mx-auto my-20">
            @livewire('tasks')
        </div>
        @livewireScripts
    </body>
</html>
