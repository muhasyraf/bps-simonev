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
    return view('welcome');
});

Route::middleware(['admin:admin'])->group(function () {
    Route::get('admin/login', 'AdminController@loginForm');
    Route::post('admin/login', 'AdminController@store')->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard')->middleware('auth:admin');
    Route::get('/dashboard/capaian-kinerja', function () {
        return view('dashboard.capaian-kinerja');
    })->name('dashboard.capaian-kinerja');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    Route::get('/dashboard/capaian-kinerja', function () {
        return view('dashboard.capaian-kinerja');
    })->name('dashboard.capaian-kinerja');
});
