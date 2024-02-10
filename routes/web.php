<?php

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
    return view('index');
});

Route::get('/procedures', function () {
    return view('procedures');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/reg', function () {
    return view('reg');
});
Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/applications', function () {
    return view('admin.applications');
});

Route::get('/admin/procedures', function () {
    return view('admin.procedures');
});

Route::get('/admin/employees', function () {
    return view('admin.employees');
});

Route::get('/time', function () {
    return view('time');
});
