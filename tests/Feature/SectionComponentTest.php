<?php

namespace Tests\Feature;

use Tests\TestCase;

class SectionComponentTest extends TestCase
{
    public function test_it_renders_the_label_and_content(): void
    {
        $view = $this->blade('<x-section label="about"><p>Hello</p></x-section>');

        $view->assertSee('// about')
            ->assertSee('<p>Hello</p>', false);
    }

    public function test_it_merges_extra_classes_onto_the_content_column(): void
    {
        $view = $this->blade('<x-section label="projects" class="gap-0">Items</x-section>');

        $view->assertSee('gap-0');
    }
}
