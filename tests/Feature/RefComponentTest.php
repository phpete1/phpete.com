<?php

namespace Tests\Feature;

use Tests\TestCase;

class RefComponentTest extends TestCase
{
    public function test_it_links_a_reference_to_the_esv_chapter_on_bible_hub(): void
    {
        $this->blade('<x-ref ref="Romans 3:23" />')
            ->assertSee('href="https://biblehub.com/esv/romans/3.htm"', false)
            ->assertSee('[Romans 3:23]');
    }

    public function test_it_handles_numbered_books_and_verse_ranges(): void
    {
        $this->blade('<x-ref ref="1 Peter 2:24" />')
            ->assertSee('href="https://biblehub.com/esv/1_peter/2.htm"', false);

        $this->blade('<x-ref ref="Ephesians 2:8-9" />')
            ->assertSee('href="https://biblehub.com/esv/ephesians/2.htm"', false)
            ->assertSee('[Ephesians 2:8-9]');
    }
}
