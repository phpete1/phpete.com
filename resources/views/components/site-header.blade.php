@php
    $links = [
        ['label' => 'home', 'href' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'projects', 'href' => url('/projects'), 'active' => request()->is('projects')],
    ];
@endphp

<header class="flex items-center gap-x-2 gap-y-1 border-b border-line pt-7 pb-[18px] font-mono text-[13px] max-sm:gap-x-1 sm:flex-wrap">
    <nav class="flex items-center gap-x-2 gap-y-1 max-sm:gap-x-1 sm:flex-wrap" aria-label="Main">
        <a href="{{ route('home') }}" class="mr-4 whitespace-nowrap hover:text-white max-sm:mr-2">~/phpete</a>
        @foreach ($links as $link)
            <a
                href="{{ $link['href'] }}"
                @if ($link['active']) aria-current="page" @endif
                class="menu-item inline-flex min-h-9 items-center px-1.5 text-muted hover:text-white aria-[current=page]:text-accent max-sm:px-1"
            >{{ $link['label'] }}</a>
        @endforeach
    </nav>

    <nav class="-mr-[9px] ml-auto flex items-center max-sm:-mr-[7px]" aria-label="Elsewhere">
        <a href="#" aria-label="GitLab" title="GitLab" class="inline-flex size-9 items-center justify-center text-muted transition-colors hover:text-text max-sm:w-8">
            <svg class="block h-[18px] w-auto" viewBox="0 0 9 11" shape-rendering="crispEdges" aria-hidden="true" focusable="false"><path fill="currentColor" d="M0 0h1v1h-1zM0 1h1v1h-1zM0 2h1v1h-1zM0 8h1v1h-1zM0 9h1v1h-1zM0 10h1v1h-1zM1 0h1v1h-1zM1 2h1v1h-1zM1 3h1v1h-1zM1 4h1v1h-1zM1 5h1v1h-1zM1 6h1v1h-1zM1 7h1v1h-1zM1 8h1v1h-1zM1 10h1v1h-1zM2 0h1v1h-1zM2 1h1v1h-1zM2 2h1v1h-1zM2 7h1v1h-1zM2 8h1v1h-1zM2 9h1v1h-1zM2 10h1v1h-1zM3 6h1v1h-1zM4 6h1v1h-1zM5 5h1v1h-1zM6 0h1v1h-1zM6 1h1v1h-1zM6 2h1v1h-1zM6 5h1v1h-1zM7 0h1v1h-1zM7 2h1v1h-1zM7 3h1v1h-1zM7 4h1v1h-1zM8 0h1v1h-1zM8 1h1v1h-1zM8 2h1v1h-1z"/></svg>
        </a>
        <a href="https://github.com/phpete1" aria-label="GitHub" title="GitHub" class="inline-flex size-9 items-center justify-center text-muted transition-colors hover:text-text max-sm:w-8">
            <svg class="block h-[18px] w-auto" viewBox="0 0 11 9" shape-rendering="crispEdges" aria-hidden="true" focusable="false"><path fill="currentColor" d="M0 4h1v1h-1zM1 3h1v1h-1zM1 5h1v1h-1zM2 2h1v1h-1zM2 6h1v1h-1zM3 1h1v1h-1zM3 7h1v1h-1zM4 6h1v1h-1zM4 7h1v1h-1zM5 3h1v1h-1zM5 4h1v1h-1zM5 5h1v1h-1zM6 1h1v1h-1zM6 2h1v1h-1zM7 1h1v1h-1zM7 7h1v1h-1zM8 2h1v1h-1zM8 6h1v1h-1zM9 3h1v1h-1zM9 5h1v1h-1zM10 4h1v1h-1z"/></svg>
        </a>
        <a href="#" aria-label="/dev/null" title="/dev/null" class="inline-flex size-9 items-center justify-center text-muted transition-colors hover:text-text max-sm:w-8">
            <svg class="block h-[18px] w-auto" viewBox="0 0 9 9" shape-rendering="crispEdges" aria-hidden="true" focusable="false"><path fill="currentColor" d="M0 2h1v1h-1zM0 3h1v1h-1zM0 4h1v1h-1zM0 5h1v1h-1zM0 6h1v1h-1zM0 8h1v1h-1zM1 1h1v1h-1zM1 7h1v1h-1zM2 0h1v1h-1zM2 6h1v1h-1zM2 8h1v1h-1zM3 0h1v1h-1zM3 5h1v1h-1zM3 8h1v1h-1zM4 0h1v1h-1zM4 4h1v1h-1zM4 8h1v1h-1zM5 0h1v1h-1zM5 3h1v1h-1zM5 8h1v1h-1zM6 0h1v1h-1zM6 2h1v1h-1zM6 8h1v1h-1zM7 1h1v1h-1zM7 7h1v1h-1zM8 0h1v1h-1zM8 2h1v1h-1zM8 3h1v1h-1zM8 4h1v1h-1zM8 5h1v1h-1zM8 6h1v1h-1z"/></svg>
        </a>
    </nav>
</header>
