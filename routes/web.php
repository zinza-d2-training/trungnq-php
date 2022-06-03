<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authen\AuthenController;
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
    return view('welcome');
});

Route::get('/c-forgot-password',[AuthenController::class,'login']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware('verifyLogin')->group(function () {
    Route::get('/home', function () {
        return view('pages.dashboard',['title' => "Dashboard"]);
    })->name('home');
    Route::get('/account',[AuthenController::class,'edit'])->name('account');
    Route::post('/account',[AuthenController::class,'update'])->name("account-update");
});

Route::controller(AuthenController::class)->group(function(){
    Route::get('/custom-login','login')->name('custom-login');
    Route::post('/custom-login','post_login')->name('custom-post-login');
    Route::get('custom-logout','logout')->name('custom-logout');
    Route::get('reset-password','reset_pass')->name('custom-reset-password');
    Route::post('reset-password','send_pass')->name('make-password');
});