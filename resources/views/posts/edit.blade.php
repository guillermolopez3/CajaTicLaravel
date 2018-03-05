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

@section('scripts')
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/posts.js') }}"></script>
   
@endsection