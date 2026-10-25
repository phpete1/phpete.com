<?php

use App\RedLetter\RedLetter;
use App\RedLetter\RedLetterRepository;

test('the facade resolves the repository', function () {
    expect(RedLetter::getFacadeRoot())->toBeInstanceOf(RedLetterRepository::class);
});

test('the footer shows the verse of the day', function () {
    RedLetter::swap(new RedLetterRepository(verses: [
        ['text' => 'Come to me.', 'book' => 'Matthew', 'chapter' => 11, 'verse' => '28'],
    ]));

    $this->get(route('home'))
        ->assertSee('“Come to me.”')
        ->assertSee('Matthew 11:28 ESV');
});

test('the footer shows the verse on error pages too', function () {
    $this->get('/does-not-exist')
        ->assertNotFound()
        ->assertSee(RedLetter::today()->reference(short: false));
});
