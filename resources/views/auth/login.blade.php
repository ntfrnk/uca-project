@extends('_layouts.app')

@section('content')

<div class="content pt100 mt30">
	<div class="row justify-content-center">
		<div class="col-5">
			<div class="card shadow">
				<div class="card-header px50 fw600 py15 text-muted">
					SISTEMA DE ALUMNOS
				</div>
				<div class="card-body px60 py30">
					
					<form action="{{ route('login') }}" method="post">
						@csrf
						@if(session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
						@endif
						<div class="form-group mb20">
							<label for="" class="pb5">Correo electrónico:</label>
							<input type="email" name="email" class="form-control lh35 f20" value="{{ old('email') }}" placeholder="Tu correo electrónico" />
							@error('email')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group mb20">
							<label for="" class="pb5">Contraseña:</label>
							<input type="password" name="password" class="form-control lh35 f20" value="{{ old('password') }}" placeholder="Tu contraseña" />
							@error('password')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<button type="submit" class="btn btn-primary px50 lh30">Iniciar sesión</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection