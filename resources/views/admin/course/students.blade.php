@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30 d-flex justify-content-between">
            <h1>Alumnos suscritos a este curso</h1>
            <div>
                <a href="{{ route('course.index') }}" class="btn btn-light mt10 mr5">
                    <x-Icon name="arrow_left" size="18" /> Volver al listado de cursos
                </a>
                <a href="{{ route('course.students.random', $course) }}" class="btn btn-primary mt10">
                    Agregar estudiante a este curso
                </a>
            </div>
        </div>

        <hr>

        <h4>
            <span class="fw500 dib mr5 pb15">Curso:</span> 
            {{ $course->name }}
        </h4>

        @if(session('feedback'))
            <div class="alert alert-{{ session('feedback') }}">
                {{ session('message') }}
            </div>
        @endif
                
        <div class="pb80 pt15">

            <div class="d-flex row">

                @forelse($course->students as $user)

                    <div class="col-md-3 d-flex mb30">
                        <x-card-student :user="$user" :course="$course" />
                    </div>

                @empty

                    <div class="em f18 ac py100 text-muted">
                        <x-Icon name="emoji_neutro" size="60" color="#999" />
                        <p class="mt20">No hay estudiantes suscriptos a este curso</p>
                    </div>

                @endforelse

            </div>

        </div>

    </div>

@endsection