@props([
    'label',
])

{{-- Default page section: mono "// label" on the left, content column on the right (stacks on mobile). --}}
<section class="flex flex-wrap gap-x-24 gap-y-8 max-sm:gap-3">
    <span class="max-w-[260px] flex-[1_1_200px] pt-2.5 font-mono text-xs text-muted max-sm:pt-0">// {{ $label }}</span>

    <div {{ $attributes->class('flex min-w-0 max-w-[620px] flex-[999_1_480px] flex-col gap-5') }}>
        {{ $slot }}
    </div>
</section>
