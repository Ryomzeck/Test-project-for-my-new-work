<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Models\Slide;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;

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
    $slides = Slide::orderBy('sort_order')->get();

    return view('index', compact('slides'));
})->name('index');


Route::get('/galleryPage', function () {
    return view('galleryPage');
})->name('galleryPage');

Route::get('/galleryRedactorPage', function () {
    return view('galleryRedactorPage');
})->name('galleryRedactorPage');



//  Route::get('/sliderRedactorPage', function () {
//     return view('sliderRedactorPage');
// }) ->name('sliderRedactorPage');

Route::get('/sliderRedactorPage', [SliderController::class, 'redactor'])
    ->name('sliderRedactorPage');
# Route::get('/slides', [SliderController::class, 'getAllSlides']);

Route::PUT('/slides/{slide}', [SliderController::class, 'update'])
    ->name('slides.update');

Route::delete('/slides/{slide}', [SliderController::class, 'destroy'])
    ->name('slides.destroy');

Route::post('/slides', [SliderController::class, 'store'])
    ->name('slides.store');

    Route::post('/photos', [SliderController::class, 'store'])
    ->name('photos.store');

    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])
    ->name('slides.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
require __DIR__.'/auth.php';
