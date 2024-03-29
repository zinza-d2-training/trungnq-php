<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authen\AuthenController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\Topic\ToppicController;
use App\Http\Controllers\User\UserController;

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

/* Route::get('/', function () {
    return redirect()->route("home");
});

Route::get('/c-forgot-password', [AuthenController::class, 'login']);
Route::get('c-reset-password/{token}', [AuthenController::class, 'showResetPasswordForm'])->name('custom.reset.password.get');
Route::post('c-reset-password', [AuthenController::class, 'submitResetPasswordForm'])->name('custom.reset.password.post'); */
/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

/* require __DIR__.'/auth.php'; */

/* 
Route::middleware('verifyLogin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/account', [AuthenController::class, 'edit'])->name('account');
    Route::post('/account/{id}', [AuthenController::class, 'update'])->name("account-update");

    Route::middleware('checkRoleCompanyAccount')->group(function () {
        Route::name('user.')->group(function () {
            Route::prefix("user")->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('index');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/create', [UserController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
                Route::post('/edit/{id}', [UserController::class, 'update'])->name('update');
                Route::post('/destroy/{id}', [UserController::class, 'destroy'])->name('delete');
                Route::post('/destroy-mutiple', [UserController::class, 'destroyAll'])->name('delete-mutiple');
            });
        });
    });

    Route::middleware('checkRoleAdmin')->group(function () {
        Route::resource('company', CompanyController::class);
        Route::resource('topic', ToppicController::class);
        Route::post('/topic/destroy-mutiple', [ToppicController::class, 'destroyAll']);
        Route::resource('tag', TagController::class);
        Route::post('/tag/destroy-mutiple', [TagController::class, 'destroyAll']);
    });

    Route::resource('post', PostController::class);
    Route::post('/post/upload-image', [PostController::class, 'uploadImage'])->name('post.uploadImage');
    Route::post('/post/resolve/{id}', [PostController::class, 'resolve'])->name('post.resolve');
    Route::post('/post/pin/{id}', [PostController::class, 'pin'])->name('post.pin');
    Route::get('/search', [PostController::class, 'search'])->name('post.search');

    Route::resource('comment', CommentController::class)->only(['update', 'store']);
    
});

Route::controller(AuthenController::class)->group(function () {
    Route::get('/custom-login', 'login')->name('custom-login');
    Route::post('/custom-login', 'postLogin');
    Route::get('custom-logout', 'logout')->name('custom-logout');
    Route::get('reset-password', 'resetPass')->name('custom-reset-password');
    Route::post('reset-password', 'sendPass')->name('make-password');
    Route::get('usermanager/create', 'create');
}); */

Route::view('/{any}', 'welcome')
    ->where('any', '.*');