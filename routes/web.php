<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'departement'=>\App\Http\Controllers\DepartementController::class,
    'employee'=>\App\Http\Controllers\EmployeeTalentController::class,
    'poste'=>\App\Http\Controllers\PosteController::class,
    'contrat'=>\App\Http\Controllers\ContratController::class,
    'conge'=>\App\Http\Controllers\CongeController::class,
    'absence'=>\App\Http\Controllers\AbsenceController::class,
]);
Route::get('/conge/accept/{id}',[\App\Http\Controllers\CongeController::class,'accept'])->name('conge.accept');
Route::get('/conge/refuse/{id}',[\App\Http\Controllers\CongeController::class,'refuse'])->name('conge.refuse');
