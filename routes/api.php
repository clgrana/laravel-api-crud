<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('api')->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.list');
        Route::get('/by-city', [UserController::class, 'city'])->name('user.by.city');
        Route::get('/by-uf', [UserController::class, 'uf'])->name('user.by.uf');
        Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::group(['prefix' => 'address'], function () {
        Route::get('/', [AddressController::class, 'index'])->name('address.list');
        Route::get('/{id}', [AddressController::class, 'show'])->name('address.show');
    });

    Route::group(['prefix' => 'city'], function () {
        Route::get('/', [CityController::class, 'index'])->name('city.list');
        Route::get('/{id}', [CityController::class, 'show'])->name('city.show');
    });

    Route::group(['prefix' => 'uf'], function () {
        Route::get('/', [UfController::class, 'index'])->name('uf.list');
        Route::get('/{id}', [UfController::class, 'show'])->name('uf.show');
    });
});
