@php
    /** @var list<array{name: string, username: string}> $profiles */
    $profiles = config('music.soundcloud');
@endphp

{{-- SoundCloud picker, opened from the about page's music link or the M key. --}}
<x-dialog id="music" title="my music" aria-keyshortcuts="M">
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
</x-dialog>
