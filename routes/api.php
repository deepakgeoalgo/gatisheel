<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TechnicianController;
use App\Http\Controllers\API\InstallationController;
use App\Http\Controllers\API\CreateIssueController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function(){
	Route::get('details', [UserController::class, 'details']);

	Route::get('users', [TechnicianController::class,'index'])->name('users.index');    

    // Installation form
    Route::get('installations', [InstallationController::class,'installationList'])->name('installations.index');
    Route::post('installations', [InstallationController::class,'installationStore'])->name('installations.store');
    Route::post('installations/edit/{id?}', [InstallationController::class,'installationEdit'])->name('installations.edit');
    Route::post('installations/update/{id?}', [InstallationController::class,'installationUpdate'])->name('installations.update');
    Route::post('installations/destroy/{id?}', [InstallationController::class,'installationDestroy'])->name('installations.destroy');

    // Create Issue
    Route::get('issues', [CreateIssueController::class,'issueList'])->name('issues.index');
    Route::post('issues', [CreateIssueController::class,'issueStore'])->name('issues.store');
    Route::post('issues/edit/{id?}', [CreateIssueController::class,'issueEdit'])->name('issues.edit');
    Route::post('issues/update/{id?}', [CreateIssueController::class,'issueUpdate'])->name('issues.update');
    Route::post('issues/destroy/{id?}', [CreateIssueController::class,'issueDestroy'])->name('issues.destroy');
});



