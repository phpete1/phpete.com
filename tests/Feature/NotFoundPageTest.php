<?php

namespace Tests\Feature;

use Tests\TestCase;

class NotFoundPageTest extends TestCase
{
    public function test_unknown_urls_show_the_branded_404_page(): void
    {
        $response = $this->get('/does-not-exist');

        $response->assertNotFound()
            ->assertSee('<title>Not found · phpete.com</title>', false)
            ->assertSee('~/phpete')
            ->assertSee('// this page doesn&#039;t exist', false)
            ->assertSee('Page not found.')
            ->assertSee('href="https://www.esv.org/Luke+15:4/"', false)
            ->assertSee('href="'.route('home').'"', false);
    }

    public function test_no_header_link_is_marked_as_the_current_page(): void
    {
        $response = $this->get('/does-not-exist');

        $response->assertDontSee('aria-current="page"', false);
    }
}
