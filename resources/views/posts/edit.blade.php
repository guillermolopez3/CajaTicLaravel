@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Editar Post</h1>
		<div class="col-md-6">
			@include('posts.form',[
				'posts'	=>$posts,
				'url'  	=>'/posts/' . $posts->id,
				'method'=>'PATCH'
				])
		</div>
		
	</div>
@endsection