<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsoleController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GameController::class, 'show'])->name('games.show');

Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');
Route::post('/rental/payment-token', [RentalController::class, 'paymentToken'])->name('rental.payment-token');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::prefix('admin')->name('admin.')->group(function () {
    // Games CRUD (admin)
    Route::get('/games', [GameController::class, 'adminIndex'])->name('games.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

    // Consoles CRUD
    Route::get('/consoles', [ConsoleController::class, 'adminIndex'])->name('consoles.index');
    Route::get('/consoles/create', [ConsoleController::class, 'create'])->name('consoles.create');
    Route::post('/consoles', [ConsoleController::class, 'store'])->name('consoles.store');
    Route::get('/consoles/{console}/edit', [ConsoleController::class, 'edit'])->name('consoles.edit');
    Route::put('/consoles/{console}', [ConsoleController::class, 'update'])->name('consoles.update');
    Route::delete('/consoles/{console}', [ConsoleController::class, 'destroy'])->name('consoles.destroy');
});
