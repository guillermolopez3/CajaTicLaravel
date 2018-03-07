@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>Formulario para la carga de recursos de CajaTic</h1>
		<div class="row">
			<div class="col-md-6">
				<a href="{{ '/CajaTIC/posts' }}" class="btn btn-primary">Cargar Post</a>
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
	</div>

   {{--  <div class="row">
        @forelse($posts as $post)

        @empty
            <p> No hay post para mostrar </p>
        @endforelse
    </div> --}}

@endsection