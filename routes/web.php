<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('sharepost');
});

// Route::get('/index', function () {
//     // return view('dashboard');
//     return view('pages.home');

// })->middleware('auth')->name('dashboard');



Route::middleware('auth')->group(function(){
    Route::get('/index', [HomeController::class, 'index'])->name('index');
    Route::post('/add/post',[PostController::class, 'AddPost']);
    Route::get('/get/post/data',[PostController::class,'GetAllPost']);
    Route::get('/get/post/{id}',[PostController::class,'getPost']);
    Route::post('/post/update',[PostController::class,'updatePost']);
    Route::post('/post/delete/{id}',[PostController::class,'DeletePost']);

    Route::post('/user/update', [UserController::class,'userUpdate'])->name('user_update');


    Route::controller(DashBoardController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
    });



});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
