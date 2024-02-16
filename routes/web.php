<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\UserController;
use App\Models\Procedure;
use App\Models\User;
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

Route::get('/', [ProcedureController::class, 'index']);

Route::get('/infoProcedure/{id}', [ProcedureController::class, 'infoProcedure']);

Route::get('/procedures', [ProcedureController::class, 'procedures']);

Route::post('/application/create', [ProcedureController::class, 'ApplicationCreate']);

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/reg', function () {
    return view('reg');
});

Route::post('/reg/create', [UserController::class, 'signUp']);

Route::post('/auth/login', [UserController::class, 'signIn']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/applications', [AdminController::class, 'application']);

Route::get('/admin/procedures', [AdminController::class, 'adminprocedures']);

Route::get('/admin/employees', [AdminController::class, 'employees']);

Route::get('/time/{id}', [ProcedureController::class, 'timeChoise']);

Route::get('/admin/procedures/add', [ProcedureController::class, 'addProcedure']);

Route::post('/admin/procedures/add/store', [ProcedureController::class, 'storeProcedure']);

Route::post('/admin/addEmployee', [UserController::class, 'addEmployee']);

Route::get('/admin/employees/delete/{id}', [AdminController::class, 'deleteUser']);

Route::get('/admin/procedures/edit/{id}', [ProcedureController::class, 'edit']);
