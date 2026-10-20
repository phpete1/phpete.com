<x-layouts.app title="Projects" description="Things Pete is building.">
    <x-section label="projects">
        <ul>
            @foreach ($projects as $project)
                <li>
                    <a href="{{ $project['url'] }}" class="flex flex-wrap justify-between gap-x-4 gap-y-1 border-b border-line py-3.5 hover:text-white">
                        <span class="text-[17px] font-medium">{{ $project['name'] }}</span>
                        <span class="font-mono text-[13px] text-muted">{{ $project['tags'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </x-section>
</x-layouts.app>
