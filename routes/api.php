<?php
use App\Http\Controllers\Api\KotaController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\DetailjamuController;
use App\Http\Controllers\Api\ProdusenController;
use App\Http\Controllers\Api\JamuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('kota',KotaController::class);
Route::apiResource('kecamatan',KecamatanController::class);
Route::apiResource('detailjamu',DetailjamuController::class);
Route::apiResource('produsen',ProdusenController::class);
Route::apiResource('jamu',JamuController::class);