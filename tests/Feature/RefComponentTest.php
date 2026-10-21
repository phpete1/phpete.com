<?php

test('it links a reference to the passage on esv.org', function () {
    $this->blade('<x-ref ref="Romans 3:23" />')
        ->assertSee('href="https://www.esv.org/Romans+3:23/"', false)
        ->assertSee('[Romans 3:23]');
});

test('it handles numbered books and verse ranges', function () {
    $this->blade('<x-ref ref="1 Peter 2:24" />')
        ->assertSee('href="https://www.esv.org/1+Peter+2:24/"', false);

    $this->blade('<x-ref ref="Ephesians 2:8-9" />')
        ->assertSee('href="https://www.esv.org/Ephesians+2:8-9/"', false)
        ->assertSee('[Ephesians 2:8-9]');
});
