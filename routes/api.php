<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HeroController;
use App\Http\Controllers\API\KindController;
use App\Http\Controllers\API\FightController;
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

Route::group([
    'middleware' => 'auth:api',
], function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

    Route::get('heroes', [HeroController::class, 'index']);
    Route::post('heroes', [HeroController::class, 'store']);
    Route::get('kinds', [KindController::class, 'index']);

    Route::get('fights', [FightController::class, 'index']);
    Route::post('fights', [FightController::class, 'store']);

});

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

