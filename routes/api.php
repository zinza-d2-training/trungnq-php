<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authen\AuthenController;
use App\Http\Controllers\Home\HomeController;
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

Route::controller(AuthenController::class)->group(function () {
    Route::post('login', 'postLogin')->name('login');
    Route::get('checkToken', 'checkToken')->name('checktoken');
    Route::post('reset-password', 'sendPass')->name('make-password');
    Route::get('logout', 'logout');
    Route::get('account', 'edit')->name('account');
    Route::post('account/{id}','update')->name("account-update");
});



Route::middleware('auth:api')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('post', PostController::class);
    Route::post('/post/upload-image', [PostController::class, 'uploadImage'])->name('post.uploadImage');
    Route::post('/post/resolve/{id}', [PostController::class, 'resolve'])->name('post.resolve');
    Route::post('/post/pin/{id}', [PostController::class, 'pin'])->name('post.pin');
    Route::get('/search', [PostController::class, 'search'])->name('post.search');

    Route::resource('comment', CommentController::class)->only(['update', 'store']);
    
});