<?php

test('the page lists projects', function () {
    $response = $this->get(route('projects'));

    $response->assertOk()
        ->assertViewIs('projects')
        ->assertSee('<title>Projects · phpete.com</title>', false)
        ->assertSeeTextInOrder(['php', '·', 'composer']);
});

test('live projects are listed before coming soon ones', function () {
    $response = $this->get(route('projects'));

    $response->assertSeeInOrder(['phpete1/phpete.com', 'phpete1/setting-store', 'phpete1/scholi', 'coming soon']);

    expect(array_column($response->viewData('projects'), 'status'))
        ->toBe(['live', 'live', 'coming soon']);
});

test('only released projects with a url are linked', function () {
    $response = $this->get(route('projects'));

    $response->assertSee('href="https://github.com/phpete1/phpete.com"', false)
        ->assertDontSee('href="https://github.com/phpete1/scholi"', false)
        ->assertDontSee('href="https://github.com/phpete1/setting-store"', false);
});

test('this site is tagged as a website', function () {
    $projects = collect($this->get(route('projects'))->viewData('projects'))->keyBy('label');

    expect($projects['phpete1/phpete.com']['tags'])->toBe(['website']);
});

test('rows are staggered and tags scramble in', function () {
    $response = $this->get(route('projects'));

    $response->assertSeeInOrder(['--i: 0', '--i: 1', '--i: 2'], false)
        ->assertSee('data-scramble', false);
});

test('the header marks projects as the current page', function () {
    $response = $this->get(route('projects'));

    expect((string) $response->getContent())
        ->toMatch('#<a\s+href="'.preg_quote(route('projects'), '#').'"\s+aria-current="page"#');
});
