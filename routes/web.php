<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\UserController;
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

Route::get('/procedures', function () {
    return view('procedures');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/reg', function () {
    return view('reg');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/applications', function () {
    return view('admin.applications');
});

Route::get('/admin/procedures', function () {
    return view('admin.procedures');
});

Route::get('/admin/employees', [AdminController::class, 'employees']);

Route::get('/time', function () {
    return view('time');
});

Route::get('/admin/procedures/add', [ProcedureController::class, 'addProcedure']);

Route::post('/admin/procedures/add/store', [ProcedureController::class, 'storeProcedure']);

Route::post('/admin/addEmployee', [UserController::class, 'addEmployee']);
