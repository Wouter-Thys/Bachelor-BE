<?php

use App\Http\Controllers\AdminController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\IsAdmin;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        ray(new UserResource($request->user()));
        return new UserResource($request->user());
    });

    Route::middleware(IsAdmin::class)->group(function () {
        Route::get('/users', [AdminController::class, 'users']);
    });
});
