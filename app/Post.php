<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];

    public function activity() //un post tiene una actividad
    {
    	return $this->hasOne(Activity::class);
    }

    public function seccion()
    {
    	return $this->belongsToMany(Section::class);
    }

}
