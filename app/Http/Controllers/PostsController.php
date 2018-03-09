<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Activity;
use App\Section;
use App\Level;
use App\PostSection;
use App\Nesection;

class PostsController extends Controller
{
    public function index() //muestra la coleccion completa de post (tabla)
    {
        $posts = Post::orderBy('id','asc')->get();
        return view('posts.index',[
            'posts'=>$posts,
        ]);
    }

    public function create() //llamo al formulario y lo muestro para crear un post nuevo
    {
       return $this->createEdit('posts.create','create');
    }
   
    public function store(Request $request) //guardo el post haciendo click en el btn guardar
    {
       return $this->storeUpdate($request,'posts.create','store');
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

    public function edit($id) //abro el form para editar
    {
       return $this->createEdit('posts.edit','edit',$id);
    }

    public function update(Request $request, $id) //actualizo los valores en la bd
    {
       return $this->storeUpdate($request,'posts.update','update',$id);
       
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

    //Método comun para mostrar el formulario cuando lo creo o lo modifico
    private function createEdit($view,$method,$id=null)
    {
        $array=array();
        $arrayNivel=array();
        $arrayNE=array();
        $id_nivel=0;
        $seccion= Section::where('activo', true)->orderBy('name','asc')->get(['id', 'name'])->pluck('name','id');
        $activity= Activity::where('activo', true)->get(['id', 'name'])->pluck('name','id');
        $level= Level::all()->pluck('name','id');
        //$activity= $act->pluck('name','id'); //con plunk le paso los parametros que solo quiero me muestre en el array
        $sectionNE=Nesection::all()->pluck('name','id');

        if($method==='create')
        {
            $posts= new Post;
            $posts->activo='1'; //defino que siempre el formulario muestre al crear el chk activo
        }
        elseif($method==='edit'){
            $posts= Post::find($id);
            foreach ($posts->seccion as $role) {
                $array=array_add($array,$role->id,$role->name);
            } 

            foreach ($posts->level as $le) {
                //$id_nivel=$le->id;
                $arrayNivel=array_add($arrayNivel,$le->id,$le->name);
            }

            foreach ($posts->nuestraEscuela as $ne) {
                //dd($ne);
                //$id_nivel=$le->id;
                $arrayNE=array_add($arrayNE,$ne->id,$ne->name);
            }

        }
        
        return view($view,[
            'posts'     =>$posts,
            'activity'  =>$activity,
            'seccion'   =>$seccion,
            'ne'        =>$sectionNE,
            'array'     =>$array,
            'level'     =>$level,
            'id_nivel'  =>$arrayNivel,
            'arrayNE'   =>$arrayNE,
        ]);
    }

    private function storeUpdate($request,$view,$method,$id=null)
    {
        $chk = $request->activo; 
        $hasFile= $request->hasFile('imagen')&&$request->imagen->isValid();
        $hasPdf= $request->hasFile('pdf')&&$request->pdf->isValid();

        $imagen = $request->file('imagen');
       
        
        $pdf    = $request->file('pdf');
        
        
        //dd($$nameImage);

        if($method==='store')
        {
            $post = new Post;
            if(empty($chk)){ //verifico si el chk esta seleccionado o no, si no esta viene null
                $chk=0;
            }else{
                $chk=1;
            }    
        }
        elseif($method==='update'){
            $post= Post::find($id);
            if($chk ===null){ //verifico si el chk esta seleccionado o no, si no esta viene null
                $chk=0;
            }else{
                $chk=1;
            }
        }
        
        $es_recurso=$this->guardoEnTablaPivoteLevelPost($request);
        $es_ne=$this->guardoEnTablaPivotePostNE($request);
       //dd($es_ne);

        $post->title = $request->title;
        $post->copete = $request->copete;
       
        if($hasFile){
             $nameImage= rand(1,100) . $imagen->getClientOriginalName();
            $post->image = $imagen->storeAs('img',$nameImage,'public');    
        }
        else{
            $post->image =$request->img;   
        }
        
        $post->tags = $request->tags;
        $post->id_tipo_activity = $request->activity;
        $post->description = $request->descripcion;
        if($hasPdf){
            $namePdf= rand(1,100) . $pdf->getClientOriginalName();
             $post->link = $pdf->storeAs('files',$namePdf,'public');     
        }
        else{
             $post->link = $request->link;
        }
       
        $post->activo = $chk;

       
        DB::beginTransaction();
        try{
            $post->save();

            $post->seccion()->sync($request->get('seccion')); //de esta manera guardo en la tabla pivote
            
            if($es_recurso==true) //si es recursos, guardo el nivel o lo elimino
            {
                $post->level()->sync($request->get('mnivel')); //guardo
            }
            else{
                $post->level()->detach(); //elimino la relacion de la tabla pivote
            }

            if($es_ne==true)
            {
                $post->nuestraEscuela()->sync($request->get('ne'));
            }
            else{
                $post->nuestraEscuela()->detach();
            }
            
        }
        catch(\Exception $e)
       {
             DB::rollBack();
             return($e->getMessage());
            /*return view($view,[
                'posts'=>$post,
            ]);*/
       }

        DB::commit();
        return redirect('/posts');
        
    }

    private function guardoEnTablaPivoteLevelPost($request) //verifico si se selecciono la opcion recursos para saber si guardo o no en la latbla pivote recursos
    {
        $recursos= $request->get('seccion');
        foreach ($recursos as $re) {
            //dd($re);
            if($re==4)
            {
                return true;
            }
        }
        return false;
    } 

    private function guardoEnTablaPivotePostNE($request) //verifico si se selecciono la opcion ne para saber si guardo o no en la latbla pivote recursos
    {
        $recursos= $request->get('seccion');
        foreach ($recursos as $re) {
            //dd($re);
            if($re==3)
            {
                return true;
            }
        }
        return false;
    } 

}
