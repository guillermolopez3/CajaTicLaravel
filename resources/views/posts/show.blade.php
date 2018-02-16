@extends('layouts.app')

@section('content')
	
	<div class="container text-center">
		<div class="card">
			<h1> {{ $posts->title }}</h1>
			<div class="row">
				<div class="col-sm-6 col-xs-12"></div>
				<div class="col-sm-6 col-xs-12">
					<p>
						<strong>Copete</strong>
					</p>
					<p>
						{{ $posts->copete }}
					</p>
				</div>
				<div class="col-sm-6 col-xs-12"></div>
			</div>
		</div>
	</div>
@endsection