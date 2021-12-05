<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function photo(){
        return $this->hasMany(Photo::class,"parent_id");
    }

    public function wallpaper(){
        return $this->hasMany(Wallpaper::class,"cat_id");
    }
}
