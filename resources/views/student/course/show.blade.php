@extends('_layouts.app')

@section('content')

    <div class="container">
        
        <div class="page-header mt50">
            <a href="{{ route('student.course.index') }}" class="btn btn-light fr ml100 mt5">
                <x-Icon name="arrow_left" size="18" /> 
                Volver al listado de cursos
            </a>
            <h1>{{ $course->name }}</h1>
        </div>

        @if(session('status') === 'ok')
            <div class="pt10">
                <div class="alert alert-success">
                    Te inscribiste correctamente a este curso!
                </div>
            </div>
        @endif

        <div class="mt30 f17 pb70 row">

            <div class="col-md-8">
                {!! nl2br($course->description) !!}
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Profesores:
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse($course->teachers->sortBy('pivot.role_id') as $teacher)
                            <li class="list-group-item">
                                <b>{{ $teacher->coursesRoles->where('pivot.course_id', $course->id)->first()->name }}:</b> 
                                {{ $teacher->name }} {{ $teacher->lastname }}
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="mt30">
                    @if($course->students->where('id', auth()->user()->id)->first() === null)
                        <a href="{{ route('student.course.subscribe', $course) }}" class="btn btn-success w100">
                            Suscribirme a este curso
                        </a>
                    @else
                        <button type="button" class="btn btn-success disabled w100" disabled>
                            <x-Icon name="check" color="#FFF" class="mr5" /> 
                            Ya estás suscripto a este curso
                        </button>
                    @endif
                </div>
            </div>

        </div>

    </div>

@endsection