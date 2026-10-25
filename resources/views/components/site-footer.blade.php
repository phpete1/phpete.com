{{-- Rendered on every page (error pages included), so the verse is picked here rather than in a controller. --}}
@php
    $verse = \App\RedLetter\RedLetter::today();
@endphp

<footer class="mt-auto flex items-start justify-between gap-x-6 gap-y-3 border-t border-line pt-[22px] pb-7 max-sm:flex-col">
    <a href="{{ route('who-is-jesus') }}" preload="mouseover" aria-keyshortcuts="V J" class="group block">
        <figure class="flex flex-wrap items-baseline gap-x-5 gap-y-1.5">
            <blockquote class="font-serif text-[19px] leading-normal text-accent italic">
                <p>{{ $verse->text(quote: '“') }}</p>
            </blockquote>
            <figcaption class="font-mono text-xs text-muted transition-colors group-hover:text-text">{{ $verse->reference(short: false) }} ESV · who is Jesus →</figcaption>
        </figure>
    </a>

    <x-socials class="-my-[7px] shrink-0 max-sm:-ml-[9px] sm:-mr-[9px]" />
</footer>
