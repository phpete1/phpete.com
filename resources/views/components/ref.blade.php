@props([
    'ref',
])

{{-- Bible reference, e.g. <x-ref ref="1 Peter 2:24" /> → "[1 Peter 2:24]" linking to the ESV chapter on Bible Hub. --}}
@php
    preg_match('/^(.+?) (\d+):/', $ref, $parts);
    $url = 'https://biblehub.com/esv/'.str($parts[1])->lower()->replace(' ', '_').'/'.$parts[2].'.htm';
@endphp

<a href="{{ $url }}" class="font-mono text-[13px] whitespace-nowrap text-muted transition-colors hover:text-accent">[{{ $ref }}]</a>
