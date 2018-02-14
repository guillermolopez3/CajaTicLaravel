<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
        return view('posts.create',[
            'posts'=>$posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //guardo el post haciendo click en el
    {
        $post = new Post;

        $chk = $request->activo; 

        if(empty($chk)){ //verifico si el chk esta seleccionado o no, si no esta viene null
            $chk=0;
        }else{
            $chk=1;
        }
            
        $post->title = $request->title;
        $post->copete = $request->copete;
        $post->image = $request->img;
        $post->tags = $request->tags;
        $post->activo = $chk;

        if($post->save())
        {
            return redirect('/posts');
        }
        else{
            return view('posts/create',[
                'posts'=>$post,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('posts.edit',[
            'posts'=>$posts,
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
        $post->activo = $chk;

        if($post->save())
        {
            return redirect('/posts');
        }
        else{
            return view('posts/edit',[
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
