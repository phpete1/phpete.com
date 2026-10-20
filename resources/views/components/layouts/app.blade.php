@props([
    'title' => null,
    'description' => 'Pete. Glasgow-born developer, living in Ayrshire.',
])

<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ? "{$title} · phpete.com" : 'phpete.com' }}</title>
        <meta name="description" content="{{ $description }}">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="mx-auto flex min-h-svh w-full max-w-[1080px] flex-col px-4">
            <x-site-header />

            <main class="flex flex-auto flex-col justify-center py-18 max-sm:py-12">
                {{ $slot }}
            </main>

            <x-site-footer />
        </div>
    </body>
</html>
