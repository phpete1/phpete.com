<?php

test('links carry their keyboard shortcuts', function (string $href, string $keys) {
    expect((string) $this->get(route('projects'))->getContent())
        ->toMatch('#<a\s+href="'.preg_quote($href, '#').'"[^>]*\saria-keyshortcuts="'.$keys.'"#');
})->with([
    'home' => fn () => [route('home'), 'H'],
    'projects' => fn () => [route('projects'), 'P'],
    'verse' => fn () => [route('who-is-jesus'), 'V J'],
]);
