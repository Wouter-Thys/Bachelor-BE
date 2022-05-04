<?php

use App\Http\Controllers\Api\Admin\PendingLandlordController;
use App\Http\Controllers\Api\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Api\User\RequestLandlordController;
use App\Http\Controllers\UserController as oldController;
use App\Http\Resources\UserResource;
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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return new UserResource($request->user());
    });

    Route::group(['middleware' => ["role:user"]], function () {
        Route::apiResource('request-landlord', RequestLandlordController::class)->parameters(['request-landlord'=>'user']);
    });
    Route::group(['middleware' => ["role:admin"],'prefix' => '/admin'], function () {
        Route::apiResource('users', AdminUsersController::class);
        Route::apiResource('pending-landlords', PendingLandlordController::class)->parameters(['pending-landlords'=>'user']);
    });
});
