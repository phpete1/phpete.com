<?php

namespace Tests\Feature;

use Tests\TestCase;

class SiteChromeTest extends TestCase
{
    public function test_the_header_links_to_each_profile(): void
    {
        $this->get(route('home'))
            ->assertSee('href="https://gitlab.com/phpete1"', false)
            ->assertSee('href="https://github.com/phpete1"', false)
            ->assertSee('href="https://dev-null.sh/@phpete1"', false);
    }

    public function test_pages_reference_the_favicons(): void
    {
        $this->get(route('home'))
            ->assertSee('href="/favicon.svg"', false)
            ->assertSee('href="/favicon.ico"', false)
            ->assertSee('href="/apple-touch-icon.png"', false);

        foreach (['favicon.svg', 'favicon.ico', 'apple-touch-icon.png'] as $file) {
            $this->assertFileExists(public_path($file));
        }
    }

    public function test_the_projects_page_description(): void
    {
        $this->get(route('projects'))
            ->assertSee('<meta name="description" content="Things I&#039;m building.">', false);
    }
}
