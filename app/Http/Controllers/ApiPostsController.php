<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ApiPostsController extends Controller
{
    public function getAllPostForSection(Request $request)
    {
    	$seccion=$request->seccion;

    	$resul= \DB::table('post_section')->join('posts','post_section.post_id','=','posts.id')
    				->select('posts.*')->where('post_section.section_id','=',$seccion)
    				->paginate(15);
    	$resul-> setPath('custom/url');

    	return ($resul);
    }

   public function getPostForSearchMenu(Request $request)
    {
    	$seccion=$request->consulta;

    	$resul= \DB::table('post_section')->join('posts','post_section.post_id','=','posts.id')
    			    ->select('posts.*','post_section.*')
    			    ->where('posts.title','like','%' . $seccion . '%')
    			    ->where('posts.copete','like','%' . $seccion . '%')
    				->where('posts.activo','=','1')
    				->paginate(15);
    	$resul-> setPath('custom/url');

    	return ($resul);	
    }

    public function getAllPostForEspacioDidactico(Request $request)
    {
        $seccion=$request->seccion;
        $level= $request->level;

        $resul= \DB::table('post_section')->join('posts','post_section.post_id','=','posts.id')
                    ->join('level_posts','posts.id','=','level_posts.post_id')
                    ->select('posts.*')->where('post_section.section_id','=',$seccion)
                    ->where('level_posts.level_id','=',$level)
                    ->paginate(15);
        $resul-> setPath('custom/url');

        return ($resul);
    }
}


