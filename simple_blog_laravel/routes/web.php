<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/blog', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/blog/{review:slug}', [ReviewController::class, 'show'])->name('reviews.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});
