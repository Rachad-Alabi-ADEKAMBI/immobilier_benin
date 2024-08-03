<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\NeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/home', [HomeController::class, 'home']);

Route::get('/about', function () {
    return view('pages/front/about');
})->name('about');;

Route::get('/ads', function () {
    return view('pages/front/ads');
})->name('ads');

Route::get('/ad/{id}', [AdController::class, 'adView']);

Route::get('/advertisers', function () {
    return view('pages/front/advertisers');
})->name('advertisers');

Route::get('/advertiser/{id}', function () {
    return view('pages/front/advertiser');
})->name('advertiser');

Route::get('/advertiserApi/{id}', [UserController::class, 'advertiserApi']);

Route::get('/contact', function () {
    return view('pages/front/contact');
})->name('contact');

Route::get('/newAd', function () {
    return view('pages/back/user/newAd');
})->name('newAd');;

Route::post('newAdApi', [AdController::class, 'create'])
    ->name('newAdApi.create');

Route::get('/needs', function () {
    return view('pages/back/user/needs');
})->name('needs');

Route::get('/profile', function () {
    return view('pages/back/user/profile');
})->name('profile');

Route::get('/cgu', function () {
    return view('pages/front/cgu');
})->name('cgu');

Route::get('/terms', function () {
    return view('pages/front/terms');
})->name('terms');

Route::get('/faq', function () {
    return view('pages/front/faq');
})->name('faq');

Route::get('/users', function () {
    return view('pages/back/admin/users');
})->name('users');

Route::get('/needs_admin', function () {
    return view('pages/back/admin/needs_admin');
})->name('needs_admin');

Route::get('/myAdsApi', [AdController::class, 'myAdsApi']);

Route::get('/advertisersApi', [UserController::class, 'advertisersApi']);

Route::get('/availableAdsApi', [AdController::class, 'availableAdsApi']);

Route::get('/availableToRentApi', [AdController::class, 'availableToRentApi']);

Route::get('/availableToSellApi', [AdController::class, 'availableToSellApi']);

Route::get('/allAdsApi', [AdController::class, 'allAdsApi']);

Route::get('/needsApi', [NeedController::class, 'needsApi']);

Route::post('/search', [AdController::class, 'search']);

Route::get('/usersApi', [UserController::class, 'usersApi']);

Route::get('/adApi/{id}', [AdController::class, 'adApi']);

Route::get('/deleteUserApi/{id}', [UserController::class, 'deleteUserApi']);

Route::post('/stopAdApi', [AdController::class, 'stopAdApi']);

Route::post('/authorizeAdApi/{id}', [AdController::class, 'authorizeAdApi']);

Route::post('/updateAdApi', [AdController::class, 'updateAdApi']);

Route::post('/banUserApi', [UserController::class, 'banUserApi']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard_admin', [DashboardAdminController::class, 'index'])->name('dashboard_admin');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('/pages/back/user/dashboard');
    })->name('dashboard');
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard_admin');
        } else {
            return redirect()->route('dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Identifiant ou mot de passe incorrect',
    ]);
})->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');



