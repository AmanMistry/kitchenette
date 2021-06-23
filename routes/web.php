<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register'=>false]);


//admin dashboard

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{
    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('admin');

    //banner Section
    Route::resource('/banner', \App\Http\Controllers\BannerController::class);
    Route::get('delete/{id}',[BannerController::class,'destroy']);
   
    //category section
     Route::resource('/category', \App\Http\Controllers\CategoryController::class);
     Route::get('delete/{id}',[CategoryController::class,'destroy']);
    
    //menu section
    Route::resource('/menu', \App\Http\Controllers\MenuController::class);
    Route::get('delete/{id}',[MenuController::class,'destroy']);
    
});