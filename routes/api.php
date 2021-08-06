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


Route::prefix('user')->group(function () {

    Route::get('/allUsers', [UserController::class, 'getAll'])->name('Users');

    Route::get('/{id}', [UserController::class, 'read'])->name('User');

    Route::post('/newUser', [UserController::class, 'create'])->name('New User');

    Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('Update User');

    Route::delete('/deleteUser/{id}', [UserController::class, 'delete'])->name('Delete user');
});
