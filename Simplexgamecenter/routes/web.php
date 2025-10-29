<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GameController::class, 'show'])->name('games.show');

Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');
Route::post('/rental/payment-token', [RentalController::class, 'paymentToken'])->name('rental.payment-token');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Games CRUD
    Route::get('/games', [GameController::class, 'adminIndex'])->name('admin.games.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('admin.games.create');
    Route::post('/games', [GameController::class, 'store'])->name('admin.games.store');
    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('admin.games.edit');
    Route::put('/games/{game}', [GameController::class, 'update'])->name('admin.games.update');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('admin.games.destroy');

    // Consoles CRUD
    Route::get('/consoles', [ConsoleController::class, 'adminIndex'])->name('admin.consoles.index');
    Route::get('/consoles/create', [ConsoleController::class, 'create'])->name('admin.consoles.create');
    Route::post('/consoles', [ConsoleController::class, 'store'])->name('admin.consoles.store');
    Route::get('/consoles/{console}/edit', [ConsoleController::class, 'edit'])->name('admin.consoles.edit');
    Route::put('/consoles/{console}', [ConsoleController::class, 'update'])->name('admin.consoles.update');
    Route::delete('/consoles/{console}', [ConsoleController::class, 'destroy'])->name('admin.consoles.destroy');
});
