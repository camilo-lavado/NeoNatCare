@props([
    'page' => null,
    'title' => 'CuidarIA',
    'withNav' => false,
    'wide' => false,
    'raw' => false,
])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    @fonts

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body data-page="{{ $page }}" class="font-sans text-ink antialiased">
    <div class="app mx-auto min-h-screen bg-celeste-bg flex flex-col relative {{ $wide ? 'max-w-[720px]' : 'max-w-[480px]' }}">
        {{ $topbar ?? '' }}

        @if ($raw)
            {{ $slot }}
        @else
            <div class="flex-1 px-6 pt-5 pb-6 flex flex-col gap-[18px] {{ $withNav ? 'pb-[100px]' : '' }}">
                {{ $slot }}
            </div>
        @endif

        @if ($withNav)
            <x-bottom-nav :active="$page" />
        @endif
    </div>

    @stack('scripts')
</body>
</html>
