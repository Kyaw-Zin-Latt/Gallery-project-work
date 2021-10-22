<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::prefix("dashboard")->middleware("auth")->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get("/profile","ProfileController@edit")->name("profile.edit");
    Route::post("/update","ProfileController@update")->name("profile.update");
    Route::post("/update-photo","ProfileController@updatePhoto")->name("profile.updatePhoto");


    Route::resource("/category",CategoryController::class);
    Route::post("/publish","CategoryController@publish")->name("category.publish");
    Route::post("/unPublish","CategoryController@unPublish")->name("category.unPublish");
    Route::get("/search","CategoryController@search")->name("category.search");


    Route::resource("/color",ColorController::class);


    Route::get("/search","ColorController@search")->name("color.search");

    Route::resource("photo",PhotoController::class);



});