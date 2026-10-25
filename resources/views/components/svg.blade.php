@props(['name'])

{{-- Inlines resources/svg/{name}.svg, so its paths can still be styled (e.g. brand colours on hover). --}}
{!! file_get_contents(resource_path("svg/{$name}.svg")) !!}
