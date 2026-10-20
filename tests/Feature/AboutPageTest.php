<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_the_homepage_shows_the_about_page(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertViewIs('about')
            ->assertSee('// about')
            ->assertSee("Hi, I'm Pete.", false)
            ->assertSee('href="https://soundcloud.com/jerzykmusic"', false);
    }
}
