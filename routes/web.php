<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MicrosoftAuthController;

Route::get('/', function () {
    return view('welcome');
});


// Microsoft Auth Routes
Route::get('/auth/microsoft/redirect', [MicrosoftAuthController::class, 'redirect'])
    ->name('microsoft.redirect');

Route::get('/auth/microsoft/callback', [MicrosoftAuthController::class, 'callback'])
    ->name('microsoft.callback');

// A protected dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Logout Route
Route::post('/logout', [MicrosoftAuthController::class, 'logout'])
    ->middleware('auth')->name('logout');
