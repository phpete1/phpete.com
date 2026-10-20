<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * Show the about page (the homepage).
     */
    public function __invoke(): View
    {
        return view('about');
    }
}
