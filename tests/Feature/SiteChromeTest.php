<?php

test('the header links to each profile', function () {
    $this->get(route('home'))
        ->assertSee('href="https://gitlab.com/phpete1"', false)
        ->assertSee('href="https://github.com/phpete1"', false)
        ->assertSee('href="https://dev-null.sh/@phpete1"', false);
});

test('the header icons are sized without css', function () {
    $header = str($this->get(route('home'))->getContent())->between('<header', '</header>');

    // Without width/height an SVG fills the screen until the stylesheet arrives.
    expect(preg_match_all('/<svg\b[^>]*>/', $header, $svgs))->toBe(3);

    foreach ($svgs[0] as $svg) {
        expect($svg)
            ->toMatch('/\bwidth="\d+"/')
            ->toMatch('/\bheight="18"/');
    }
});

test('pages reference the favicons', function () {
    $this->get(route('home'))
        ->assertSee('href="/favicon.svg"', false)
        ->assertSee('href="/favicon.ico"', false)
        ->assertSee('href="/apple-touch-icon.png"', false);

    foreach (['favicon.svg', 'favicon.ico', 'apple-touch-icon.png'] as $file) {
        expect(public_path($file))->toBeFile();
    }
});

test('pages have a canonical url built from the app url', function () {
    config(['app.url' => 'https://phpete.com']);

    $this->get(route('home'))
        ->assertSee('<link rel="canonical" href="https://phpete.com/">', false)
        ->assertSee('<meta property="og:url" content="https://phpete.com/">', false);

    $this->get(route('projects'))
        ->assertSee('<link rel="canonical" href="https://phpete.com/projects">', false);
});

test('pages have social preview tags', function () {
    $this->get(route('projects'))
        ->assertSee('<meta property="og:title" content="Projects · phpete.com">', false)
        ->assertSee('<meta property="og:description" content="Things I&#039;m building.">', false)
        ->assertSee('<meta property="og:site_name" content="phpete.com">', false)
        ->assertSee('<meta name="twitter:card" content="summary">', false);
});

test('the 404 page has no canonical url', function () {
    $this->get('/does-not-exist')
        ->assertNotFound()
        ->assertDontSee('rel="canonical"', false)
        ->assertSee('<meta property="og:title" content="Not found · phpete.com">', false);
});

test('the projects page description', function () {
    $this->get(route('projects'))
        ->assertSee('<meta name="description" content="Things I&#039;m building.">', false);
});
