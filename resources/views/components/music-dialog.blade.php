@php
    /** @var list<array{name: string, username: string}> $profiles */
    $profiles = config('music.soundcloud');
@endphp

{{-- SoundCloud picker. Opened by any button with commandfor="music", or the M key (resources/js/shortcuts.js). --}}
<dialog
    id="music"
    aria-labelledby="music-title"
    aria-keyshortcuts="M"
    class="m-auto w-[min(420px,calc(100vw-32px))] border border-line bg-bg p-0 text-text backdrop:bg-black/60 backdrop:backdrop-blur-sm"
>
    <div class="flex items-center justify-between border-b border-line px-5 py-3 font-mono text-xs text-muted">
        <h2 id="music-title">// my music</h2>
        <button type="button" commandfor="music" command="close" class="-mr-2 inline-flex min-h-9 cursor-pointer items-center px-2 hover:text-strong">[esc]</button>
    </div>

    <ul>
        @foreach ($profiles as $profile)
            <li class="border-b border-line last:border-b-0">
                <a href="https://soundcloud.com/{{ $profile['username'] }}" class="group flex items-baseline justify-between gap-4 px-5 py-3.5">
                    <span class="text-[17px] font-medium group-hover:text-strong">{{ $profile['name'] }}</span>
                    <span class="font-mono text-[13px] whitespace-nowrap text-muted transition-colors group-hover:text-accent"><span class="max-sm:hidden">soundcloud.com/</span>{{ $profile['username'] }} ↗</span>
                </a>
            </li>
        @endforeach
    </ul>
</dialog>
