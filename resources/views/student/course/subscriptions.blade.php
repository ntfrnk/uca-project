@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30 mb30">
            <h1>Mis suscripciones a cursos</h1>
        </div>

        @if(session('status') === 'ok')
            <div class="pt10">
                <div class="alert alert-success">
                    Anulaste correctamente la suscripción al curso: <b>{{ session('course') }}</b>
                </div>
            </div>
        @endif

        <div class="d-flex flex-wrap row mt30">
            @forelse(user()->courses as $course)
                <div class="col-md-4 col-lg-3 mb30 d-flex">
                    <x-card-course-student :course="$course" :unsubscription="true" />
                </div>
            @empty
                <div class="py100 border ac">
                    <x-Icon name="emoji_neutro" size="60" color="#999" />
                    <p class="pt20 f20 i text-muted">Aún no te suscribiste a ningún curso</p>
                </div>
            @endforelse
        </div>

    </div>

@endsection