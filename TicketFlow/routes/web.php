<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\StatisticsController;
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
            return view('admins.index');
        }elseif(Auth::user()->role === 'client'){
            return view('clients.index');
        }
        return view('developpers.index');
    });

    /* Client routes */
    Route::prefix('clients')->as('clients.')->middleware( 'client')->group(function () {
        /* Home route */
        Route::get('/', [ClientController::class, 'index'])->name('index');
        /* Filter routes */
        Route::post('/search', [FilterController::class, 'clientSearch'])->name('search');
        Route::post('/ticketsByPriority', [FilterController::class, 'getClientTicketsByPriority'])->name('ticketsByPriority');
        Route::post('/ticketsByStatus', [FilterController::class, 'getClientTicketsByStatus'])->name('ticketsByStatus');
    });

    /* Admin routes */
    Route::prefix('admins')->as('admins.')->middleware('admin')->group(function () {
        /* Home route */
        Route::get('/', [AdminController::class, 'index'])->name('index');
        /* Filter routes */
        Route::post('/search', [FilterController::class, 'adminSearch'])->name('search');
        Route::post('/ticketsByPriority', [FilterController::class, 'getAdminTicketsByPriority'])->name('ticketsByPriority');
        Route::post('/ticketsByStatus', [FilterController::class, 'getAdminTicketsByStatus'])->name('ticketsByStatus');
        /* Statistic route */
        Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
    });

    /* Developper routes */
    Route::prefix('developpers')->as('developpers.')->middleware('developper')->group(function () {
        /* Home route */
        Route::get('/', [DeveloperController::class, 'index'])->name('index');
        /* Filter routes */
        Route::post('/search', [FilterController::class, 'developerSearch'])->name('search');
        Route::post('/ticketsByPriority', [FilterController::class, 'getDeveloperTicketsByPriority'])->name('ticketsByPriority');
        Route::post('/ticketsByStatus', [FilterController::class, 'getDeveloperTicketsByStatus'])->name('ticketsByStatus');
    });
});
