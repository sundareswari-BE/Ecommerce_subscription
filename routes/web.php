<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

// Route::get('admin/adminlogin', [MyController::class, 'adminloginForm'])->name('adminlogin');
// Route::post('admin/adminlogin', [MyController::class, 'adminlogincheck'])->name('adminlogincheck');
// Route::get('admin/admindashboard', [MyController::class, 'admindashboard'])->name('admindashboard');
// Route::get('admin/category', [MyController::class, 'category'])->name('category');
// Route::post('admin/category', [MyController::class, 'addcategory'])->name('addcategory');





Route::get('user/login', [userController::class, 'loginForm'])->name('login');
Route::post('user/login', [userController::class, 'check'])->name('check');
Route::post('user/store', [userController::class, 'store'])->name('store');

Route::group(['middleware'=>['auth:admin']],function () {
    Route::get('user/dashboard', [userController::class, 'userdashboard'])->name('userdashboard');
    //  Route::post('user/userdashboard', [userController::class, 'subcribtionformshowdata'])->name('subcribtionformshowdata');
    //  Route::post('user/subscribtion', [userController::class, 'subscribtionpage'])->name('subscribtionpage');
    Route::get('user/subscribtion', [userController::class, 'subcribtionformshowdata'])->name('subcribtionformshowdata');
    Route::post('user/subscribtionpage', [userController::class, 'subscribtionformstoredata'])->name('subscribtionformstoredata');
    Route::get('user/categorypage', [categoryController::class, 'categoryPage'])->name('categoryPage');
    Route::get('/search', [userController::class, 'search'])->name('search');

    

    Route::get('user/logout',[userController::class,'logout'])->name('logout');
});


