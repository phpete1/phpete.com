<?php

test('the header has a button that opens the shortcuts key', function () {
    expect(str($this->get(route('home'))->getContent())->between('<header', '</header>')->value())
        ->toContain('commandfor="shortcuts" command="show-modal"');
});

test('every key in the shortcuts key is wired up on the page', function () {
    $html = str($this->get(route('home'))->getContent());

    preg_match_all('#<kbd[^>]*>(.+?)</kbd>#', $html->between('<dialog id="shortcuts"', '</dialog>'), $listed);
    preg_match_all('#aria-keyshortcuts="([^"]+)"#', $html, $wired);

    $wiredKeys = collect($wired[1])->flatMap(fn (string $keys) => explode(' ', $keys));

    expect($listed[1])->toEqualCanonicalizing(['H', 'P', 'V', 'J', 'M', '?'])
        ->and($wiredKeys->intersect($listed[1])->unique()->values()->all())->toEqualCanonicalizing($listed[1]);
});
