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
                    ->where('posts.activo','=','1')
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
                     ->orWhere('posts.copete','like','%' . $seccion . '%')
                     ->orWhere('posts.tags','like','%' . $seccion . '%')
                    ->where('posts.activo','=','1')
                    ->paginate(15);
        $resul-> setPath('custom/url');

        return ($resul);
    }

    public function getAllPostForEspacioDidactico(Request $request)
    {
        $level= $request->level;

        $resul= \DB::table('post_section')->join('posts','post_section.post_id','=','posts.id')
                    ->join('level_posts','posts.id','=','level_posts.post_id')
                    ->select('posts.*')->where('post_section.section_id','=','4')
                    ->where('level_posts.level_id','=',$level)
                    ->where('posts.activo','=','1')
                    ->paginate(15);
        $resul-> setPath('custom/url');

        return ($resul);
    }

    public function getAllNovedades(Request $request)
    {
        $ano=$request->ano;

        $resul= \DB::table('post_section')->join('posts','post_section.post_id','=','posts.id')
                    ->select('posts.*')->where('post_section.section_id','=','5')
                    ->whereYear('posts.created_at','=',$ano)
                    ->paginate(15);
        $resul-> setPath('custom/url');

        return ($resul);
    }

    public function getAllNuestraEscuela(Request $request)
    {
        $seccionNe= $request->seccionNe;
        $resul= \DB::table('nesection_posts')->join('posts','nesection_posts.post_id','=','posts.id')
                    ->select('posts.*')
                    ->where('nesection_posts.nesection_id','=',$seccionNe)
                    ->where('posts.activo','=',"1")
                    ->paginate(15);
        $resul-> setPath('custom/url');

        return $resul;
    }
}


