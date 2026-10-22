<?php

test('each page renders its view', function (string $route, string $view) {
    $this->get(route($route))
        ->assertOk()
        ->assertViewIs($view);
})->with([
    'about' => ['home', 'about'],
    'projects' => ['projects', 'projects'],
    'who is jesus' => ['who-is-jesus', 'who-is-jesus'],
]);

test('pages can be briefly cached so preloaded pages are reused', function () {
    expect($this->get(route('projects'))->headers->get('Cache-Control'))
        ->toContain('max-age=60')
        ->toContain('private');
});
