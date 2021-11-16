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

    Route::get("/system_users/search","UserManagerController@search")->name("user-manager.search");
    Route::get("/system_users/{user}/edit","UserManagerController@edit")->name("user-manager.edit");
    Route::put("/system_users/{user}","UserManagerController@update")->name("user-manager.update");
    Route::get("/system_users","UserManagerController@index")->name("user-manager.index");
    Route::get("/system_users/add","UserManagerController@create")->name("user-manager.create");
    Route::post("/system_users","UserManagerController@store")->name("user-manager.store");
    Route::delete("/system_users/{user}","UserManagerController@destroy")->name("user-manager.destroy");

    Route::get("/registered_users/search","UserManagerController@searchReg")->name("reg-user-manager.search");
    Route::get("/registered_users/{user}/edit","UserManagerController@editReg")->name("reg-user-manager.edit");
    Route::put("/registered_users/{user}","UserManagerController@updateReg")->name("reg-user-manager.update");
    Route::get("/registered_users","UserManagerController@indexReg")->name("reg-user-manager.index");
    Route::get("/registered_users/add","UserManagerController@createReg")->name("reg-user-manager.create");
    Route::post("/registered_users","UserManagerController@storeReg")->name("reg-user-manager.store");
    Route::delete("/registered_users/{user}","UserManagerController@destroyReg")->name("reg-user-manager.destroy");
    Route::get("/ban/{user}","UserManagerController@ban")->name("reg-user-manager.ban");
    Route::get("/unban/{user}","UserManagerController@unban")->name("reg-user-manager.unban");




    Route::resource("/color","ColorController");
    Route::get("/colors/search","ColorController@search")->name("color.search");

    Route::resource("photo",PhotoController::class);

    Route::get("/abouts","AboutAndSettingController@edit")->name("abouts.edit");
    Route::post("/abouts","AboutAndSettingController@update")->name("abouts.update");

    Route::resource("/versions","VersionController");

    Route::resource("backend_configs",BackendConfigController::class);




});
