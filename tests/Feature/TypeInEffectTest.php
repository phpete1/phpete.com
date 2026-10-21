<?php

test('the about and who is jesus pages type in', function () {
    $this->get(route('home'))->assertSee('data-type', false);
    $this->get(route('who-is-jesus'))->assertSee('data-type', false);
});

test('the projects page does not type in', function () {
    $this->get(route('projects'))->assertDontSee('data-type', false);
});
