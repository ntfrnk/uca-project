@extends('_layouts.app')

@section('content')

	<div class="container">

		<div class="page-header mt30 mb25 d-flex justify-content-between">
			<h1>Configuración de cuenta</h1>
		</div>

		@if(session('feedback'))
            <div class="alert alert-{{ session('feedback') }}">
                {{ session('message') }}
            </div>
        @endif

		<hr>

		<div class="row justify-content-center al pt25">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						Modifica tus datos de cuenta
					</div>
					<div class="card-body px40 py35">
						<form action="{{ route('account.update', $user) }}" method="post">
							
							@csrf @method('patch')

							<div class="mb20 d-flex justify-content-around">
								<label for="" class="col-md-3 ar pt5">Nombre: </label>
								<div class="col-md-8">
									<input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ $user->name  }}" />
									@error('name')
										<span class="text-danger f15">{{ $message }}</span>
									@enderror
								</div>
							</div>

							<div class="mb20 d-flex justify-content-around">
								<label for="" class="col-md-3 ar pt5">Apellido: </label>
								<div class="col-md-8">
									<input type="text" name="lastname" class="form-control" placeholder="Apellido" value="{{ $user->lastname  }}" />
									@error('lastname')
										<span class="text-danger f15">{{ $message }}</span>
									@enderror
								</div>
							</div>

							<div class="mb20 d-flex justify-content-around">
								<label for="" class="col-md-3 ar pt5">Correo electrónico: </label>
								<div class="col-md-8">
									<input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ $user->email  }}" />
									@error('email')
										<span class="text-danger f15">{{ $message }}</span>
									@enderror
								</div>
							</div>

							<div class="d-flex justify-content-around">
								<span for="" class="col-md-3"></span>
								<div class="form-group col-md-8">
									<button type="submit" class="btn btn-primary">Modificar mis datos</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>

			<div class="col-6">
				<div class="card">
					<div class="card-header">
						Cambio de contraseña
					</div>
					<div class="card-body px20 py35">

						<form action="{{ route('account.password.update', $user) }}" method="post">

							@csrf @method('patch')

							<div class="mb20 d-flex justify-content-around">
								<label for="" class="col-md-4 ar pt5">Contraseña actual: </label>
								<div class="col-md-7">
									<input type="password" name="old_password" class="form-control" placeholder="Escribe tu contraseña actual" />
									@error('old_password')
										<span class="text-danger f15">{{ $message }}</span>
									@enderror
								</div>
							</div>

							<div class="mb20 d-flex justify-content-around">
								<label for="" class="col-md-4 ar pt5">Nueva contraseña: </label>
								<div class="col-md-7">
									<input type="password" name="password" class="form-control" placeholder="Escribe la nueva contraseña" />
									@error('password')
										<span class="text-danger f15">{{ $message }}</span>
									@enderror
								</div>
							</div>

							<div class="mb20 d-flex justify-content-around">
								<label for="" class="col-md-4 ar pt5">Repite la nueva contraseña: </label>
								<div class="col-md-7">
									<input type="password" name="password_confirmation" class="form-control" placeholder="Repite la nueva contraseña" />
									@error('password_confirmation')
										<span class="text-danger f15">{{ $message }}</span>
									@enderror
								</div>
							</div>

							<div class="d-flex justify-content-around">
								<span for="" class="col-md-4"></span>
								<div class="col-md-7">
									<button type="submit" class="btn btn-primary">Cambiar contraseña</button>
								</div>
							</div>

						</form>

					</div>
				</div>
			</div>
			
		</div>

	</div>

@endsection