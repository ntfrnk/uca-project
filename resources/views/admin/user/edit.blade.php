@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30">
            <a href="{{ route('user.index') }}" class="btn btn-light fr mt10"><x-Icon name="arrow_left" size="18" /> Volver al listado de usuarios</a>
            <h1>Editar usuario</h1>
        </div>

        <hr>
                
        <div class="row justify-content-center al mt50">

            <div class="col-7">

                <div class="card">

                    <div class="card-header">
                        Modifica los datos del usuario
                    </div>

                    <div class="card-body px40 py35">
                        <form action="{{ route('user.update', $user) }}" method="post">

                            @csrf @method('patch')

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Tipo de usuario: </label>
                                <div class="col-md-8">
                                    <select name="level_id" class="form-control">
                                        <option disabled>Selecciona un tipo</option>
                                        @forelse($levels as $level)
                                            <option value="{{ $level->id }}" {{ $level->id === $user->level_id ? 'selected' : '' }}>{{ $level->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('level_id')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Nombre: </label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') ?? $user->name }}" autocomplete="off" />
                                    @error('name')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Apellido: </label>
                                <div class="col-md-8">
                                    <input type="text" name="lastname" class="form-control" placeholder="Apellido" value="{{ old('lastname') ?? $user->lastname }}" autocomplete="off" />
                                    @error('lastname')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Correo electrónico: </label>
                                <div class="col-md-8">
                                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') ?? $user->email }}" autocomplete="off" />
                                    @error('email')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Contraseña: </label>
                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" autocomplete="off" />
                                    <span class="form-text text-muted db">Si no deseas cambiar la contraseña deja vacío este campo</span>
                                    @error('password')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-around">
                                <span for="" class="col-md-3"></span>
                                <div class="form-group col-md-8">
                                    <button type="submit" class="btn btn-primary">Modificar datos</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-link">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection