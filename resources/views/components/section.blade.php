@props([
    'label',
])

{{-- Default page section: mono "// label" above the content column. --}}
<section class="flex flex-col gap-4">
    <span class="font-mono text-xs text-muted">// {{ $label }}</span>

    <div {{ $attributes->class('flex min-w-0 max-w-[620px] flex-col gap-5') }}>
        {{ $slot }}
    </div>
</section>
