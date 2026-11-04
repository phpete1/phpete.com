<x-layouts.app title="Projects" description="Things I'm building.">
    <x-section label="projects">
        <ul>
            @foreach ($projects as $project)
                @php
                    $hasDetails = ! empty($project['description'] ?? null) && ! empty($project['command'] ?? null);
                    $dialogId = $hasDetails ? \Illuminate\Support\Str::slug($project['label']) : null;
                @endphp
                <li style="--i: {{ $loop->index }}">
                    @if ($hasDetails)
                        <button
                            type="button"
                            commandfor="{{ $dialogId }}"
                            command="show-modal"
                            aria-haspopup="dialog"
                            @class([
                                'enter-row flex w-full flex-wrap justify-between gap-x-4 gap-y-1 py-3.5 text-left max-sm:flex-nowrap max-sm:items-end',
                                'hover:text-strong',
                                'cursor-progress' => $project['status'] === 'coming soon',
                            ])
                        >
                    @elseif ($project['url'])
                        <a
                            href="{{ $project['url'] }}"
                            @class([
                                'enter-row flex flex-wrap justify-between gap-x-4 gap-y-1 py-3.5 max-sm:flex-nowrap max-sm:items-end',
                                'hover:text-strong',
                                'cursor-progress' => $project['status'] === 'coming soon',
                            ])
                        >
                    @else
                        <div
                            @class([
                                'enter-row flex flex-wrap justify-between gap-x-4 gap-y-1 py-3.5 max-sm:flex-nowrap max-sm:items-end',
                                'cursor-progress' => $project['status'] === 'coming soon',
                            ])
                        >
                    @endif
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
                    @if ($hasDetails)
                        </button>
                    @elseif ($project['url'])
                        </a>
                    @else
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </x-section>

    @foreach ($projects as $project)
        @if (! empty($project['description'] ?? null) && ! empty($project['command'] ?? null))
            <x-dialog id="{{ \Illuminate\Support\Str::slug($project['label']) }}" title="{{ $project['label'] }}">
                <div class="px-5 py-4">
                    <p class="text-[15px] leading-[1.6] text-text-soft">{{ $project['description'] }}</p>
                    <pre class="mt-3 overflow-x-auto border border-line bg-bg p-3 font-mono text-[13px] text-text"><code>{{ $project['command'] }}</code></pre>
                    @if ($project['url'])
                        <div class="mt-4">
                            <a href="{{ $project['url'] }}" class="inline-flex items-center border border-line px-3 py-1.5 font-mono text-[13px] text-text transition-colors hover:text-accent">view project ↗</a>
                        </div>
                    @endif
                </div>
            </x-dialog>
        @endif
    @endforeach
</x-layouts.app>