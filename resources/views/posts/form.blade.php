{!! Form::open(['url'=>$url,'method'=>$method]) !!}
	<div class="form-group">
		{{ Form::label('title', 'Título del Post', ['class' => 'form-control-label']) }}
		{{ Form::text('title',$posts->title,['class'=>'form-control', 'placeholder'=>'titulo']) }}
	</div>
	<div class="form-group">
		{{ Form::label('copete', 'Mini descripción', ['class' => 'form-control-label']) }}
		{{ Form::textarea('copete',$posts->copete,['class'=>'form-control','rows'=>'3', 'placeholder'=>'descripción resumida de no más de 100 palabras']) }}
	</div>
	<div class="form-group">
		{{ Form::label('img', 'Url de la imagen', ['class' => 'form-control-label']) }}
		{{ Form::text('img',$posts->image,['class'=>'form-control', 'placeholder'=>'url de la imagen']) }}
	</div>
	<div class="form-group">
		{{ Form::label('tags', 'Tags', ['class' => 'form-control-label']) }}
		{{ Form::text('tags',$posts->tags,['class'=>'form-control', 'placeholder'=>'Tags']) }}
	</div>
	<div class="form-group">
		{{ Form::label('activo', '¿Post activo?', ['class' => 'form-control-label']) }}
		
		@if($posts->activo==1)
			{{ Form::checkbox('activo','1',true) }}
		@else
			{{ Form::checkbox('activo','0',false) }}
		@endif
	</div>
	<div class="form-group">
		<a href="{{ url('/posts') }}">Regresar al listado de Posts</a>
		<input type="submit" value="Enviar" class="btn btn-success">
	</div>
{!! Form::close() !!}