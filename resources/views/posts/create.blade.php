@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Nuevo Post</h1>
		<div class="col-md-6">
			{{-- para no repetir el form el crear y editar es que incluyo el form creado en otro archivo --}}
			@include('posts.form',[
				'posts'	=>$posts,
				'url'  	=>'/posts',
				'method'=>'POST'
				])
		</div>
		
	</div>
@endsection