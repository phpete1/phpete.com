<?php

test('unknown urls show the branded 404 page', function () {
    $response = $this->get('/does-not-exist');

    $response->assertNotFound()
        ->assertSee('<title>Not found · phpete.com</title>', false)
        ->assertSee('~/phpete')
        ->assertSee('// this page doesn&#039;t exist', false)
        ->assertSee('Page not found.')
        ->assertSee('href="https://www.esv.org/Luke+15:4/"', false)
        ->assertSee('href="'.route('home').'"', false);
});

test('no header link is marked as the current page', function () {
    $response = $this->get('/does-not-exist');

    $response->assertDontSee('aria-current="page"', false);
});
