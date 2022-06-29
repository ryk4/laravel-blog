<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('blogs.index');
});

Auth::routes([
    'register' => false,
]);

Route::post('/contact-us', [EmailController::class, 'store'])->name('email.store');

Route::resource('blogs', BlogController::class)->only(['index', 'show']);
Route::resource('subscribe-list', SubscriptionController::class)->only(['store']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'checkUserLevel:admin']], function () {
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('tags', TagController::class);
});
