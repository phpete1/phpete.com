<?php

test('the page is tagged with the current season', function () {
    $this->travelTo('2026-07-14');

    $this->get(route('home'))->assertSee('<html lang="en-GB" data-season="summer">', false);
});
