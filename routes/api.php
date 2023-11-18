<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rolapiController;
use App\Http\Controllers\PostapiController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::apiResource('post',PostapiController::class);
Route::apiResource('rol',rolapiController::class);