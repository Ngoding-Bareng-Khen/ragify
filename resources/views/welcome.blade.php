<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Ragify') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/255fd51aa4.js" crossorigin="anonymous"></script>
</head>

<body class="flex min-h-screen items-center justify-center bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-white/90">
    <a href="{{ route('app.dashboard') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-brand-600">
        <i class="fa-solid fa-table-cells-large"></i>
        Open Dashboard
    </a>
</body>

</html>
