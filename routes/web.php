<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployerJobsController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\JobseekerJobsController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','auth'])->name('dashboard');

Route::get('jobs/', [JobsController::class, 'index'])->name('jobs');
Route::post('jobs/', [JobsController::class, 'checkboxFilter']);
Route::get('jobs/{job:slug}', [JobsController::class, 'show']);
Route::post('jobs/applyForm',[ApplicationsController::class, 'applyForm'])->middleware(['auth']);
Route::post('jobs/apply/{job}',[ApplicationsController::class, 'apply'])->middleware(['auth']);

Route::get('people/', [TalentController::class, 'index'])->name('people');
Route::post('people/', [TalentController::class, 'searchFilter']);
Route::get('people/{user:username}', [TalentController::class, 'show']);

Route::get('jobseeker/profile', [JobseekerController::class, 'index'])->middleware(['auth'])->name('jobseekerProfile');
Route::get('jobseeker/updateProfile', [JobseekerController::class, 'show'])->middleware(['auth']);
Route::post('jobseeker/updateProfile', [JobseekerController::class, 'update']);

Route::get('employer/profile', [EmployerController::class, 'index'])->middleware(['auth'])->name('employerProfile');
Route::get('employer/updateProfile', [EmployerController::class, 'show'])->middleware(['auth']);
Route::post('employer/updateProfile', [EmployerController::class, 'update']);
Route::get('employer/background/{user:username}', [EmployerController::class, 'showEmployer']);

Route::get('jobseeker/applications', [ApplicationsController::class,'index'])->middleware(['auth'])->name('jobseekerApplied');

require __DIR__.'/auth.php';
require __DIR__.'/myJobs.php';

Route::fallback(function() {
    return view('errors.404');
});

