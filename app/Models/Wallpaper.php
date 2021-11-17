<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    use HasFactory;
    protected $primaryKey = "wallpaper_id";
    public function photo(){
        return $this->hasMany(Photo::class,"parent_id","wallpaper_id");
    }

    public function user(){
        return $this->hasMany(User::class,"id","added_user_id");
    }

    public function color(){
        return $this->hasMany(Color::class,"id","color_id");
    }

    public function category(){
        return $this->hasMany(Category::class,"id","cat_id");
    }
}
