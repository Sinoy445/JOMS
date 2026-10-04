<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\UserJobsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/myJobs', [UserJobsController::class,'index'])->name('myJobs');
    Route::get('/myJobs/createNewPost', [UserJobsController::class,'create']);
    Route::get('/myJobs/copyForm', [UserJobsController::class,'copyForm']);// retrieve copy form and dropdown
    Route::post('/myJobs/copyForm', [UserJobsController::class,'selectJob']); // retrieve job details selected from dropdown
    Route::get('/myJobs/createNewPost/{job}', [UserJobsController::class,'copyJob']);
    Route::post('/myJobs/createNewPost', [UserJobsController::class,'store']);
    Route::get('/myJobs/autocomplete', [UserJobsController::class,'autocomplete'])->name('autocompleteMyJobs');
    Route::get('/myJobs/{job}/viewApplications', [UserJobsController::class,'view']);
    Route::get('/myJobs/viewApplications/curriculumVitae/{file}/{name}/downloadCV', [UserJobsController::class,'downloadCV']);
    Route::get('/myJobs/viewApplications/resume/{file}/{name}/downloadResume', [UserJobsController::class,'downloadResume']);
    Route::post('/myJobs/{application}/viewApplications', [ApplicationsController::class,'action']);
    Route::get('/myJobs/{job}/edit',[UserJobsController::class, 'edit']);
    Route::post('/myJobs/{job}/update',[UserJobsController::class, 'update']);
    Route::delete('/myJobs/{job}',[UserJobsController::class, 'destroy']);

});

