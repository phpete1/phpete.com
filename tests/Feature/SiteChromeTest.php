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

    public function test_the_header_icons_are_sized_without_css(): void
    {
        $header = str($this->get(route('home'))->getContent())->between('<header', '</header>');

        // Without width/height an SVG fills the screen until the stylesheet arrives.
        $this->assertSame(3, preg_match_all('/<svg\b[^>]*>/', $header, $svgs));

        foreach ($svgs[0] as $svg) {
            $this->assertMatchesRegularExpression('/\bwidth="\d+"/', $svg);
            $this->assertMatchesRegularExpression('/\bheight="18"/', $svg);
        }
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

    public function test_pages_have_a_canonical_url_built_from_the_app_url(): void
    {
        config(['app.url' => 'https://phpete.com']);

        $this->get(route('home'))
            ->assertSee('<link rel="canonical" href="https://phpete.com/">', false)
            ->assertSee('<meta property="og:url" content="https://phpete.com/">', false);

        $this->get(route('projects'))
            ->assertSee('<link rel="canonical" href="https://phpete.com/projects">', false);
    }

    public function test_pages_have_social_preview_tags(): void
    {
        $this->get(route('projects'))
            ->assertSee('<meta property="og:title" content="Projects · phpete.com">', false)
            ->assertSee('<meta property="og:description" content="Things I&#039;m building.">', false)
            ->assertSee('<meta property="og:site_name" content="phpete.com">', false)
            ->assertSee('<meta name="twitter:card" content="summary">', false);
    }

    public function test_the_404_page_has_no_canonical_url(): void
    {
        $this->get('/does-not-exist')
            ->assertNotFound()
            ->assertDontSee('rel="canonical"', false)
            ->assertSee('<meta property="og:title" content="Not found · phpete.com">', false);
    }

    public function test_the_projects_page_description(): void
    {
        $this->get(route('projects'))
            ->assertSee('<meta name="description" content="Things I&#039;m building.">', false);
    }
}
