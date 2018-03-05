<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//clase que maneja los niveles (inicial, primario, secundario de los recursos)
class Level extends Model
{
     public function post()
    {
    	return $this->belongsToMany(Post::class,'level_post','level_posts');
    }
}
