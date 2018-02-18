<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSection extends Model
{
	public $timestamps = false; //le digo a laravel que timestamp no esta definida en esta clase y asi no la incluye en la consulta al guardar a la BD
}
