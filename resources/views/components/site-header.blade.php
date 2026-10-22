@php
    $links = [
        ['label' => 'home', 'href' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'projects', 'href' => route('projects'), 'active' => request()->routeIs('projects')],
    ];
@endphp

<header class="flex items-center gap-x-2 gap-y-1 border-b border-line pt-7 pb-[18px] font-mono text-[13px] max-sm:gap-x-1 sm:flex-wrap">
    <nav class="flex items-center gap-x-2 gap-y-1 max-sm:gap-x-1 sm:flex-wrap" aria-label="Main" preload="mouseover">
        <a href="{{ route('home') }}" class="mr-4 whitespace-nowrap hover:text-white max-sm:mr-1">~/phpete</a>
        @foreach ($links as $link)
            <a
                href="{{ $link['href'] }}"
                @if ($link['active']) aria-current="page" @endif
                class="menu-item inline-flex min-h-9 items-center text-muted hover:text-white aria-[current=page]:text-accent"
            ><span class="menu-bracket menu-bracket-open" aria-hidden="true">[</span>{{ $link['label'] }}<span class="menu-bracket menu-bracket-close" aria-hidden="true">]</span></a>
        @endforeach
    </nav>

    <nav class="-mr-[9px] ml-auto flex items-center max-sm:-mr-[7px]" aria-label="Elsewhere">
        <a href="https://gitlab.com/phpete1" aria-label="GitLab" title="GitLab" class="group inline-flex size-9 items-center justify-center max-sm:w-8">
            <svg class="block h-[18px] w-auto" width="19" height="18" aria-hidden="true" focusable="false" viewBox="1 3 126 122"><path class="fill-muted transition-[fill] group-hover:fill-[#E24329] group-focus-visible:fill-[#E24329]" d="m124.755 51.382-.177-.452L107.47 6.282a4.459 4.459 0 0 0-1.761-2.121 4.581 4.581 0 0 0-5.236.281 4.578 4.578 0 0 0-1.518 2.304L87.404 42.088H40.629L29.077 6.746a4.492 4.492 0 0 0-1.518-2.31 4.581 4.581 0 0 0-5.236-.281 4.502 4.502 0 0 0-1.761 2.121L3.422 50.904l-.17.452c-5.059 13.219-.763 28.192 10.537 36.716l.059.046.157.111 26.061 19.516 12.893 9.758 7.854 5.93a5.283 5.283 0 0 0 6.388 0l7.854-5.93 12.893-9.758 26.218-19.634.065-.052c11.273-8.526 15.562-23.472 10.524-36.677z"/><path class="fill-muted transition-[fill] group-hover:fill-[#FC6D26] group-focus-visible:fill-[#FC6D26]" d="m124.755 51.382-.177-.452a57.79 57.79 0 0 0-23.005 10.341L64 89.682c12.795 9.68 23.934 18.09 23.934 18.09l26.218-19.634.065-.052c11.291-8.527 15.586-23.488 10.538-36.704z"/><path class="fill-muted transition-[fill] group-hover:fill-[#FCA326] group-focus-visible:fill-[#FCA326]" d="m40.066 107.771 12.893 9.758 7.854 5.93a5.283 5.283 0 0 0 6.388 0l7.854-5.93 12.893-9.758s-11.152-8.436-23.947-18.09a18379.202 18379.202 0 0 0-23.935 18.09z"/><path class="fill-muted transition-[fill] group-hover:fill-[#FC6D26] group-focus-visible:fill-[#FC6D26]" d="M26.42 61.271A57.73 57.73 0 0 0 3.422 50.904l-.17.452c-5.059 13.219-.763 28.192 10.537 36.716l.059.046.157.111 26.061 19.516L64 89.655 26.42 61.271z"/></svg>
        </a>
        <a href="https://github.com/phpete1" aria-label="GitHub" title="GitHub" class="group inline-flex size-9 items-center justify-center max-sm:w-8">
            <svg class="block h-[18px] w-auto" width="18" height="18" aria-hidden="true" focusable="false" viewBox="0 0 24 24"><path class="fill-muted transition-[fill] group-hover:fill-[#FFFFFF] group-focus-visible:fill-[#FFFFFF]" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
        </a>
        <a href="https://dev-null.sh/@phpete1" aria-label="/dev/null" title="/dev/null" class="group inline-flex size-9 items-center justify-center max-sm:w-8">
            <svg class="block h-[18px] w-auto" width="18" height="18" aria-hidden="true" focusable="false" viewBox="1.6 1.5 45 45"><path class="fill-muted transition-[fill] group-hover:fill-[#ECECEC] group-focus-visible:fill-[#ECECEC]" d="M2 42h10L26 6H16Z"/><path class="fill-muted transition-[fill] group-hover:fill-[#FF8A4C] group-focus-visible:fill-[#FF8A4C]" fill-rule="evenodd" clip-rule="evenodd" d="M17.81 43.5h13.22L46.19 4.5H32.97ZM22.19 40.5l12.84-33h6.78l-12.84 33Z"/></svg>
        </a>
    </nav>
</header>
