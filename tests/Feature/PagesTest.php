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
