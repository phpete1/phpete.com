@php
    $links = [
        ['label' => 'home', 'href' => route('home'), 'active' => request()->routeIs('home'), 'shortcut' => 'H'],
        ['label' => 'projects', 'href' => route('projects'), 'active' => request()->routeIs('projects'), 'shortcut' => 'P'],
    ];
@endphp

<header class="flex items-center gap-x-2 gap-y-1 border-b border-line pt-7 pb-[18px] font-mono text-[13px] max-sm:gap-x-1 sm:flex-wrap">
    <nav class="flex items-center gap-x-2 gap-y-1 max-sm:gap-x-1 sm:flex-wrap" aria-label="Main" preload="mouseover">
        <a href="{{ route('home') }}" class="mr-4 whitespace-nowrap hover:text-strong max-sm:mr-3">~/phpete</a>
        @foreach ($links as $link)
            <a
                href="{{ $link['href'] }}"
                aria-keyshortcuts="{{ $link['shortcut'] }}"
                @if ($link['active']) aria-current="page" @endif
                class="menu-item inline-flex min-h-9 items-center text-muted hover:text-strong aria-[current=page]:text-accent"
            ><span class="menu-bracket menu-bracket-open" aria-hidden="true">[</span>{{ $link['label'] }}<span class="menu-bracket menu-bracket-close" aria-hidden="true">]</span></a>
        @endforeach
    </nav>

    <div class="-mr-[9px] ml-auto flex items-center max-sm:-mr-[7px]">
        {{-- Phones have no keyboard, so the shortcuts key is desktop only. --}}
        <button type="button" commandfor="shortcuts" command="show-modal" aria-haspopup="dialog" aria-label="Keyboard shortcuts" title="Keyboard shortcuts (?)" class="group inline-flex size-9 cursor-pointer items-center justify-center max-sm:hidden">
            <x-svg name="keyboard" />
        </button>
        <x-theme-toggle />
    </div>
</header>
