<?php

use App\Http\Controllers\Web\AuthController;
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


Route::get( '/login',  [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::get( '/register',  [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::get( '/dashboard',  [AuthController::class, 'dashboard'])->name('auth.dashboard');
Route::get( '/accounts',  [AuthController::class, 'account'])->name('account');


