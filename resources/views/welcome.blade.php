@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30">
            <h1>Cursos especiales</h1>
        </div>

        <div class="d-flex flex-wrap row mt30">
            @forelse($courses as $course)
                <div class="col-3 mb30 d-flex">
                    @component('course.card')
                        @slot('course', $course)
                    @endcomponent
                </div>
            @empty
                <div>
                    No hay cursos
                </div>
            @endforelse
        </div>

    </div>

@endsection