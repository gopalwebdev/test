<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    @livewireStyles
    {{-- @wireUiScripts
    <script src="//unpkg.com/alpinejs" defer></script> --}}
    @vite('resources/css/app.css')
</head>
<body class="antialiased">
    
    <div>
        {{ $slot }}
    </div>


    <x-notifications z-index="z-50" />
    <x-notifications position="top-center" />
  
    @livewireScripts
</body>
</html>