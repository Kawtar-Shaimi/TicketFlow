<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;


/* Auth routes */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth,client,developer']);


// Route::post('/home', [ClientController::class, 'index'])->name('index')->middleware(['auth,client']);

/* Client routes */
// Route::middleware(['auth', 'client'])->group(function () {
//     Route::get('/home', [ClientController::class, 'index'])->name('home');
// });

Route::get('/',function(){
    return view('clients.index');
});