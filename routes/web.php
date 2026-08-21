<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/apps_scrumboard', function () {
    return view('apps_scrumboard');
})->middleware(['auth', 'verified'])->name('apps_scrumboard');

Route::get('/register', function () {
    return view('auth.register');
}) ->name('register');

Route::get('/registerSuccess', function () {
    return view('auth.registerSuccess');
}) ->name('registerSuccess');

Route::get('/index', function () {
    return view('index');
}) ->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
