@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30">
            <a href="{{ route('user.index') }}" class="btn btn-light fr mt10"><x-Icon name="arrow_left" size="18" /> Volver al listado de usuarios</a>
            <h1>Crear un nuevo usuario</h1>
        </div>

        <hr>
                
        <div class="row justify-content-center al mt50">

            <div class="col-7">

                <div class="card">

                    <div class="card-header">
                        Indica los datos del nuevo usuario
                    </div>

                    <div class="card-body px40 py35">
                        <form action="{{ route('user.store') }}" method="post">

                            @csrf

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Tipo de usuario: </label>
                                <div class="col-md-8">
                                    <select name="level_id" class="form-control">
                                        <option selected disabled>Selecciona un tipo</option>
                                        @forelse($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
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
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}" autocomplete="off" />
                                    @error('name')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Apellido: </label>
                                <div class="col-md-8">
                                    <input type="text" name="lastname" class="form-control" placeholder="Apellido" value="{{ old('lastname') }}" autocomplete="off" />
                                    @error('lastname')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Correo electrónico: </label>
                                <div class="col-md-8">
                                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}" autocomplete="off" />
                                    @error('email')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Contraseña: </label>
                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" value="{{ old('password') }}" autocomplete="off" />
                                    @error('password')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-around">
                                <span for="" class="col-md-3"></span>
                                <div class="form-group col-md-8">
                                    <button type="submit" class="btn btn-primary">Crear usuario</button>
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