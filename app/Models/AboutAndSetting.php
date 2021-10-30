<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutAndSetting extends Model
{

    use HasFactory;
    protected $primaryKey = 'about_id';
    protected $keyType = 'string';
}
