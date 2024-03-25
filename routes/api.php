<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user(); // This route will return the authenticated user
    });
});

Route::get('offboarding/requests/count', [App\Http\Controllers\Api\OffboardingRequestsController::class, 'count'])->name('offboarding.requests.count');
Route::post('receive-offboarding-request', [App\Http\Controllers\Api\OffboardingRequestsController::class, 'receive'])->name('receive-offboarding-request');

