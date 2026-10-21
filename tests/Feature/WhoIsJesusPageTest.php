<?php

test('the page renders', function () {
    $response = $this->get(route('who-is-jesus'));

    $response->assertOk()
        ->assertViewIs('who-is-jesus')
        ->assertSee('<title>Who is Jesus · phpete.com</title>', false)
        ->assertSee('href="https://dev-null.sh/@phpete1"', false)
        ->assertSee('href="https://www.christianityexplored.org/"', false)
        ->assertSee('Our Living Hope.')
        ->assertSee('visit Christianity Explored</a>', false);
});

test('it is linked from the footer not the header', function () {
    $response = $this->get(route('home'));

    $response->assertSee('href="'.route('who-is-jesus').'"', false);

    expect(str($response->getContent())->between('<header', '</header>')->toString())
        ->not->toContain(route('who-is-jesus'));
});
