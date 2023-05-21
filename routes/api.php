<?php

use App\Http\Controllers\ChallengeOne\Users as Users;
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

Route::prefix('users')->group(function () {
    Route::get('/', [Users\IndexController::class, 'index']);
    Route::get('/{user}', [Users\ShowController::class, 'show']);
    Route::post('/', [Users\CreateController::class, 'create']);
});

// TODO: add routes for challenge 2.0

// TODO: add routes for challenge 3.0
