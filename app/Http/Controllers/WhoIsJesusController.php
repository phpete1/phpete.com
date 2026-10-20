<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class WhoIsJesusController extends Controller
{
    /**
     * Show the "Who is Jesus?" page.
     */
    public function __invoke(): View
    {
        return view('who-is-jesus');
    }
}
