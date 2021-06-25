<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;


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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register'=>false]);


//admin dashboard

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{
    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('admin');

    //banner Section
    Route::resource('/banner', \App\Http\Controllers\BannerController::class);
    Route::get('/deletebanner/{id}',[BannerController::class,'destroy']);
   
    //category section
     Route::resource('/category', \App\Http\Controllers\CategoryController::class);
     Route::get('/deletecat/{id}',[CategoryController::class,'destroy']);
    
    //menu section
    Route::resource('/menu', \App\Http\Controllers\MenuController::class);
    Route::get('/deletemenu/{id}',[MenuController::class,'destroy']);

    //menu section
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::get('/deleteuser/{id}',[UserController::class,'destroy']);
    Route::get('/search',[UserController::class,'search'])->name('web.search');
    
});