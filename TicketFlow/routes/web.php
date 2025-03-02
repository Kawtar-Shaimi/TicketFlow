<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsignementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/* Auth routes */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::prefix('/')->middleware('auth')->group(function () {
    /* Logout route */
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    /* Home redirection route */
    Route::get('/',function(){
        if (Auth::user()->role === 'admin'){
            return redirect()->route('admins.index');
        }elseif(Auth::user()->role === 'client'){
            return redirect()->route('clients.index');
        }
        return redirect()->route('developers.index');
    })->name('home');

    /* Client routes */
    Route::prefix('clients')->as('clients.')->middleware( 'client')->group(function () {
        /* Home route */
        Route::get('/', [ClientController::class, 'index'])->name('index');
        /* Filter routes */
        Route::post('/filter', [FilterController::class, 'clientFilter'])->name('filter');
    });

    /* Admin routes */
    Route::prefix('admins')->as('admins.')->middleware('admin')->group(function () {
        /* Home route */
        Route::get('/', [AdminController::class, 'index'])->name('index');
        /* Filter route */
        Route::post('/filter', [FilterController::class, 'adminFilter'])->name('filter');
        /* Statistic route */
        Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
    });

    /* Developper routes */
    Route::prefix('developers')->as('developers.')->middleware('developer')->group(function () {
        /* Home route */
        Route::get('/', [DeveloperController::class, 'index'])->name('index');
        /* Filter route */
        Route::post('/filter', [FilterController::class, 'developerFilter'])->name('filter');
    });

    /* Tickets routes */
    Route::prefix('tickets')->as('tickets.')->group(function () {
        /* Create route */
        Route::get('/create', [TicketController::class, 'create'])->name('create');
        Route::post('/store', [TicketController::class, 'store'])->name('store');
        /* Change status route */
        Route::get('/{ticket}/changeStatus', [TicketController::class, 'changeStatusView'])->name('changeStatusView');
        Route::put('/{ticket}/changeStatus', [TicketController::class, 'changeStatus'])->name('changeStatus');
    });

    /* Asignements routes */

    Route::prefix('asignements')->as('asignements.')->group(function () {
        /* Create route */
        Route::get('/{ticket}/create', [AsignementController::class, 'create'])->name('create');
        Route::post('/{ticket}/store', [AsignementController::class, 'store'])->name('store');
    });
});
