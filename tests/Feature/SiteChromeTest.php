<?php

test('the header icons are sized without css', function () {
    $header = str($this->get(route('home'))->getContent())->between('<header', '</header>');

    // Without width/height an SVG fills the screen until the stylesheet arrives.
    expect(preg_match_all('/<svg\b[^>]*>/', $header, $svgs))->toBe(5);

    foreach ($svgs[0] as $svg) {
        expect($svg)
            ->toMatch('/\bwidth="\d+"/')
            ->toMatch('/\bheight="18"/');
    }
});

test('page titles are suffixed with the site name', function () {
    $this->get(route('projects'))
        ->assertSee('<title>Projects · phpete.com</title>', false)
        ->assertSee('<meta property="og:title" content="Projects · phpete.com">', false);
});

test('pages have a canonical url built from the app url', function () {
    config(['app.url' => 'https://phpete.com']);

    $this->get(route('home'))
        ->assertSee('<link rel="canonical" href="https://phpete.com/">', false)
        ->assertSee('<meta property="og:url" content="https://phpete.com/">', false);

    $this->get(route('projects'))
        ->assertSee('<link rel="canonical" href="https://phpete.com/projects">', false);
});

test('the 404 page has no canonical url', function () {
    $this->get('/does-not-exist')
        ->assertNotFound()
        ->assertDontSee('rel="canonical"', false);
});

test('the theme is set before the stylesheet loads', function () {
    $head = str($this->get(route('home'))->getContent())->before('</head>');

    // Otherwise the page paints in the system theme first and flashes when a saved choice differs.
    expect($head->before('<link rel="stylesheet"')->value())->toContain("localStorage.getItem('theme')");
});
