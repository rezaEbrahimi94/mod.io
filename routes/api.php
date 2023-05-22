<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeTwo\Mods as Mods;
use App\Http\Controllers\ChallengeThree\Tokens as Tokens;
use App\Http\Controllers\ChallengeOne\Users as Users;

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

// Routes for Challenge 1
Route::prefix('users')->group(function () {
    Route::get('/', [Users\IndexController::class, 'index']);
    Route::get('/{user}', [Users\ShowController::class, 'show']);
    Route::post('/', [Users\CreateController::class, 'create']);
});

// Routes for Challenge 2
Route::prefix('mods')->group(function () {
    Route::get('/', [Mods\IndexController::class, 'index']);
    Route::post('/', [Mods\CreateController::class, 'create']);
});

// Routes for Challenge 3
Route::prefix('tokens')->group(function () {
    Route::get('/', [Tokens\CreateController::class, 'create']);
    Route::middleware('api.token')->delete('/', [Tokens\DeleteController::class, 'delete']);
});