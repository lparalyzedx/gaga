<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['_token','_method'];

    public function category()
    {
        return $this->hasOne('App\Models\Categorie','id','category_id');
    }


}
