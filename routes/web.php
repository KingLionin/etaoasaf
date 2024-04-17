<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LegalManagementController;

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

Route::get('/etaoasaf/login', [App\Http\Controllers\LoginController::class, 'loginpage'])->name('login.page');
Route::post('/etaoasaf/login/login-verification', [App\Http\Controllers\LoginController::class, 'loginvalidation'])->name('login.valid');

Route::middleware('auth')->group(function () {

    Route::get('/etaoasaf/dashboard', [App\Http\Controllers\SideNavController::class, 'dashboard'])->name('dashboard.page');

    Route::get('/etaoasaf/employee_termination_and_offboarding/offboarding', [App\Http\Controllers\SideNavController::class, 'offboardingpage'])->name('offboarding.page');
    Route::get('/etaoasaf/employee_termination_and_offboarding/offboarding/requests', [App\Http\Controllers\SideNavController::class, 'requestspage'])->name('requests.page');
    Route::get('/etaoasaf/employee_termination_and_offboarding/termination', [App\Http\Controllers\SideNavController::class, 'terminationpage'])->name('termination.page');

    Route::get('/etaoasaf/profile', [App\Http\Controllers\SideNavController::class, 'profilepage'])->name('profile.page');

    Route::get('/etaoasaf/employee_survey_and_feedback/survey/create_survey', [App\Http\Controllers\SideNavController::class, 'createsurveyforms'])->name('createsurvey.page');
    Route::get('/etaoasaf/employee_survey_and_feedback/survey', [App\Http\Controllers\SideNavController::class, 'surveypage'])->name('survey.page');
    Route::get('/etaoasaf/employee_survey_and_feedback/feedback/employee_response', [App\Http\Controllers\SideNavController::class, 'employeeresponse'])->name('employeeresponse.page');

    Route::post('/submit-form', [App\Http\Controllers\Api\OffboardingRequestsController::class, 'submitRequest'])->name('submit.form');

    Route::delete('/delete-requests/{id}', [App\Http\Controllers\Api\OffboardingRequestsController::class, 'deleterequest'])->name('requests.delete');

    Route::post('/legal-management-approval/send', [App\Http\Controllers\LegalManagementController::class, 'sendApproval'])->name('legal-management-approval.send');

    Route::get('/etaoasaf/logout', [App\Http\Controllers\SideNavController::class, 'logoutprocess'])->name('logout');
});
