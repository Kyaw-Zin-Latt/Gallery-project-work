<?php

use App\Http\Controllers\ColorApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\WallpaperApiController;
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

Route::apiResource("/color",ColorApiController::class);
Route::apiResource("/category",CategoryApiController::class);
Route::apiResource("/wallpaper",WallpaperApiController::class);
