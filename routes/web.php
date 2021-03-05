<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InstallationController;
use App\Http\Controllers\CreateIssueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\AssignIssueController;
use App\Http\Controllers\ReferredController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    // User
    Route::get('users', [UserController::class,'index'])->name('users.index');    
    Route::get('users/create', [UserController::class,'create'])->name('users.create');
    Route::post('users', [UserController::class,'store'])->name('users.store');
    Route::get('users/edit/{id?}', [UserController::class,'edit'])->name('users.edit');
    Route::post('users/update/{id?}', [UserController::class,'update'])->name('users.update');
    Route::get('users/destroy/{id?}', [UserController::class,'destroy'])->name('users.destroy');    

    // Technician
    Route::get('technicians', [TechnicianController::class,'index'])->name('technicians.index');    
    Route::get('technicians/create', [TechnicianController::class,'create'])->name('technicians.create');
    Route::post('technicians', [TechnicianController::class,'store'])->name('technicians.store');
    Route::get('technicians/show/{id?}', [TechnicianController::class,'show'])->name('technicians.show');
    Route::get('technicians/edit/{id?}', [TechnicianController::class,'edit'])->name('technicians.edit');
    Route::post('technicians/update/{id?}', [TechnicianController::class,'update'])->name('technicians.update');
    Route::get('technicians/destroy/{id?}', [TechnicianController::class,'destroy'])->name('technicians.destroy');

    // Machine
    Route::get('machines', [MachineController::class,'index'])->name('machines.index');    
    Route::get('machines/create', [MachineController::class,'create'])->name('machines.create');
    Route::post('machines', [MachineController::class,'store'])->name('machines.store');
    Route::get('machines/show/{id?}', [MachineController::class,'show'])->name('machines.show');
    Route::get('machines/edit/{id?}', [MachineController::class,'edit'])->name('machines.edit');
    Route::post('machines/update/{id?}', [MachineController::class,'update'])->name('machines.update');
    Route::get('machines/destroy/{id?}', [MachineController::class,'destroy'])->name('machines.destroy');

    // Installation form
    Route::get('installations', [InstallationController::class,'index'])->name('installations.index');
    Route::get('installations/create', [InstallationController::class,'create'])->name('installations.create');
    Route::post('installations', [InstallationController::class,'store'])->name('installations.store');
    Route::get('installations/show/{id?}', [InstallationController::class,'show'])->name('installations.show');
    Route::get('installations/edit/{id?}', [InstallationController::class,'edit'])->name('installations.edit');
    Route::post('installations/update/{id?}', [InstallationController::class,'update'])->name('installations.update');
    Route::get('installations/destroy/{id?}', [InstallationController::class,'destroy'])->name('installations.destroy');

    // Create Issue
    Route::get('issues', [CreateIssueController::class,'index'])->name('issues.index');    
    Route::get('issues/create', [CreateIssueController::class,'create'])->name('issues.create');
    Route::post('issues', [CreateIssueController::class,'store'])->name('issues.store');
    Route::get('issues/show/{id?}', [CreateIssueController::class,'show'])->name('issues.show');
    Route::get('issues/edit/{id?}', [CreateIssueController::class,'edit'])->name('issues.edit');
    Route::post('issues/update/{id?}', [CreateIssueController::class,'update'])->name('issues.update');
    Route::get('issues/destroy/{id?}', [CreateIssueController::class,'destroy'])->name('issues.destroy');

    Route::get('issues/assign/{id?}', [CreateIssueController::class,'assignEdit'])->name('assign.edit');
    Route::post('issues/assign/{id?}', [CreateIssueController::class,'assignUpdate'])->name('assign.update');

    // Assign Issue
    Route::get('assign-issues', [AssignIssueController::class,'index'])->name('assign-issues.index'); 
    Route::get('assign-issues/create', [AssignIssueController::class,'create'])->name('assign-issues.create');
    Route::post('assign-issues', [AssignIssueController::class,'store'])->name('assign-issues.store');
    Route::get('assign-issues/edit/{id?}', [AssignIssueController::class,'edit'])->name('assign-issues.edit');
    Route::post('assign-issues/update/{id?}', [AssignIssueController::class,'update'])->name('assign-issues.update');
    Route::get('assign-issues/destroy/{id?}', [AssignIssueController::class,'destroy'])->name('assign-issues.destroy');

    // Referred 
    Route::get('referred', [ReferredController::class,'index'])->name('referred.index');

});
