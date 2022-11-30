<?php

use App\Http\Controllers\GroupDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentDashboardController;
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
    return inertia('Home');
});
Route::inertia('/about', 'About');

Route::middleware('guest')->group(function() {
    Route::controller(RegisterController::class)->group(function() {
        Route::get('/register', 'index')->name('register');
        Route::post('/register', 'store');
    });
    Route::controller(LoginController::class)->group(function() {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'auth');
    });
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['auth','is_admin'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('dashboard/student',StudentDashboardController::class);
    Route::resource('dashboard/class',GroupDashboardController::class);
});
