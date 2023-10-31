<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\indexController;

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

Route::get('/', [indexController::class, 'index'])->name('welcomepage');


// Auth::routes();

Route::get('/register_form', [registerController::class, 'create'])->name('register_form');
Route::post('/register', [registerController::class, 'store'])->name('register');

Route::get('/login_form', [loginController::class, 'create'])->name('login_form');
Route::post('/login', [loginController::class, 'authenticate'])->name('login');

Route::get('/logout', [loginController::class, 'destroy'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
