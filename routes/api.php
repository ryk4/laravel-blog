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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::middleware(['auth:sanctum', 'checkUserLevel:admin'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'checkUserLevel:admin'])->group(function () {
    Route::resource('tags', TagController::class);
    Route::resource('blogs.comments', CommentController::class)->only(['destroy']);
});

Route::resource('blogs.comments', CommentController::class)->only(['index']);

Route::middleware(['throttle:comments'])->group(function () {
    Route::resource('blogs.comments', CommentController::class)->only(['store']);
});


//--------------------------------FOR TESTING PURPOSES--------------------------------

//Route::get('blogs/{blog}/comments',[CommentController::class, 'index'])->name('blogs.index');
//Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
//});

