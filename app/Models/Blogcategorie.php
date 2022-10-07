<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcategorie extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->hasMany('App\Models\Blogarticle','category_id','id');
    }
}
