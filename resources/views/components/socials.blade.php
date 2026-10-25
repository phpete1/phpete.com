@php
    $socials = [
        ['label' => 'GitLab', 'href' => 'https://gitlab.com/phpete1', 'icon' => 'gitlab'],
        ['label' => 'GitHub', 'href' => 'https://github.com/phpete1', 'icon' => 'github'],
        ['label' => '/dev/null', 'href' => 'https://dev-null.sh/@phpete1', 'icon' => 'dev-null'],
    ];
@endphp

{{-- Profiles elsewhere, shown in the footer. Icons are in resources/svg, each sized in markup so it can't fill the screen before the stylesheet loads. --}}
<nav {{ $attributes->class('flex items-center') }} aria-label="Elsewhere">
    @foreach ($socials as $social)
        <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}" title="{{ $social['label'] }}" class="group inline-flex size-9 items-center justify-center">
            <x-svg :name="$social['icon']" />
        </a>
    @endforeach
</nav>
