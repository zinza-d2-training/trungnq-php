<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authen\AuthenController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\Topic\ToppicController;
use App\Http\Controllers\Comment\CommentController;
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
    Route::post('reset-password', 'sendPass')->name('make-password');
    Route::get('account', 'edit')->name('account');
    Route::get('logout', 'logout');
    Route::post('/account/{id}', 'update')->name("account-update");
});



Route::middleware('auth.jwt')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('post', PostController::class);
    Route::post('/post/upload-image', [PostController::class, 'uploadImage'])->name('post.uploadImage');
    Route::post('/post/resolve/{id}', [PostController::class, 'resolve'])->name('post.resolve');
    Route::post('/post/pin/{id}', [PostController::class, 'pin'])->name('post.pin');

    Route::get('/search', [PostController::class, 'search'])->name('post.search');

    Route::resource('comment', CommentController::class)->only(['update', 'store']);

    Route::resource('company', CompanyController::class);
    Route::resource('user', UserController::class);
    Route::resource('tag', TagController::class);
    Route::resource('topic', ToppicController::class);
    Route::resource('post', PostController::class);
    Route::post('/post/upload-image', [PostController::class, 'uploadImage'])->name('post.uploadImage');
    Route::post('/post/resolve/{id}', [PostController::class, 'resolve'])->name('post.resolve');
    Route::post('/post/pin/{id}', [PostController::class, 'pin'])->name('post.pin');
    Route::get('/search', [PostController::class, 'search'])->name('post.search');

    Route::resource('comment', CommentController::class)->only(['update', 'store']);
});
