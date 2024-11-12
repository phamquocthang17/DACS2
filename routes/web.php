<?php

use App\Http\Controllers\Admin\AnimalsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UploadController;

// Login page
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');


// Login form submission
Route::post('admin/users/login/store', [LoginController::class, 'store']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function(){

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        Route::prefix('category')->group(function(){
            Route::get('addcategory', [CategoryController::class, 'create']);
            Route::post('addcategory', [CategoryController::class, 'store']);
            Route::get('listcategory',[CategoryController::class, 'index']);
            Route::get('edit/{category}',[CategoryController::class,'show']);
            Route::post('edit/{category}',[CategoryController::class,'update']);
            Route::DELETE('destroy',[CategoryController::class, 'destroy']);

        });


        Route::prefix('animal')->group(function(){
            Route::get('addanimal', [AnimalsController::class, 'create']);
            Route::post('addanimal', [AnimalsController::class, 'store']);
            Route::get('list',[AnimalsController::class, 'index']);
            Route::get('edit/{animal}',[AnimalsController::class,'show']);
            Route::post('edit/{animal}',[AnimalsController::class,'update']);
            Route::DELETE('destroy',[AnimalsController::class,'destroy']);
        });


        Route::prefix('Post')->group(function(){
            Route::get('addpost',[PostController::class,'create']);
            Route::post('addpost',[PostController::class,'store']);
            Route::get('listpost',[PostController::class, 'index']);
            Route::get('edit/{post}',[PostController::class,'show']);
            Route::post('edit/{post}',[PostController::class,'update']);
            
            Route::DELETE('destroy',[PostController::class,'destroy']);


        });
      


        Route::post('upload/services', [UploadController::class,'store']);

        Route::post('/logout',[MainController::class,'logout'])->name('logout');

    });

});


// Route::middleware(['auth', 'autoLogout'])->group(function () {
//     Route::get('admin/main', [MainController::class, 'index'])->name('admin');
// });

// Login with Facebook
Route::get('admin/users/login-facebook', [LoginController::class, 'login_facebook']);
Route::get('admin/callback', [LoginController::class, 'callback_facebook']);

// Login with Google (if you uncomment these lines, don't forget to define the functions in LoginController)
// Route::get('/login-google', 'LoginController@login_google');
// Logout
// Route::get('/logout', 'LoginController@logout');
