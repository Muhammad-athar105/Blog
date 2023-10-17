<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// ###### Public Routes #####
// register route
Route::post('/v1/register', [RegisterController::class, 'register']);
// login route
Route::post('/v1/login', [LoginController::class, 'login']);


// ##### required login ####
// get logged in user
// admin user
Route::middleware(['auth:sanctum', 'admin'])->get('/v1/admin', function (Request $request) {
    return new UserResource(auth()->user());
});

// user role
Route::middleware(['auth:sanctum', 'user'])->get('/v1/user', function (Request $request) {
    return new UserResource(auth()->user());
});