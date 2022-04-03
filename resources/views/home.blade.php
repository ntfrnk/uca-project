@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt30">
            <h1>Cursos especiales</h1>
        </div>

        @if(session('resp'))
            <div>
                {{ session('resp') }}
            </div>
        @endif

        <div class="d-flex flex-wrap row mt30">
            @forelse($courses as $course)
                <div class="col-md-4 col-lg-3 mb30 d-flex">
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