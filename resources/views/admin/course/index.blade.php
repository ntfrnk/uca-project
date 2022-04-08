@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30 mb25 d-flex justify-content-between">
            <h1>Gestión de cursos</h1>
            <div>
                <a href="{{ route('course.create') }}" class="btn btn-success mt10">Nuevo curso</a>
                <a href="{{ route('course.random') }}" class="btn btn-secondary mt10" title="Crear un nuevo curso con datos aleatorios">
                    <x-Icon name="course" size="18" color="#FFF" />
                </a>
            </div>
        </div>

        @if(session('feedback'))
            <div class="alert alert-{{ session('feedback') }}">
                {{ session('message') }}
            </div>
        @endif

        <hr>

        <div class="pb80 pt10">

            <div class="d-flex row">

                @forelse($courses as $course)

                    <div class="col-md-3 d-flex mb30">
                        <x-card-course :course="$course" />
                    </div>

                @empty
                    <div class="col-md-12">
                        <div class="em f18 ac py100 text-muted border">
                            <x-Icon name="emoji_neutro" size="60" color="#999" />
                            <p class="mt20">Aún no hay cursos cargados</p>
                        </div>
                    </div>

                @endforelse

            </div>

        </div>

    </div>

@endsection