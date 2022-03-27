<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Admin\CommentAdminController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DiaDanhController;
use App\Http\Controllers\Admin\HinhAnhController;
use App\Http\Controllers\Admin\VungMienController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers;

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
Route::get('login',[LoginController::class,'show'])->name('login');
Route::post('login',[LoginController::class,'loginAuth'])->name('login');
Route::post('logout',[LoginController::class,'logout'])->name('logout');
Route::get('register',[RegisterController::class,'show'])->name('register');
Route::post('register',[RegisterController::class,'create'])->name('register');
// Route::post('register',[RegisterController::class,'create'])->name('register');

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('main', [MainController::class, 'index']);
        Route::get('main/thongke',[MainController::class, 'ThongKeChart']);

        Route::prefix('user')->group(function(){
            // Route::get('index',[UserController::class,'index']);
            // Route::get('add',[UserController::class,'create']);
            // Route::post('add',[UserController::class,'store']);// menu validate form xác thực 
            // Route::get('edit',[UserController::class,'edit']);
            // Route::resource('user',UserController::class);
            Route::resource('user',UserController::class);
            Route::resource('post',PostAdminController::class);
            Route::resource('diadanh',DiaDanhController::class);  
            Route::get('/search', [DiaDanhController::class],'search');      
            Route::resource('hinhanh',HinhAnhController::class);   
            Route::resource('cmt',CommentAdminController::class);
            Route::resource('vungmien', VungMienController::class);
            Route::resource('chat',ChatController::class);
        });
        
    });
    
});