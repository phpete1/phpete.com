<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ProjectsController extends Controller
{
    /**
     * Show the projects page.
     */
    public function __invoke(): View
    {
        /** @var list<array{label: string, url: ?string, status: 'live'|'coming soon', tags: list<string>}> $projects */
        $projects = [
            [
                'label' => 'phpete1/scholi',
                'url' => null,
                'status' => 'coming soon',
                'tags' => ['saas', 'schools'],
            ],
            [
                'label' => 'phpete1/phpete.com',
                'url' => 'https://github.com/phpete1/phpete.com',
                'status' => 'live',
                'tags' => ['this page', 'source'],
            ],
            [
                'label' => 'phpete1/setting-store',
                'url' => null,
                'status' => 'live',
                'tags' => ['php', 'composer'],
            ],
        ];

        // Live projects first, coming soon last (usort is stable, so order is kept within each group).
        usort($projects, fn (array $a, array $b): int => ($a['status'] === 'live' ? 0 : 1) <=> ($b['status'] === 'live' ? 0 : 1));

        return view('projects', ['projects' => $projects]);
    }
}
