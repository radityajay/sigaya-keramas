<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CagarBudayaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/cagar-budaya/{id}/detail', [HomeController::class, 'show'])->name('detail.cagarbudaya');
Route::get('/list/cagar-budaya', [HomeController::class, 'list_cagarbudaya'])->name('list.cagarbudaya');

Route::resource('cagarbudaya', CagarBudayaController::class);
