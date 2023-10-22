<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'loginForm' ])->name('login');
Route::get('/register', [AuthController::class, 'registerForm' ]);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login');


     Route::get('/animals', [AnimalController::class, 'index'])->middleware('auth.dashboard', 'guest')->name('animals.index');
     Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
     Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');
     Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');
     Route::get('/animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
     Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals.update');
     Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
     Route::get('/animal-logs', [LogController::class, 'index'])->middleware('auth.dashboard', 'guest')->name('animal-logs');



Route::get('verification/{user}/{token}', [AuthController::class, 'verification']);






