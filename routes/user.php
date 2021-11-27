<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\JobController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\JobManipulationController;
use App\Http\Controllers\User\ApplicationController;

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


//routes for jobs
Route::resource('/jobs', JobController::class)->only([
    'index', 'show'
]);;

//
Route::post('/job/apply', [ApplicationController::class, 'apply'])->name('job.apply');

// logout routes for user
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); 