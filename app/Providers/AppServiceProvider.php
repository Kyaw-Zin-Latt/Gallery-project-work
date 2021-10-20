<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Photo;
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
        View::share("categories",Category::with("photo")->latest('id')->get());
        View::share("photos",Photo::latest("id")->get());
    }
}
