<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WhoIsJesusController;
use Illuminate\Support\Facades\Route;

// Preloaded pages are reused from the browser cache, so let it keep them for a minute.
Route::middleware('cache.headers:private;max_age=60')->group(function () {
    Route::get('/', AboutController::class)->name('home');
    Route::get('/projects', ProjectsController::class)->name('projects');
    Route::get('/who-is-jesus', WhoIsJesusController::class)->name('who-is-jesus');
});
