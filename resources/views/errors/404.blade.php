<x-layouts.app title="Not found" description="This page doesn't exist.">
    <x-section label="404" typed>
        <h1 class="text-[32px] font-semibold tracking-tight">Page not found.</h1>

        <p class="text-lg leading-[1.7] text-text-soft">
            There's nothing at this address. It may have moved, or never existed.
        </p>

        <p class="text-lg leading-[1.7] text-text-soft">
            <a href="{{ route('home') }}" class="text-text underline decoration-line decoration-1 underline-offset-4 transition-colors hover:text-accent hover:decoration-accent">Head back home</a>.
        </p>
    </x-section>
</x-layouts.app>
