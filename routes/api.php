<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FaskesController;
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

Route::get('all-category', [CategoryController::class, 'all']);
Route::get('all-faskes', [FaskesController::class, 'all']);
Route::post('faskes-by-category', [FaskesController::class, 'byCategory']);
Route::get('faskes-by-id/{id}', [FaskesController::class, 'faskesById']);
Route::get('coordinate', [FaskesController::class, 'coordinate']);
