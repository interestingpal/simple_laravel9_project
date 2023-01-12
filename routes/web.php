<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobStatusesController;
use App\Http\Controllers\JobTypesController;
use App\Http\Controllers\JobsController;

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
     return redirect('/dashboard/admin');
 });

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AccountController::class)
        ->prefix('account')
        ->as('account.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/testr', 'testr')->name('testr');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'add', 'addAccount')->name('add');
            Route::match(['get','post'],'{id}/update', 'updateAccount')->name('edit');
            Route::delete('{id}/hapus', 'deleteAccount')->name('delete');
        });
});

Route::group([
    'prefix' => 'job_statuses',
], function () {
    Route::get('/', [JobStatusesController::class, 'index'])
         ->name('job_statuses.job_status.index');
    Route::get('/create', [JobStatusesController::class, 'create'])
         ->name('job_statuses.job_status.create');
    Route::get('/show/{jobStatus}',[JobStatusesController::class, 'show'])
         ->name('job_statuses.job_status.show')->where('id', '[0-9]+');
    Route::get('/{jobStatus}/edit',[JobStatusesController::class, 'edit'])
         ->name('job_statuses.job_status.edit')->where('id', '[0-9]+');
    Route::post('/', [JobStatusesController::class, 'store'])
         ->name('job_statuses.job_status.store');
    Route::put('job_status/{jobStatus}', [JobStatusesController::class, 'update'])
         ->name('job_statuses.job_status.update')->where('id', '[0-9]+');
    Route::delete('/job_status/{jobStatus}',[JobStatusesController::class, 'destroy'])
         ->name('job_statuses.job_status.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'job_types',
], function () {
    Route::get('/', [JobTypesController::class, 'index'])
         ->name('job_types.job_type.index');
    Route::get('/create', [JobTypesController::class, 'create'])
         ->name('job_types.job_type.create');
    Route::get('/show/{jobType}',[JobTypesController::class, 'show'])
         ->name('job_types.job_type.show')->where('id', '[0-9]+');
    Route::get('/{jobType}/edit',[JobTypesController::class, 'edit'])
         ->name('job_types.job_type.edit')->where('id', '[0-9]+');
    Route::post('/', [JobTypesController::class, 'store'])
         ->name('job_types.job_type.store');
    Route::put('job_type/{jobType}', [JobTypesController::class, 'update'])
         ->name('job_types.job_type.update')->where('id', '[0-9]+');
    Route::delete('/job_type/{jobType}',[JobTypesController::class, 'destroy'])
         ->name('job_types.job_type.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'jobs',
], function () {
    Route::get('/', [JobsController::class, 'index'])
         ->name('jobs.job.index');
    Route::get('/create', [JobsController::class, 'create'])
         ->name('jobs.job.create');
    Route::get('/show/{job}',[JobsController::class, 'show'])
         ->name('jobs.job.show')->where('id', '[0-9]+');
    Route::get('/{job}/edit',[JobsController::class, 'edit'])
         ->name('jobs.job.edit')->where('id', '[0-9]+');
    Route::post('/', [JobsController::class, 'store'])
         ->name('jobs.job.store');
    Route::put('job/{job}', [JobsController::class, 'update'])
         ->name('jobs.job.update')->where('id', '[0-9]+');
    Route::delete('/job/{job}',[JobsController::class, 'destroy'])
         ->name('jobs.job.destroy')->where('id', '[0-9]+');
});
