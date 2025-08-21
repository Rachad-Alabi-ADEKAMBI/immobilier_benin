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

Route::get('/dashboardAdmin', function () {
    return view('pages/back/admin/dashboardAdmin');
})->middleware(['auth', 'verified'])->name('dashboardAdmin');

Route::get('/dashboardUser', function () {
    return view('pages/back/user/dashboard');
})->middleware(['auth', 'verified'])->name('dashboardUser');

Route::get('/newAd', function () {
    if (!Auth::check() || Auth::user()->role !== 'user') {
        return redirect()->route('login');
    }

    return view('pages/back/user/newAd');
})->middleware(['auth', 'verified'])->name('newAd');

Route::get('/settingsUser', function () {
    if (!Auth::check() || Auth::user()->role !== 'user') {
        return redirect()->route('login');
    }

    return view('pages/back/user/settingsUser');
})->middleware(['auth', 'verified'])->name('settingsUser');


Route::get('/myAds', function () {
    if (!Auth::check() || Auth::user()->role !== 'user') {
        return redirect()->route('login');
    }

    return view('pages/back/user/myAds');
})->middleware(['auth', 'verified'])->name('myAds');

Route::get('/myNotifications', function () {
    if (!Auth::check() || Auth::user()->role !== 'user') {
        return redirect()->route('login');
    }

    return view('pages/back/user/myNotifications');
})->middleware(['auth', 'verified'])->name('myNotifications');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
