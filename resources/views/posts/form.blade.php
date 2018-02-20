{!! Form::open(['url'=>$url,'method'=>$method]) !!}
	
	<div class="form-group">
		{{ Form::label('activity', 'Tipo de Recurso', ['class' => 'form-control-label']) }}
		{{ Form::select('activity',$activity,$posts->id_tipo_activity,['class'=>'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('seccion', 'Sección del Recurso (manteniendo la tecla ctl se hace la selección múltiple)', ['class' => 'form-control-label']) }}
		{{ Form::select('seccion[]',$seccion,array_keys($array),['class'=>'form-control','multiple' => true,'id'=>'seccion']) }}
	</div>

	<div class="form-group" id="nivel">
		{{ Form::label('nivel', 'Nivel del Recurso', ['class' => 'form-control-label']) }}
		{{ Form::select('nivel',$level,null,['class'=>'form-control']) }}
	</div>

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
		{{ Form::label('descripcion', 'Detalle del recurso', ['class' => 'form-control-label']) }}
		{{ Form::textarea('descripcion',$posts->detalle,['class'=>'form-control','rows'=>'8', 'placeholder'=>'desarrollo mas extenso del recurso']) }}
	</div>
	<div class="form-group">
		{{ Form::label('link', 'Url del recurso', ['class' => 'form-control-label']) }}
		{{ Form::text('link',$posts->link,['class'=>'form-control', 'placeholder'=>'url del recurso (Video, web...)']) }}
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
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
{!! Form::close() !!}


