<?php

use App\Http\Controllers\Payment\CreditController;
use App\Http\Controllers\Subscriptions\PaymentController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
// use App\Http\Controllers\TicketController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
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

        // Tickets Route
        Route::resource('tickets', TicketController::class)->only([
            'index'
        ])->parameters([
            'tickets' => "id"
        ])->names([
            "index" => "user.tickets.index",
        ]);

        // Ticket Search
        Route::get('/ticketSearch', [App\Http\Controllers\TicketController::class, "ticketSearch"])->name("ticketSearch");

        // Route::get('tickets/reserve', [TicketController::class, 'create'])->name('tickets.reserve');
        Route::get('tickets/{type}/types', [TypeController::class, "ticketTypes"])->name("type.ticket");

        Route::get('tickets/types', [TypeController::class, "allTypes"])->name("all.types");

        Route::resource('tickets/{train}/reserve', ReservationController::class)->parameters([
            "reserve" => "id"
        ]);

        // paymob
        Route::post('/credit/{train}', [CreditController::class, 'credit'])->name('credit');
        Route::get('/callback', [CreditController::class, 'callback'])->name('callback');

        Route::group(['namespace' => 'Subscriptions'], function() {
            Route::get('plans', [SubscriptionController::class, 'index'])->name('plans');
            Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
            Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
        });


        // Posts Routes
        Route::resource('posts', PostController::class)->only([
            'index'
        ])->parameters([
            'posts' => "id"
        ])->names([
            "index" => "user.posts.index",
        ]);

        // Profile user routes
        Route::resource('profile', ProfileController::class)->only([
            'index', 'update'
        ])->parameters([
            'profile' => 'id'
        ]);
        Route::get('profile/setting', [App\Http\Controllers\ProfileController::class, 'setting'])->name('user.profile.setting');

        // Contact Route
        Route::resource('contact', ContactController::class)->only([
            'index', 'store'
        ])->names([
            'index' => 'contact.page',
            'store' => 'contact.store'
        ]);

    });
