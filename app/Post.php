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

    public function prueba()
    {
        return $this->belongsToMany(Section::class);

    }

    public function level()
    {
    	return $this->belongsToMany(Level::class,'level_posts');//le paso segundo arg ya que a la tabla en lugar de llamarla level_post la llame en prural :(
    }

}
