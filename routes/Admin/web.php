<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Admin Routes
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

        Route::prefix('admin')->middleware(['auth', 'is_admin'])->group( function(){

            // Home Route
            Route::get('/home', [HomeController::class, 'admin_home'])->name('admin.home');

            // Users Route
            Route::resource('users', UserController::class)->except([
                'show'
            ])->parameters([
                'users' => 'id',
            ]);

            // Setting Route
            Route::resource('setting', SettingController::class)->only([
                'edit', 'update'
            ])->parameters([
                'setting' => 'id'
            ]);

        });

    });
