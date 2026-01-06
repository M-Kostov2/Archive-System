<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveFileController;
use App\Http\Controllers\EventController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::middleware(['auth'])->group(function () {
    Route::get('/archives', [ArchiveFileController::class, 'index'])->name('archives.index');
});

   Route::middleware(['auth'])->group(function () {
    Route::resource('events', EventController::class);

   });
Route::middleware(['auth'])->group(function () {
    Route::post('/events/{event}/archives', [ArchiveFileController::class, 'store'])
        ->name('archives.store');
});

    Route::delete('/archives/{archiveFile}', [ArchiveFileController::class, 'destroy'])
        ->name('archives.destroy');



require __DIR__.'/auth.php'; 
