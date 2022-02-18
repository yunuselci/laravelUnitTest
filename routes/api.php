<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get("/weathers", [WeatherController::class, "index"]);
Route::get("/weathers/{id}", [WeatherController::class, "show"]);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/weathers", [WeatherController::class, "store"]);
    Route::put("/weathers/{id}", [WeatherController::class, "update"]);
    Route::delete("/weathers/{id}", [WeatherController::class, "destroy"]);
    Route::post('/logout', [AuthController::class, 'logout']);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


