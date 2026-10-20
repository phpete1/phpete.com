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
            ->assertSeeTextInOrder(['php', '·', 'composer']);
    }

    public function test_live_projects_are_listed_before_coming_soon_ones(): void
    {
        $response = $this->get(route('projects'));

        $response->assertSeeInOrder(['phpete1/phpete.com', 'phpete1/setting-store', 'phpete1/scholi', 'coming soon']);

        $this->assertSame(
            ['live', 'live', 'coming soon'],
            array_column($response->viewData('projects'), 'status'),
        );
    }

    public function test_only_released_projects_with_a_url_are_linked(): void
    {
        $response = $this->get(route('projects'));

        $response->assertSee('href="https://github.com/phpete1/phpete.com"', false)
            ->assertDontSee('href="https://github.com/phpete1/scholi"', false)
            ->assertDontSee('href="https://github.com/phpete1/setting-store"', false);
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
