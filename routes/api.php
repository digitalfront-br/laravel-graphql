<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, MeetingController};

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('create-account', [AuthController::class, 'createAccount']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
});

Route::middleware('auth:sanctum')->post('createmeeting', [MeetingController::class, 'createMeeting']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
