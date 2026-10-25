@props([
    'id',
    'title',
])

{{-- Modal shell: "// title" bar with an [esc] close button above the content. Opened by any button with
     commandfor="{id}" command="show-modal", or the key in aria-keyshortcuts (resources/js/shortcuts.js). --}}
<dialog
    id="{{ $id }}"
    aria-labelledby="{{ $id }}-title"
    {{ $attributes->class('m-auto w-[min(420px,calc(100vw-32px))] border border-line bg-bg p-0 text-text backdrop:bg-black/60 backdrop:backdrop-blur-sm') }}
>
    <div class="flex items-center justify-between border-b border-line px-5 py-3 font-mono text-xs text-muted">
        <h2 id="{{ $id }}-title">// {{ $title }}</h2>
        <button type="button" commandfor="{{ $id }}" command="close" class="-mr-2 inline-flex min-h-9 cursor-pointer items-center px-2 hover:text-strong">[esc]</button>
    </div>

    {{ $slot }}
</dialog>
