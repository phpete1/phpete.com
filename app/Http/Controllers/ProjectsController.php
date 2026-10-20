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
        /** @var list<array{name: string, tags: string, url: string}> $projects */
        $projects = [
            ['name' => 'Scholi', 'tags' => 'saas · schools', 'url' => '#'],
            ['name' => '[composer package]', 'tags' => 'php · composer', 'url' => '#'],
            ['name' => 'phpete.com', 'tags' => 'this page · source', 'url' => 'https://github.com/phpete1/phpete.com'],
        ];

        return view('projects', ['projects' => $projects]);
    }
}
