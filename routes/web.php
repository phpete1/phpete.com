<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WhoIsJesusController;
use Illuminate\Support\Facades\Route;

Route::get('/', AboutController::class)->name('home');
Route::get('/projects', ProjectsController::class)->name('projects');
Route::get('/who-is-jesus', WhoIsJesusController::class)->name('who-is-jesus');
