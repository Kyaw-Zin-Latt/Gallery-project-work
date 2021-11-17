<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWallpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallpapers', function (Blueprint $table) {
            $table->string("wallpaper_id")->primary();
            $table->string("cat_id");
            $table->string("color_id");
            $table->string("wallpaper_name");
            $table->string("types")->comment("1=Free,2=Preminum");
            $table->tinyInteger("is_recommended")->default("0");
            $table->tinyInteger("is_portrait")->default("0");
            $table->tinyInteger("is_landscape")->default("0");
            $table->tinyInteger("is_square")->default("0");
            $table->float("point");
            $table->tinyInteger("wallpaper_is_published")->comment("1=pub, 0=unpub");
            $table->tinyInteger("is_gif")->default("0");
            $table->tinyInteger("is_wallpaper")->default("0");
            $table->tinyInteger("is_video_wallpaper")->default("0");
            $table->string("wallpaper_search_tags");
            $table->string("added_user_id");
            $table->string("credit");
            $table->timestamp("recommended_date")->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallpapers');
    }
}
