<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];

    public function activity() //un post tiene una actividad
    {
    	$this->hasOne(Activity::class);
    }

    //defino la relacion que tengo con SeccionPost
   /* public function seccionPost()
    {
    	//devuelve todos los seccionPost donde aparezca el post trabajado
    	return this->hasMany(SeccionPost::class);

    }*/
}
