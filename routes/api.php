<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;

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

//Route::middleware(['auth:sanctum'])->group(function () {
Route::resource('tags', TagController::class);
//    Route::post('tasks/order',[\App\Http\Controllers\Api\TaskController::class, 'order'])->name('tasks.order');
//    Route::resource('tags', \App\Http\Controllers\api\TagController::class);
//});
