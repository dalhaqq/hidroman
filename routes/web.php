<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GullyController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\KloterTanamanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\RiwayatNutrisiController;
use App\Http\Controllers\RiwayatPanenController;
use App\Http\Controllers\SettingController;
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

Route::get('/settings', [SettingController::class, 'show'])->name('settings.show');
Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/gully', [GullyController::class, 'index']);
    Route::post('/gully', [GullyController::class, 'store']);
    Route::post('/kloter', [KloterTanamanController::class, 'store']);
    Route::get('/kloter', [KloterTanamanController::class, 'index']);
    Route::post('/inventory', [InventoryController::class, 'store']);
    Route::get('/inventory', [InventoryController::class, 'index']);
    Route::post('/nutrisi', [RiwayatNutrisiController::class, 'store']);
    Route::get('/nutrisi', [RiwayatNutrisiController::class, 'index']);
    Route::post('/panen', [RiwayatPanenController::class, 'store']);
    Route::get('/panen', [RiwayatPanenController::class, 'index']);
    Route::get('/panen/json', [RiwayatPanenController::class, 'json']);
    Route::post('/pembelian', [PembelianController::class, 'store']);
    Route::get('/pembelian', [PembelianController::class, 'index']);;
    Route::get('/input', [InputController::class, 'index']);
});

Auth::routes();
