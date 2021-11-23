<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/transfers', function () {
    return view('transfers');
});
Route::get('/transactions', function () {
    return view('transactions');
});
Route::get('/histories', function () {
    return view('histories');
});
Route::get('/reports', function () {
    return view('reports');
});

Route::get('/operations', function(){
    return view('operations');
});
