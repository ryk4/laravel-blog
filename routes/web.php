<?php

use Illuminate\Support\Facades\Route;

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
    'register' => false
]);

Route::middleware(['auth'])->group(function () {
    Route::resource('blogs', \App\Http\Controllers\BlogController::class)->only(['create','update','delete','store']);
});

Route::resource('blogs', \App\Http\Controllers\BlogController::class)->only(['index','show']);
