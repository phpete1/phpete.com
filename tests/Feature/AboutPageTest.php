<?php

test('the homepage shows the about page', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertViewIs('about')
        ->assertSee('// about')
        ->assertSee("Hi, I'm Pete.", false)
        ->assertSee('href="https://soundcloud.com/jerzykmusic"', false);
});
