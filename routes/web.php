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
})->name('landingPage');

Route::get('/policy', function () {
    return view('policy');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/policy', function () {
    return view('policy');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/about', function () {
    return view('about');
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
    Route::get('/dashboard/capaian-kinerja', 'CapkinController@index')->name('dashboard.capaian-kinerja');
    Route::get('/dashboard/PK', function () {
        return view('dashboard.PK');
    })->name('dashboard.PK');
    Route::get('/dashboard/upload-FRA', function () {
        return view('dashboard.upload-FRA');
    })->name('dashboard.upload-FRA');
    Route::get('/entry/PK', function () {
        return view('entry.PK');
    })->name('entry.PK');
    Route::get('/entry/upload-FRA', function () {
        return view('entry.upload-FRA');
    })->name('entry.upload-FRA');
});


Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard/capaian-kinerja', 'CapkinController@index')->name('dashboard.capaian-kinerja');
    Route::get('/dashboard/PK', function () {
        return view('dashboard.PK');
    })->name('dashboard.PK');
    Route::get('/dashboard/upload-FRA', function () {
        return view('dashboard.upload-FRA');
    })->name('dashboard.upload-FRA');
    Route::get('/entry/PK', function () {
        return view('entry.PK');
    })->name('entry.PK');
    Route::get('/entry/upload-FRA', function () {
        return view('entry.upload-FRA');
    })->name('entry.upload-FRA');
    Route::get('/user-management', 'UserManagementController@index')->name('user-management.index');
});
