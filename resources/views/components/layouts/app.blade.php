@props([
    'title' => null,
    'description' => 'Pete. Glasgow-born developer, living in Ayrshire.',
])

<!DOCTYPE html>
{{-- The season picks the accent colour (resources/css/app.css). --}}
<html lang="en-GB" data-season="{{ App\Season::of(now())->value }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $pageTitle = $title ? "{$title} · phpete.com" : 'phpete.com';
            // Built from APP_URL so links shared from any host point at the real site. Error pages have no route, so get no canonical.
            $canonical = request()->route() ? rtrim(config('app.url'), '/').(request()->is('/') ? '/' : '/'.request()->path()) : null;
        @endphp

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $description }}">

        @if ($canonical)
            <link rel="canonical" href="{{ $canonical }}">
            <meta property="og:url" content="{{ $canonical }}">
        @endif
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="phpete.com">
        <meta property="og:locale" content="en_GB">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $description }}">
        <meta name="twitter:card" content="summary">

        <link rel="icon" href="/favicon.ico" sizes="48x48">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        {{-- Set the theme before first paint: the toggle's saved choice, else the system's (resources/js/theme.js keeps it in sync). --}}
        <script>
            try {
                document.documentElement.dataset.theme = localStorage.getItem('theme')
                    ?? (matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
            } catch {
                document.documentElement.dataset.theme = matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
            }
        </script>

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
    {{-- Internal links swap the page in place instead of reloading it; links marked `preload` fetch on hover (resources/js/app.js). --}}
    <body hx-boost="true" hx-ext="preload">
        <div class="mx-auto flex min-h-svh w-full max-w-[1080px] flex-col px-4">
            <x-site-header />

            <main class="flex flex-auto flex-col justify-center py-18 max-sm:py-12 sm:px-6">
                {{ $slot }}
            </main>

            <x-site-footer />
        </div>

        <x-music-dialog />
        <x-shortcuts-dialog />
    </body>
</html>
