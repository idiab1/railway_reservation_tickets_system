<?php

use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TrainController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\Train\ClassesController as TrainClassesController;
use App\Http\Controllers\Admin\PostController;

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
            Route::get('/home', [AdminHomeController::class, 'admin_home'])->name('admin.home');

            // Users Route
            Route::resource('users', UserController::class)->except([
                'show'
            ])->parameters([
                'users' => 'id',
            ]);

            // Stations Route
            Route::resource('stations', StationController::class)->except([
                'show'
            ])->parameters([
                'stations' => 'id',
            ]);

            // Trains Route
            Route::resource('trains', TrainController::class)->except([
                'show'
            ])->parameters([
                'trains' => 'id',
            ]);

            Route::resource('trains/{id}/types', TrainClassesController::class)->only([
                'create', 'store'
            ])->names([
                'create' => 'trains.types.create',
                'store' => 'trains.types.store',
            ]);

            // Classes / Types  Route
            Route::resource('classes', ClassesController::class)->only([
                'index', 'destroy'
            ])->parameters([
                'classes' => 'id',
            ]);

            // Posts Route
            Route::resource('posts', PostController::class)->except([
                'show'
            ])->parameters([
                'posts' => 'id',
            ]);

            // Setting Route
            Route::resource('setting', SettingController::class)->only([
                'edit', 'update'
            ])->parameters([
                'setting' => 'id'
            ]);

            // Contact Route
            Route::resource('contact', ContactController::class)->only([
                'index', 'show', 'destroy'
            ])->parameters([
                'contact' => 'id',
            ]);

        });

    });
