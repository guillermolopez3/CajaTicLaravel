<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function post()
    {
    	return $this->belongsToMany(Post::class);
    }
}
