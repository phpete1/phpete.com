@props([
    'label',
    'typed' => false,
])

{{-- Default page section: mono "// label" above the content column. `typed` types the label and content in. --}}
<section class="flex flex-col gap-4" @if ($typed) data-type @endif>
    <span class="font-mono text-xs text-muted">// {{ $label }}</span>

    <div {{ $attributes->class('flex min-w-0 max-w-[620px] flex-col gap-5') }}>
        {{ $slot }}
    </div>
</section>
