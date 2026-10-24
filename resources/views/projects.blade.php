<x-layouts.app title="Projects" description="Things I'm building.">
    <x-section label="projects">
        <ul>
            @foreach ($projects as $project)
                <li style="--i: {{ $loop->index }}">
                    <{{ $project['url'] ? 'a' : 'div' }}
                        @if ($project['url']) href="{{ $project['url'] }}" @endif
                        @class([
                            'enter-row flex flex-wrap justify-between gap-x-4 gap-y-1 py-3.5 max-sm:flex-nowrap max-sm:items-end',
                            'hover:text-white' => $project['url'],
                            'cursor-progress' => $project['status'] === 'coming soon',
                        ])
                    >
                        {{-- On mobile "coming soon" stacks above the label, leaving the tags room on the right. --}}
                        <span class="enter-rise inline-flex items-center gap-2.5 text-[17px] font-medium max-sm:flex-col-reverse max-sm:items-start max-sm:gap-1">
                            {{ $project['label'] }}
                            @if ($project['status'] === 'coming soon')
                                <span class="font-mono text-[13px] font-normal text-accent">
                                    <span class="relative mr-1.5 inline-block size-1.5 align-middle" aria-hidden="true">
                                        <span class="absolute inset-0 rounded-full bg-accent opacity-60 motion-safe:animate-ping"></span>
                                        <span class="relative block size-1.5 rounded-full bg-accent"></span>
                                    </span>coming soon
                                </span>
                            @endif
                        </span>
                        <span class="font-mono text-[13px] text-muted max-sm:text-right" data-scramble>
                            @foreach ($project['tags'] as $tag)
                                @unless ($loop->first) · @endunless{{ $tag }}
                            @endforeach
                        </span>
                    </{{ $project['url'] ? 'a' : 'div' }}>
                </li>
            @endforeach
        </ul>
    </x-section>
</x-layouts.app>
