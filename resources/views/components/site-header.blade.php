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
            <svg class="block h-[21px] w-auto" viewBox="0 0 14 14" shape-rendering="crispEdges" aria-hidden="true" focusable="false"><path fill="currentColor" d="M1 0h1v1h-1zM12 0h1v1h-1zM1 1h2v1h-2zM11 1h2v1h-2zM1 2h3v1h-3zM10 2h3v1h-3zM1 3h4v1h-4zM9 3h4v1h-4zM0 4h14v1h-14zM0 5h14v1h-14zM0 6h14v1h-14zM0 7h14v1h-14zM1 8h12v1h-12zM2 9h10v1h-10zM3 10h8v1h-8zM4 11h6v1h-6zM5 12h4v1h-4zM6 13h2v1h-2z"/></svg>
        </a>
        <a href="https://github.com/phpete1" aria-label="GitHub" title="GitHub" class="inline-flex size-9 items-center justify-center text-muted transition-colors hover:text-text max-sm:w-8">
            <svg class="block h-[21px] w-auto" viewBox="0 0 12 14" shape-rendering="crispEdges" aria-hidden="true" focusable="false"><path fill="currentColor" d="M1 0h2v1h-2zM9 0h2v1h-2zM1 1h3v1h-3zM8 1h3v1h-3zM1 2h10v1h-10zM0 3h12v1h-12zM0 4h12v1h-12zM0 5h12v1h-12zM0 6h12v1h-12zM1 7h10v1h-10zM2 8h8v1h-8zM0 9h1v1h-1zM4 9h4v1h-4zM1 10h1v1h-1zM4 10h4v1h-4zM2 11h6v1h-6zM4 12h4v1h-4zM4 13h4v1h-4z"/></svg>
        </a>
        <a href="#" aria-label="/dev/null" title="/dev/null" class="inline-flex size-9 items-center justify-center text-muted transition-colors hover:text-text max-sm:w-8">
            <svg class="block h-[21px] w-auto" viewBox="0 0 14 14" shape-rendering="crispEdges" aria-hidden="true" focusable="false"><path fill="currentColor" d="M6 0h3v1h-3zM10 0h4v1h-4zM6 1h3v1h-3zM10 1h1v1h-1zM13 1h1v1h-1zM5 2h3v1h-3zM9 2h1v1h-1zM12 2h1v1h-1zM5 3h3v1h-3zM9 3h1v1h-1zM12 3h1v1h-1zM4 4h3v1h-3zM8 4h1v1h-1zM11 4h1v1h-1zM4 5h3v1h-3zM8 5h1v1h-1zM11 5h1v1h-1zM3 6h3v1h-3zM7 6h1v1h-1zM10 6h1v1h-1zM3 7h3v1h-3zM7 7h1v1h-1zM10 7h1v1h-1zM2 8h3v1h-3zM6 8h1v1h-1zM9 8h1v1h-1zM2 9h3v1h-3zM6 9h1v1h-1zM9 9h1v1h-1zM1 10h3v1h-3zM5 10h1v1h-1zM8 10h1v1h-1zM1 11h3v1h-3zM5 11h1v1h-1zM8 11h1v1h-1zM0 12h3v1h-3zM4 12h1v1h-1zM7 12h1v1h-1zM0 13h3v1h-3zM4 13h4v1h-4z"/></svg>
        </a>
    </nav>
</header>
