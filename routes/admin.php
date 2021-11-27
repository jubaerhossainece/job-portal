<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\JobManipulationController;
use App\Http\Controllers\Admin\ApplicantController;

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

Route::get('/dashboard', DashboardController::class)->name('dashboard');

//logout routes for admin panel
Route::get('/admin-logout', [AdminLoginController::class, 'adminLogout'])->name('admin-logout');

//routes fro job type
Route::resource('/job-types', JobTypeController::class);

//routes for jobs
Route::resource('/jobs', JobController::class);
//routes to change job status
Route::get('/job/status-change/{id}', [JobManipulationController::class, 'changeStatus'])->name('job.status-change');

Route::get('/job/{id}/applicants', [ApplicantController::class, 'applicantList'])->name('job.applicant.list');
Route::get('/job/{job_id}/applicant/{user_id}', [ApplicantController::class, 'singleApplicant'])->name('job.applicant.single');
