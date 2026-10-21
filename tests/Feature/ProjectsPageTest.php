<?php

test('live projects are listed before coming soon ones', function () {
    $statuses = array_column($this->get(route('projects'))->viewData('projects'), 'status');

    expect($statuses)->toBe(['live', 'live', 'coming soon']);
});

test('only released projects with a url are linked', function () {
    $this->get(route('projects'))
        ->assertSee('href="https://github.com/phpete1/phpete.com"', false)
        ->assertDontSee('href="https://github.com/phpete1/scholi"', false)
        ->assertDontSee('href="https://github.com/phpete1/setting-store"', false);
});

test('the header marks projects as the current page', function () {
    expect((string) $this->get(route('projects'))->getContent())
        ->toMatch('#<a\s+href="'.preg_quote(route('projects'), '#').'"\s+aria-current="page"#');
});
