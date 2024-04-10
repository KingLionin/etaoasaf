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
    return view('auth/login');
});

Route::get('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login/login-verification', [App\Http\Controllers\LoginController::class, 'loginvalidation'])->name('login.valid');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\SideNavController::class, 'dashboard'])->name('dashboard');

    Route::get('/employee_termination_and_offboarding/offboarding', [App\Http\Controllers\SideNavController::class, 'offboardingpage'])->name('offboarding.page');
    Route::get('/employee_termination_and_offboarding/offboarding/requests', [App\Http\Controllers\SideNavController::class, 'requestspage'])->name('requests.page');
    Route::get('employee_termination_and_offboarding/termination', [App\Http\Controllers\SideNavController::class, 'terminationpage'])->name('termination.page');

    Route::get('profile', [App\Http\Controllers\SideNavController::class, 'profilepage'])->name('profile.page');

    Route::get('employee_survey_and_feedback/survey/create_survey', [App\Http\Controllers\SideNavController::class, 'createsurveyforms'])->name('createsurvey.page');
    Route::get('employee_survey_and_feedback/survey', [App\Http\Controllers\SideNavController::class, 'surveypage'])->name('survey.page');
    Route::get('employee_survey_and_feedback/feedback/employee_response', [App\Http\Controllers\SideNavController::class, 'employeeresponse'])->name('employeeresponse.page');
});

Route::get('/logout', [App\Http\Controllers\SideNavController::class, 'logout'])->name('backtologin.page');