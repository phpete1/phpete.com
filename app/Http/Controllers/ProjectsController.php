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
        /** @var list<array{name: string, tags: string, url: ?string, soon: bool}> $projects */
        $projects = [
            ['name' => 'phpete1/scholi', 'tags' => 'saas · schools', 'url' => null, 'soon' => true],
            ['name' => 'phpete1/phpete.com', 'tags' => 'this page · source', 'url' => 'https://github.com/phpete1/phpete.com', 'soon' => false],
            ['name' => 'phpete1/setting-store', 'tags' => 'php · composer', 'url' => null, 'soon' => false],
        ];

        return view('projects', ['projects' => $projects]);
    }
}
