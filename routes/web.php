<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ HOME - Laatste projecten
Route::get('/', [ProjectController::class, 'home'])->name('home');

// ✅ Optioneel: redirect /home naar /
Route::get('/home', function () {
    return redirect()->route('home');
})->name('home.redirect');

// ✅ PUBLIEKE PROJECTEN LIJST
Route::get('/projects', [ProjectController::class, 'viewProjects'])->name('projects.index');

// ✅ DASHBOARD (alleen voor ingelogde users)
Route::get('/dashboard', [ProjectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ✅ PROJECT CRUD (alleen voor ingelogde users)
Route::middleware(['auth'])->group(function () {
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

// ✅ CONTACT FORMULIER
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');

// ✅ PROFIELINSTELLINGEN (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ BREEZE AUTH ROUTES
require __DIR__.'/auth.php';
