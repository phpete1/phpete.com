<?php

namespace Tests\Feature;

use Tests\TestCase;

class TypeInEffectTest extends TestCase
{
    public function test_the_about_and_who_is_jesus_pages_type_in(): void
    {
        $this->get(route('home'))->assertSee('data-type', false);
        $this->get(route('who-is-jesus'))->assertSee('data-type', false);
    }

    public function test_the_projects_page_does_not_type_in(): void
    {
        $this->get(route('projects'))->assertDontSee('data-type', false);
    }
}
