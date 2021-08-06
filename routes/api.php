<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HasilIkanController;
use App\Http\Controllers\API\JenisAlatController;
use App\Http\Controllers\API\JenisIkanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('login_tpi', [AuthController::class, 'login_tpi']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('getallalat', [JenisAlatController::class, 'getJenisAlat']);
    // Route::post('postalat', [JenisAlatController::class, 'postAlat']);
    Route::post('tambahikan', [JenisIkanController::class, 'tambahIkan']);
    Route::post('posthasil', [HasilIkanController::class, 'postIkan']);
    Route::get('gethasil', [HasilIkanController::class, 'getAllhasilIkan']);
    Route::post('getallikan', [JenisIkanController::class, 'getJenisIkan']);
    Route::get('getikanbytpi', [JenisIkanController::class, 'getIkanByTpi']);
    Route::put('editikan/{dataIkan}', [JenisIkanController::class, 'editIkan']);
    Route::delete('hapusikan/{dataIkan}', [JenisIkanController::class, 'hapusIkan']);
    Route::post('logout', [AuthController::class, 'logout']);
});
