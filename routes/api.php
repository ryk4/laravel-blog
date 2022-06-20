<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\Blog\CommentController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('tags', TagController::class);
});

Route::resource('blogs.comments', CommentController::class)->only(['store', 'index']);


//--------------------------------FOR TESTING PURPOSE--------------------------------

//Route::get('blogs/{blog}/comments',[CommentController::class, 'index'])->name('blogs.index');
//Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
//});

