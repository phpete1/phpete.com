@props([
    'ref',
])

{{-- Bible reference, e.g. <x-ref ref="1 Peter 2:24" /> → "[1 Peter 2:24]" linking to just that passage on ESV.org. --}}
@php
    $url = 'https://www.esv.org/'.str_replace(' ', '+', $ref).'/';
@endphp

<a href="{{ $url }}" class="font-mono text-[13px] whitespace-nowrap text-muted transition-colors hover:text-accent">[{{ $ref }}]</a>
