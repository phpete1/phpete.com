<?php

namespace Tests\Feature;

use Tests\TestCase;

class WhoIsJesusPageTest extends TestCase
{
    public function test_the_page_renders(): void
    {
        $response = $this->get(route('who-is-jesus'));

        $response->assertOk()
            ->assertViewIs('who-is-jesus')
            ->assertSee('<title>Who is Jesus · phpete.com</title>', false)
            ->assertSee('href="https://dev-null.sh/@phpete1"', false)
            ->assertSee('href="https://www.christianityexplored.org/"', false)
            ->assertSee('Our Living Hope.')
            ->assertSee('visit Christianity Explored</a>', false);
    }

    public function test_it_is_linked_from_the_footer_not_the_header(): void
    {
        $response = $this->get(route('home'));

        $response->assertSee('href="'.route('who-is-jesus').'"', false);
        $this->assertStringNotContainsString(
            route('who-is-jesus'),
            str($response->getContent())->between('<header', '</header>')->toString(),
        );
    }
}
