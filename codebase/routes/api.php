<?php

use App\Http\Controllers\Api\Admin\PendingLandlordController;
use App\Http\Controllers\Api\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Api\Guest\SearchTerrainController;
use App\Http\Controllers\Api\Guest\TerrainController as GuestTerrainController;
use App\Http\Controllers\Api\Landlord\ImageController;
use App\Http\Controllers\Api\Landlord\RentTerrainRequestController;
use App\Http\Controllers\Api\Landlord\TempImageController;
use App\Http\Controllers\Api\Landlord\TerrainController;
use App\Http\Controllers\Api\User\RentTerrainController;
use App\Http\Controllers\Api\User\RequestLandlordController;
use App\Http\Controllers\Api\User\UpdateEmailController;
use App\Http\Controllers\Api\User\UsersController;
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

Route::apiResource('terrain', GuestTerrainController::class);
Route::post('terrain/search', SearchTerrainController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function (Request $request) {
        return new UserResource($request->user());
    });

    Route::group(['middleware' => ["role:user"], 'prefix' => '/user'], function () {
        Route::apiResource('request-landlord',
            RequestLandlordController::class)->parameters(['request-landlord' => 'user'])->only(['store']);
        Route::apiResource('users', UsersController::class);
        Route::put('update/email', UpdateEmailController::class);
        Route::post('rent-terrain', RentTerrainController::class);
    });

    Route::group(['middleware' => ["role:landlord"], 'prefix' => '/landlord'], function () {
        Route::apiResource('rent-request', RentTerrainRequestController::class);
        Route::apiResource('terrain', TerrainController::class);
        Route::apiResource('terrain/images', ImageController::class);
        Route::apiResource('terrain/temp-images', TempImageController::class);
    });

    Route::group(['middleware' => ["role:admin"], 'prefix' => '/admin'], function () {
        Route::apiResource('users', AdminUsersController::class);
        Route::apiResource('pending-landlords',
            PendingLandlordController::class)->parameters(['pending-landlords' => 'user']);
    });
});
