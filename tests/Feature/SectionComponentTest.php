<?php

test('it renders the label and content', function () {
    $view = $this->blade('<x-section label="about"><p>Hello</p></x-section>');

    $view->assertSee('// about')
        ->assertSee('<p>Hello</p>', false);
});

test('it merges extra classes onto the content column', function () {
    $view = $this->blade('<x-section label="projects" class="gap-0">Items</x-section>');

    $view->assertSee('gap-0');
});
