<?php

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

use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\SpecialtyController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\AppointmentController;

Route::apiResource('doctors', DoctorController::class);
Route::apiResource('specialties', SpecialtyController::class);
Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('appointments', AppointmentController::class);
