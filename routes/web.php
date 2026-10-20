<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\WhoIsJesusController;
use Illuminate\Support\Facades\Route;

Route::get('/', AboutController::class)->name('home');
Route::get('/who-is-jesus', WhoIsJesusController::class)->name('who-is-jesus');
