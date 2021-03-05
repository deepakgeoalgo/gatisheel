<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TechnicianController;
use App\Http\Controllers\API\InstallationController;
use App\Http\Controllers\API\CreateIssueController;
use App\Http\Controllers\API\AssignIssueController;
use App\Http\Controllers\API\CustomerController;

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
    Route::post('installation-list', [InstallationController::class,'installationList']);
    Route::post('installation-form', [InstallationController::class,'installationStore']);
    Route::post('install-new-machine', [InstallationController::class,'installNewMachin']);    
    Route::post('installations/edit', [InstallationController::class,'installationEdit']);
    Route::post('installations/update', [InstallationController::class,'installationUpdate']);
    Route::post('installations/destroy', [InstallationController::class,'installationDestroy']);

    // Dashboard
    Route::post('total-issue', [InstallationController::class,'totalIssue']);


    // Create Issue
    Route::post('issues', [CreateIssueController::class,'issueList'])->name('issues.index');
    Route::post('create-issue', [CreateIssueController::class,'issueStore'])->name('issues.store');
    Route::post('issues/edit', [CreateIssueController::class,'issueEdit'])->name('issues.edit');
    Route::post('issues/update', [CreateIssueController::class,'issueUpdate'])->name('issues.update');
    Route::post('issues/destroy', [CreateIssueController::class,'issueDestroy'])->name('issues.destroy');

    // Technician Issue List
    Route::get('technician-issue-list', [CreateIssueController::class,'technicianIssuList']);
    Route::post('technician-issue-submit', [CreateIssueController::class,'technicianIssuSubmit']);

    // Assign Ticket
    Route::get('asign-issues', [AssignIssueController::class,'issueAssignList'])->name('asign-issues.index');
    Route::post('asign-issues', [AssignIssueController::class,'issueAssignListStore'])->name('asign-issues.store');
    Route::post('asign-issues/edit/{id?}', [AssignIssueController::class,'issueAssignListEdit'])->name('asign-issues.edit');
    Route::post('asign-issues/update/{id?}', [AssignIssueController::class,'issueAssignListUpdate'])->name('asign-issues.update');
    Route::post('asign-issues/destroy/{id?}', [AssignIssueController::class,'issueAssignListDestroy'])->name('asign-issues.destroy');

    // Customer
    Route::post('customer-machine-list', [CustomerController::class,'machineList']);
    Route::post('customer-create-issue', [CustomerController::class,'customerCreateIssue']);
    Route::post('customer-update-issue', [CustomerController::class,'customerUpdateIssue']);
    Route::post('customer-issue-list', [CustomerController::class,'customerIssueList']);
    // Customer Reference
    Route::post('customer-reference', [CustomerController::class,'refereStore']);
});



