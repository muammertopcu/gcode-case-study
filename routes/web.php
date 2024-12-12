<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/customers/data', [CustomerController::class, 'data'])->name('customers.data');
    Route::resource('/customers', CustomerController::class);
});

require __DIR__ . '/auth.php';
