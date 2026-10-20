<x-layouts.app title="Projects" description="Things Pete is building.">
    <x-section label="projects">
        <ul>
            @foreach ($projects as $project)
                <li>
                    <{{ $project['url'] ? 'a' : 'div' }}
                        @if ($project['url']) href="{{ $project['url'] }}" @endif
                        @class([
                            'flex flex-wrap justify-between gap-x-4 gap-y-1 border-b border-line py-3.5',
                            'hover:text-white' => $project['url'],
                        ])
                    >
                        <span class="inline-flex items-center gap-2.5 text-[17px] font-medium">
                            {{ $project['name'] }}
                            @if ($project['soon'])
                                <span class="font-mono text-[13px] font-normal text-accent">
                                    <span class="mr-1.5 inline-block size-1.5 rounded-full bg-accent align-middle" aria-hidden="true"></span>coming soon
                                </span>
                            @endif
                        </span>
                        <span class="font-mono text-[13px] text-muted">{{ $project['tags'] }}</span>
                    </{{ $project['url'] ? 'a' : 'div' }}>
                </li>
            @endforeach
        </ul>
    </x-section>
</x-layouts.app>
