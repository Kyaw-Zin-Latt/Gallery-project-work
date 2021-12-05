<?php

namespace App\Providers;

use App\Models\AboutAndSetting;
use App\Models\BackendConfig;
use App\Models\Category;
use App\Models\Color;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use App\Models\Version;
use App\Models\Wallpaper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share("categories",Category::with(["photo","wallpaper"])->latest('id')->get());
        View::share("categoriesWithWall",Category::with("wallpaper")->latest('id')->get());
        View::share("wallpapers",Wallpaper::with(["category","photo"])->latest('wallpaper_id')->get());
        View::share("wallpapersLimit",Wallpaper::with(["category","photo"])->latest('wallpaper_id')->limit(3)->get());
        View::share("colors",Color::latest("id")->get());
        View::share("photos",Photo::latest("id")->get());
//        View::share("abouts",AboutAndSetting::first());
        View::share("version",Version::first());
        View::share("backend",BackendConfig::first());
        View::share("roles",Role::all());
        View::share("regUsers",User::with("roles")->where("role_id","=","4")->latest("id")->get());
        View::share("regUsersLimit",User::with("roles")->where("role_id","=","4")->latest("id")->limit(4)->get());
    }
}
