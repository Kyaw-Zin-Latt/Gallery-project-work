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
    Route::get("/categories/search","CategoryController@search")->name("category.search");


    Route::resource("/wallpapers","WallpaperController");
    Route::post("/publish","WallpaperController@publish")->name("wallpapers.publish");
    Route::post("/unPublish","WallpaperController@unPublish")->name("wallpapers.unPublish");


    Route::resource("/color","ColorController");
    Route::get("/colors/search","ColorController@search")->name("color.search");

    Route::resource("photo",PhotoController::class);

    Route::get("/abouts","AboutAndSettingController@edit")->name("abouts.edit");
    Route::post("/abouts","AboutAndSettingController@update")->name("abouts.update");

    Route::resource("/versions","VersionController");

    Route::resource("backend_configs",BackendConfigController::class);




});
