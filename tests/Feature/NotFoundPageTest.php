<?php

test('unknown urls show the branded 404 page', function () {
    $this->get('/does-not-exist')
        ->assertNotFound()
        // Laravel's default error page has no <header>; ours uses the site layout.
        ->assertSee('<header', false);
});

test('no header link is marked as the current page', function () {
    $this->get('/does-not-exist')
        ->assertDontSee('aria-current="page"', false);
});
