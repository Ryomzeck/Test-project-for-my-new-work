<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Models\Slide;

Route::get('/', function () {
    return view('apps_scrumboard');
})->middleware('auth')->name('apps_scrumboard');


Route::get('/login', function () {
    return view('auth.login');
})->middleware(['auth', 'verified'])->name('auth.login');

Route::get('/register', function () {
    return view('auth.register');
}) ->name('register');

Route::get('/index', function () {
    $slides = Slide::all();

    return view('index', compact('slides'));
})->name('index');



 Route::get('/sliderRedactorPage', function () {
    return view('sliderRedactorPage');
}) ->name('sliderRedactorPage');

# Route::get('/slides', [SliderController::class, 'getAllSlides']);


Route::post('/slides', [SliderController::class, 'store'])
    ->name('slides.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
