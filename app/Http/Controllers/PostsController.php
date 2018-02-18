<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Activity;
use App\Section;
use App\PostSection;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //muestra la coleccion completa de post
    {
        $posts = Post::orderBy('id','asc')->get();
        return view('posts.index',[
            'posts'=>$posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //llamo al formulario y lo muestro
    {
        $posts= new Post;
        $posts->activo='1'; //defino que siempre el formulario muestre al crear el chk activo
        $seccion= Section::where('activo', true)->orderBy('name','asc')->get(['id', 'name'])->pluck('name','id');
        $activity= Activity::where('activo', true)->get(['id', 'name'])->pluck('name','id');
        //$activity= $act->pluck('name','id'); //con plunk le paso los parametros que solo quiero me muestre en el array
        //dd($act);
        return view('posts.create',[
            'posts'     =>$posts,
            'activity'  =>$activity,
            'seccion'   =>$seccion,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //guardo el post haciendo click en el btn guardar
    {
        $post = new Post;

        $chk = $request->activo; 

        if(empty($chk)){ //verifico si el chk esta seleccionado o no, si no esta viene null
            $chk=0;
        }else{
            $chk=1;
        }
        
        //dd($request);
        $post->title = $request->title;
        $post->copete = $request->copete;
        $post->image = $request->img;
        $post->tags = $request->tags;
        $post->id_tipo_activity = $request->activity;
        $post->description = $request->descripcion;
        $post->link = $request->link;
        $post->activo = $chk;

        DB::beginTransaction();
        try{
            $post->save();
            $post->seccion()->sync($request->get('seccion'));
            //$seccion=new SeccionPost;

            /*for ($i=0; $i < ; $i++) { 
                # code...
            }
            foreach ($request->seccion as $sect) {
                $seccion->id_post= $post->id;
                $seccion->id_seccion=$request->seccion;
                $seccion->save();    
            }*/
            
            //throw new \Exception('exception lanzada');
        }
        catch(\Exception $e)
       {
             DB::rollBack();
             return($e->getMessage());
            /* return view('posts.create',[
                'posts'=>$post,
            ]);*/
       }

        DB::commit();
        return redirect('/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts= Post::find($id);

        return view('posts.show',[
            'posts'=>$posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //abro el form para editar
    {
        $posts= Post::find($id);
        $activity= Activity::where('activo', true)->get(['id', 'name'])->pluck('name','id');
        $seccion= Section::where('activo', true)->orderBy('name','asc')->get(['id', 'name'])->pluck('name','id');
        return view('posts.edit',[
            'posts'=>$posts,
            'activity'=>$activity,
            'seccion'   =>$seccion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //actualizo los valores en la bd
    {
        $post= Post::find($id);

        $chk = 0; 

        //dd($request);
        if($request->activo ===null){ //verifico si el chk esta seleccionado o no, si no esta viene null
            $chk=0;
        }else{
            $chk=1;
        }
       
        $post->title = $request->title;
        $post->copete = $request->copete;
        $post->image = $request->img;
        $post->tags = $request->tags;
        $post->id_tipo_activity = $request->activity;
        $post->description = $request->descripcion;
        $post->link = $request->link;
        $post->activo = $chk;

        if($post->save())
        {
            return redirect('/posts');
        }
        else{
            return view('posts.edit',[
                'posts'=>$post,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
