@extends('_layouts.app')

@section('content')

<div class="content pt100 mt30">
	<div class="row justify-content-center">
		<div class="col-5">
			<div class="card">
				<div class="card-header px50 fw600 py15 text-muted">
					SISTEMA DE ALUMNOS
				</div>
				<div class="card-body px60 py30">
					
					<form action="{{ route('login') }}" method="post">
						@csrf
						<div class="form-group mb20">
							<label for="" class="pb5">Correo electrónico:</label>
							<input type="email" name="email" class="form-control lh35 f20" placeholder="Tu correo electrónico" />
						</div>
						<div class="form-group mb20">
							<label for="" class="pb5">Contraseña:</label>
							<input type="password" name="password" class="form-control lh35 f20" placeholder="Tu contraseña" />
						</div>
						<button type="submit" class="btn btn-primary px50 lh30">Iniciar sesión</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection