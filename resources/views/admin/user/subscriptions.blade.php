@extends('_layouts.app')

@section('content')

	<div class="container ac">

		<div class="page-header">
			<h1>Configuración de cuenta</h1>
		</div>

		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card">
					<div class="card-header">
						Suscripciones
					</div>
					<div class="card-body al">
						<ul class="list-group list-group-flush">
							@foreach($courses as $course)
								<li class="list-group-item">
									<a href="{{ route('course.unsubscribe', $course) }}" class="btn btn-danger btn-sm fr">
										@component('_components.icon')
										    @slot('name', 'remove')
										    @slot('color', '#FFF')
										    @slot('size', '15')
										@endcomponent 
										Eliminar suscripción
									</a>
									{{ $course->name }}
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection