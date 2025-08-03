<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/front/home');
})->name('home');

Route::get('/home', function () {
    return view('pages.front.home');
})->name('home');

Route::get('/ads', function () {
    return view('pages.front.ads');
})->name('ads');

Route::get('/dashboard', function () {
    return view('pages/front/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
