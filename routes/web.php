<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Kost\KamarController;
use App\Http\Controllers\Kost\PenghuniController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthenticationController::class, 'get_login'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    Route::resource('/kamar', KamarController::class)->middleware('userAccess:admin');
    Route::resource('/penghuni', PenghuniController::class)->middleware('userAccess:staf');
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/dashboard', [AuthenticationController::class, 'dashboard']);
});