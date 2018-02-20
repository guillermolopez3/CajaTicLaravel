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

@section('scripts')
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
    	$(document).ready(function(){
    		function displayVals() {
			  var valor = $( "#seccion" ).val() || [];
			  console.log(valor);
			  if(valor.length<=0)
			  {
			  	$('#nivel').hide();
			  }
			  else{
			  	 for(var i=0;i<valor.length;i++)
			  	{
				  	if(valor[i]==4)
				  	{
				  		$('#nivel').show();
				  	}
			  	}
			  }
			}
			 
			$( "#seccion" ).change( displayVals );
			displayVals();
		
    	});
    </script>
@endsection