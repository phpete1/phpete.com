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

        <link rel="icon" href="/favicon.ico" sizes="48x48">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        {{-- Hide [data-type] text before first paint so it can type in; skipped for reduced motion. Safety net un-hides it if the script never runs. --}}
        <script>
            if (!matchMedia('(prefers-reduced-motion: reduce)').matches) {
                document.documentElement.classList.add('will-type');
                setTimeout(() => document.documentElement.classList.remove('will-type'), 3000);
            }
        </script>

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
