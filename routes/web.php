<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login/login-verification', [App\Http\Controllers\LoginController::class, 'loginvalidation'])->name('login.valid');

Route::middleware('auth')->group(function () {
    Route::get('/etaodashboard', [App\Http\Controllers\SideNavController::class, 'ETAODashboard'])->name('etao.dashboard');
    Route::get('/esafdashboard', [App\Http\Controllers\SideNavController::class, 'ESAFDashboard'])->name('esaf.dashboard');
    Route::get('/offboarding', [App\Http\Controllers\SideNavController::class, 'offboardingpage'])->name('offboarding.page');
    Route::get('/requests', [App\Http\Controllers\SideNavController::class, 'requestspage'])->name('requests.page');
    Route::get('/termination', [App\Http\Controllers\SideNavController::class, 'terminationpage'])->name('termination.page');
    Route::get('/profile', [App\Http\Controllers\SideNavController::class, 'profilepage'])->name('profile.page');
});

Route::get('/logout', [App\Http\Controllers\SideNavController::class, 'logout'])->name('backtologin.page');