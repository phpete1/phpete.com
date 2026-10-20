<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProjectsPageTest extends TestCase
{
    public function test_the_page_lists_projects(): void
    {
        $response = $this->get(route('projects'));

        $response->assertOk()
            ->assertViewIs('projects')
            ->assertSee('<title>Projects · phpete.com</title>', false)
            ->assertSeeInOrder(['Scholi', 'phpete.com']);
    }

    public function test_the_header_marks_projects_as_the_current_page(): void
    {
        $response = $this->get(route('projects'));

        $this->assertMatchesRegularExpression(
            '#<a\s+href="'.preg_quote(route('projects'), '#').'"\s+aria-current="page"#',
            (string) $response->getContent(),
        );
    }
}
