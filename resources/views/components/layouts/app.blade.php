<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
        <title>{{ $title ?? 'CRUD' }}</title>
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
        @vite('resources/css/app.css')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles
    </head>
    <body>
        <!-- <h1 class="text-center p-3 mb-2 bg-success text-white">CRUD Operation</h1> -->
        {{ $slot }}

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"> -->
            
        </script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
<style>

</style>