<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/jobs', [JobPostingController::class, 'getAllJobPosting']);

Route::get('/jobs/{id}', [JobPostingController::class, 'getJobPostingById']);

Route::post('/jobs', [JobPostingController::class, 'createNewJobPosting']);

Route::put('/jobs', [JobPostingController::class, 'updateJobPostingById']);

Route::delete('/jobs', [JobPostingController::class, 'deleteJobPostingById']);
