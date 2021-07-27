<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SellerMenu;
use App\Http\Controllers\SellerOrder;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\OrderController;




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



Route::get('user/auth',[IndexController::class,'userAuth'])->name('user.auth');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['register'=>true]);

//register
Route::post('user/register',[App\Http\Controllers\Frontend\IndexController::class,'registerSubmit'])->name('register.submit');


//admin dashboard

Route::group(['prefix'=>'admin','middleware'=>'auth','admin'],function()
{
    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('admin');

    //banner Section
    Route::resource('/banner', \App\Http\Controllers\BannerController::class);
    Route::get('/deletebanner/{id}',[BannerController::class,'destroy']);

     //banner Section
     Route::resource('/city', \App\Http\Controllers\CityController::class);
     Route::get('/deletecity/{id}',[CityController::class,'destroy']);
   
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

Route::group(['prefix'=>'seller','middleware'=>'auth','seller'],function()
{
    Route::get('/',[\App\Http\Controllers\AdminController::class,'seller'])->name('seller');

    //menu section
    Route::resource('/sellermenu', \App\Http\Controllers\SellerMenu::class);
    Route::get('/deleteSmenu/{id}',[SellerMenu::class,'destroy']);
    

    //seller order
    Route::resource('/sellerorder',\App\Http\Controllers\SellerOrder::class);
    Route::get('/sellerorderview/{id}',[SellerOrder::class,'show']);
    Route::get('/deleteSdelete/{id}',[SellerOrder::class,'destroy']);



    //seller profile
    Route::get('/selprofile',[\App\Http\Controllers\SellerController::class,'selprofile'])->name('selprofile');
    Route::get('/selchgpass',[\App\Http\Controllers\SellerController::class,'selchgpass'])->name('selchgpass');
    
});

Route::group(['prefix'=>'customer','middleware'=>'auth','customer'],function()
{
    Route::get('/',[\App\Http\Controllers\AdminController::class,'customer'])->name('customer');  

    Route::get('/customerss',[IndexController::class,'index'])->name('index');

    Route::resource('/showord', \App\Http\Controllers\Frontend\IndexController::class);

    Route::get('/letord/{id}',[OrderController::class,'ord'])->name('ord');
    
    

    Route::get('/profile',[IndexController::class,'profile'])->name('profile');

    Route::post('/update/{id}',[IndexController::class,'update'])->name('update');

    Route::get('/passchg',[IndexController::class,'passchg'])->name('passchg');
    
    Route::post('/chgpass/{id}',[IndexController::class,'chgpass'])->name('chgpass');

    

});




Route::get('/orddetails',[OrderController::class,'orddetails'])->name('orddetails');

   

//Frontend section 

Route::get('/searchcty',[IndexController::class,'searchcty']);



Route::get('/customerorderview/{id}',[OrderController::class,'show']);


Route::resource('/orderplc',\App\Http\Controllers\Frontend\OrderController::class);







//End Frontend section 