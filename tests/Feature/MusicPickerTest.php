<?php

test('every page has the music picker with each soundcloud profile', function (string $route) {
    $dialog = str($this->get(route($route))->getContent())->between('<dialog', '</dialog>');

    expect($dialog->value())
        ->toContain('id="music"')
        ->toContain('aria-keyshortcuts="M"')
        ->toContain('href="https://soundcloud.com/lifelinetrance"')
        ->toContain('href="https://soundcloud.com/jerzykmusic"');
})->with(['home', 'projects', 'who-is-jesus']);

test('profiles are listed from config', function () {
    config(['music.soundcloud' => [['name' => 'someone', 'username' => 'someone123']]]);

    $this->get(route('home'))
        ->assertSee('href="https://soundcloud.com/someone123"', false)
        ->assertDontSee('soundcloud.com/jerzykmusic', false);
});

test('the music link on the about page opens the picker', function () {
    $this->get(route('home'))
        ->assertSee('commandfor="music" command="show-modal"', false);
});
