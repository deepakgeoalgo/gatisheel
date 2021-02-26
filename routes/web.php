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

    // Installation form
    Route::get('installations', [InstallationController::class,'index'])->name('installations.index');    
    Route::get('installations/create', [InstallationController::class,'create'])->name('installations.create');
    Route::post('installations', [InstallationController::class,'store'])->name('installations.store');
    Route::get('installations/edit/{id?}', [InstallationController::class,'edit'])->name('installations.edit');
    Route::post('installations/update/{id?}', [InstallationController::class,'update'])->name('installations.update');
    Route::get('installations/destroy/{id?}', [InstallationController::class,'destroy'])->name('installations.destroy');

    // Create Issue
    Route::get('issues', [CreateIssueController::class,'index'])->name('issues.index');    
    Route::get('issues/create', [CreateIssueController::class,'create'])->name('issues.create');
    Route::post('issues', [CreateIssueController::class,'store'])->name('issues.store');
    Route::get('issues/edit/{id?}', [CreateIssueController::class,'edit'])->name('issues.edit');
    Route::post('issues/update/{id?}', [CreateIssueController::class,'update'])->name('issues.update');
    Route::get('issues/destroy/{id?}', [CreateIssueController::class,'destroy'])->name('issues.destroy');

    // Customers
    Route::get('customers', [CustomerController::class,'index'])->name('customers.index');    
    Route::get('customers/create', [CustomerController::class,'create'])->name('customers.create');
    Route::post('customers', [CustomerController::class,'store'])->name('customers.store');
    Route::get('customers/edit/{id?}', [CustomerController::class,'edit'])->name('customers.edit');
    Route::post('customers/update/{id?}', [CustomerController::class,'update'])->name('customers.update');
    Route::get('customers/destroy/{id?}', [CustomerController::class,'destroy'])->name('customers.destroy');


});
