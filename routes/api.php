<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/weathers",[WeatherController::class, "index"]);
Route::post("/weathers", [WeatherController::class, "store"]);
Route::put("/weathers/{id}", [WeatherController::class, "update"]);
Route::delete("/weathers/{id}", [WeatherController::class, "destroy"]);

