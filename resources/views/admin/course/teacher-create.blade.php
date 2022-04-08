@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30">
            <a href="{{ route('course.teachers', $course) }}" class="btn btn-light fr mt10"><x-Icon name="arrow_left" size="18" /> Volver al listado de usuarios</a>
            <h1>Agregar un profesor al curso</h1>
        </div>

        <hr>
                
        <div class="row justify-content-center al mt50">

            <div class="col-7">

                <div class="card">

                    <div class="card-header">
                        Indica los datos del nuevo profesor
                    </div>

                    <div class="card-body px40 py35">
                        <form action="{{ route('course.teachers.attach', $course) }}" method="post">

                            @csrf

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Cargo: </label>
                                <div class="col-md-8">
                                    <select name="role_id" class="form-control">
                                        <option selected disabled>Selecciona un cargo</option>
                                        @forelse($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb20 d-flex justify-content-around">
                                <label for="" class="col-md-3 ar pt5">Profesor: </label>
                                <div class="col-md-8">
                                    <select name="user_id" class="form-control">
                                        <option selected disabled>Selecciona un docente</option>
                                        @forelse($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->lastname }}, {{ $teacher->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('user_id')
                                        <span class="text-danger f15">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-around">
                                <span for="" class="col-md-3"></span>
                                <div class="form-group col-md-8">
                                    <button type="submit" class="btn btn-primary">Agregar el profesor</button>
                                    <a href="{{ route('course.teachers', $course) }}" class="btn btn-link">Cancelar</a>
                                </div>
                            </div>
                            
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection