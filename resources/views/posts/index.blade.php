@extends('layouts.app')

@section('content')

	<div class="text-center">
		<h1>Posts</h1>
	</div>
	
	<div class="container">
		<div>
			<a href="{{ url('posts/create') }}" class="btn btn-primary">Nuevo Post</a>
		</div>
		<br>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Copete</th>
					<th>Fecha</th>
					<th>Tags</th>
					<th>Activo</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@forelse($posts as $post)
					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ $post->copete }}</td>
						<td>{{ $post->created_at->format('d/m/Y') }}</td>
						<td>{{ $post->tags }}</td>
						@if($post->activo)
							<td>{{ 'Si' }}</td>
						@else
							<td>{{ 'No' }}</td>
						@endif
						<td><a href="{{ url('/posts/' . $post->id . '/edit') }}">Editar</a></td>
					</tr>
				@empty
					<p>No hay post para mostrar</p>
				@endforelse
			</tbody>
		</table>
	</div>
@endsection