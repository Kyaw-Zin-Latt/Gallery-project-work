<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutAndSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_and_settings', function (Blueprint $table) {
            $table->string("about_id",255)->primary();
            $table->string("about_title",255);
            $table->string("about_description",255);
            $table->string("about_email",255);
            $table->string("about_phone",255);
            $table->string("about_website",255);
            $table->tinyInteger("ads_on")->default(0);
            $table->text("ads_client");
            $table->text("ads_slot");
            $table->tinyInteger("analyt_on")->default(0);
            $table->text("analyt_track_id");
            $table->text("facebook");
            $table->text("google_plus");
            $table->text("instagram");
            $table->text("youtube");
            $table->text("pinterest");
            $table->string("twitter");
            $table->text("GDPR")->nullable();
            $table->integer("upload_point");
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
        Schema::dropIfExists('about_and_settings');
    }
}
