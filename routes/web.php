<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/signup', [SignupController::class, 'create'])->name('signup');
Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::get('/car/search', [CarController::class,'search'])->name('car.search');
Route::get('/car/watchlist', [CarController::class,'watchlist'])->name('car.watchlist');

Route::resource('car', CarController::class);
