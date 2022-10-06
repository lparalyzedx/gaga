<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogarticle extends Model
{
    use HasFactory;
    protected $guarded = ['_token','_method'];

    public function category()
    {
       return  $this->hasOne('App\Models\Blogcategorie','id','category_id');
    }
}
