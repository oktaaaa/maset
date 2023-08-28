<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RutinAsetController;
use App\Models\RutinAset;
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
    return view('dashboardapp');
});

Route::resource('aset', AsetController::class);
Route::resource('rutinaset', RutinAsetController::class);

Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');
Route::get('findTipe/{id}', [RutinAsetController::class, 'findTipe']);