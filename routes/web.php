<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    /** Roles Module */
    Route::get('roles', [RoleController::class, 'index'])->name('roles');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{role:slug}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('roles/update', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role:slug}/delete', [RoleController::class, 'delete'])->name('roles.delete');
    /** */

    /** Companies Module */
    Route::get('companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('companies/{role:slug}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::post('companies/update', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('companies/{role:slug}/delete', [CompanyController::class, 'delete'])->name('companies.delete');
    /** */

    /** Projects Module */
    Route::get('projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{role:slug}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('projects/update', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{role:slug}/delete', [ProjectController::class, 'delete'])->name('projects.delete');
    /** */

    /** Assignment Module */
    Route::get('assign', [AssignmentController::class, 'index'])->name('assign');
    Route::get('assign/create', [AssignmentController::class, 'create'])->name('assign.create');
    Route::post('assign/store', [AssignmentController::class, 'store'])->name('assign.store');
    Route::get('assign/{user:slug}/edit', [AssignmentController::class, 'edit'])->name('assign.edit');
    Route::post('assign/update', [AssignmentController::class, 'update'])->name('assign.update');
    Route::delete('assign/{role:slug}/delete', [AssignmentController::class, 'delete'])->name('assign.delete');
    /** */
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
