<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
// Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('users', UserController::class);
//     Route::resource('position', PositionController::class);
// });
