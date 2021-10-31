<?php

namespace App\Providers;

use App\Models\AboutAndSetting;
use App\Models\BackendConfig;
use App\Models\Category;
use App\Models\Color;
use App\Models\Photo;
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
        View::share("categories",Category::with("photo")->latest('id')->get());
//        View::share("wallpapers",Wallpaper::with("category")->latest('wallpaper_id')->get());
        View::share("colors",Color::latest("id")->get());
        View::share("photos",Photo::latest("id")->get());
//        View::share("abouts",AboutAndSetting::first());
        View::share("version",Version::first());
        View::share("backend",BackendConfig::first());
    }
}
