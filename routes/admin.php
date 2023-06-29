<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CagarBudayaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
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
    return redirect()->route('admin.dashboard');
});

Route::get('login', [AuthController::class, 'index'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('profile', ProfilesController::class);
    Route::resource('position', PositionController::class);
    Route::resource('cagar-budaya', CagarBudayaController::class);
    Route::get('cagar-budaya/{id}/print', [CagarBudayaController::class, 'print'])->name('cagar-budaya.print');
    Route::resource('category', CategoryController::class);
    // Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

});

Route::post('/upload', [CagarBudayaController::class, 'upload'])->name('upload');