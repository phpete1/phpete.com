@php
    // Each key here is set on its link or dialog with aria-keyshortcuts, which is what resources/js/shortcuts.js acts on.
    $shortcuts = [
        ['keys' => ['H'], 'label' => 'home'],
        ['keys' => ['P'], 'label' => 'projects'],
        ['keys' => ['V', 'J'], 'label' => 'who is Jesus'],
        ['keys' => ['M'], 'label' => 'my music'],
        ['keys' => ['?'], 'label' => 'these shortcuts'],
    ];
@endphp

{{-- Keyboard shortcuts key, opened from the header's keyboard icon or the ? key. --}}
<x-dialog id="shortcuts" title="keyboard shortcuts" aria-keyshortcuts="?">
    <dl class="font-mono text-[13px]">
        @foreach ($shortcuts as $shortcut)
            <div class="flex items-center justify-between gap-4 border-b border-line px-5 py-3 last:border-b-0">
                <dt class="text-text-soft">{{ $shortcut['label'] }}</dt>
                <dd class="flex items-center gap-1.5 text-muted">
                    @foreach ($shortcut['keys'] as $key)
                        @unless ($loop->first) or @endunless
                        <kbd class="inline-flex min-w-6 justify-center border border-line px-1.5 py-0.5 text-text">{{ $key }}</kbd>
                    @endforeach
                </dd>
            </div>
        @endforeach
    </dl>
</x-dialog>
