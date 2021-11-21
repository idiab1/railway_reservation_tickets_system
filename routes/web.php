<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        // Authantication routes
        Auth::routes();

        // Home Route
        Route::redirect('/', '/home');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        // Profile user routes
        Route::resource('profile', ProfileController::class)->only([
            'index', 'update'
        ])->parameters([
            'profile' => 'id'
        ]);
        Route::get('profile/setting', [ProfileController::class, 'setting'])->name('profile.setting');

        // Contact Route
        Route::resource('contact', ContactController::class)->only([
            'index', 'store'
        ]);

    });
