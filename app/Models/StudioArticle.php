<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudioArticle extends Model
{
    use HasFactory;
    protected $table = 'studioarticles';
    protected $guarded = ['_token','_method'];
    public $timestamps= false;

    public function category()
    {
        return $this->hasOne('App\Models\Studiocategorie','id','category_id');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Articleimage','article_id','id');
    }

    public function images()
    {
        return $this->image()->where('type',0);
    }
}
