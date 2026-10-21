<?php

namespace Tests\Feature;

use Tests\TestCase;

class RefComponentTest extends TestCase
{
    public function test_it_links_a_reference_to_the_passage_on_esv_org(): void
    {
        $this->blade('<x-ref ref="Romans 3:23" />')
            ->assertSee('href="https://www.esv.org/Romans+3:23/"', false)
            ->assertSee('[Romans 3:23]');
    }

    public function test_it_handles_numbered_books_and_verse_ranges(): void
    {
        $this->blade('<x-ref ref="1 Peter 2:24" />')
            ->assertSee('href="https://www.esv.org/1+Peter+2:24/"', false);

        $this->blade('<x-ref ref="Ephesians 2:8-9" />')
            ->assertSee('href="https://www.esv.org/Ephesians+2:8-9/"', false)
            ->assertSee('[Ephesians 2:8-9]');
    }
}
