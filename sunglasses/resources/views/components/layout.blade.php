<!doctype html>
<html {{ $attributes->merge(['lang' => str_replace('_', '-', app()->getLocale())]) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'My Site' }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen flex flex-col items-center font-sans text-gray-700 bg-gray-100">
    <x-header />

    <main class="max-w-[1440px] w-full flex flex-col items-center">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>
