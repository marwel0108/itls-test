<?php

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

//$2y$10$QvckIX.s6fJ36nnHE4FgeuEy/9m2OxGiXYyFB6aD1ThtvBsqlLpKW

Route::prefix('user')->group(function () {

    Route::get('/allUsers', [UserController::class, 'getAll']);

    Route::get('/{id}', [UserController::class, 'read']);

    Route::post('/newUser', [UserController::class, 'create']);

    Route::put('/updateUser/{id}', [UserController::class, 'update']);

    Route::delete('/deleteUser/{id}', [UserController::class, 'delete']);
});
