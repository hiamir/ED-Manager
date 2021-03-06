<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('dark') === 'true'} "
      x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="{ 'dark': darkMode }"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OMJ Manager') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
        @bukStyles(true)
    </head>
    <body>
        <div
{{--            x-data="{darkMode:false}"--}}
            class="font-sans text-gray-900 bg-gray-600 dark:bg-gray-800 antialiased flex justify-center items-center h-screen" >
{{--            <x-button x-on:click="darkMode=!darkMode">Darkmode</x-button>--}}
            {{ $slot }}
        </div>
        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.4/dist/datepicker.js"></script>
        @livewireScripts
        @bukScripts(true)
    </body>
</html>
