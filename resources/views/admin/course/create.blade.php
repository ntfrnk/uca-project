@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30">
            <a href="{{ route('course.index') }}" class="btn btn-light fr mt10"><x-Icon name="arrow_left" size="18" /> Volver al listado de cursos</a>
            <h1>Crear un nuevo curso</h1>
        </div>

        <hr>
                
        <div class="row justify-content-center al mt50">

            <div class="col-7">

                <div class="card">

                    <div class="card-header">
                        Indica los datos del nuevo curso
                    </div>

                    <div class="card-body px40 py35">
                        <form action="{{ route('course.store') }}" method="post">

                            @csrf

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
                                <label for="" class="col-md-3 ar pt5">Descripción: </label>
                                <div class="col-md-8">
                                    <textarea name="description" rows="5" class="form-control" placeholder="Contraseña">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-around">
                                <span for="" class="col-md-3"></span>
                                <div class="form-group col-md-8">
                                    <button type="submit" class="btn btn-primary">Crear curso</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-link">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection