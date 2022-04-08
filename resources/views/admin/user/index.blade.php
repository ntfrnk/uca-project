@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30 mb25 d-flex justify-content-between">
            <h1>Gestión de usuarios</h1>
            <div>
                <a href="{{ route('user.create') }}" class="btn btn-success mt10">Nuevo usuario</a>
                <a href="{{ route('user.random') }}" class="btn btn-secondary mt10" title="Crear un nuevo estudiante con datos aleatorios">
                    <x-Icon name="student" size="18" color="#FFF" />
                </a>
                <a href="{{ route('user.random', ['level_id' => 2]) }}" class="btn btn-secondary mt10" title="Crear un nuevo profesor con datos aleatorios">
                    <x-Icon name="teacher" size="18" color="#FFF" />
                </a>
            </div>
        </div>

        @if(session('feedback'))
            <div class="alert alert-{{ session('feedback') }}">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Mostrar: &nbsp;
                <a href="{{ route('user.index') }}">Todos los usuarios</a>&nbsp; | &nbsp;
                <a href="{{ route('user.filter', ['level_id' => 3]) }}">Sólo estudiantes</a>&nbsp; | &nbsp;
                <a href="{{ route('user.filter', ['level_id' => 2]) }}">Sólo profesores</a>&nbsp; | &nbsp;
                <a href="{{ route('user.filter', ['level_id' => 1]) }}">Sólo administradores</a>
            </div>            
        </div>

        <div class="pb80 pt30">

            <div class="d-flex row">

                @forelse($users as $user)

                    <div class="col-md-3 d-flex mb30">
                        <x-card-user :user="$user" />
                    </div>

                @empty

                    <div class="col-md-12">
                        <div class="em f18 ac py100 text-muted border">
                            <x-Icon name="emoji_neutro" size="60" color="#999" />
                            <p class="mt20">Aún no hay usuarios cargados</p>
                        </div>
                    </div>

                @endforelse

            </div>

        </div>

    </div>

@endsection