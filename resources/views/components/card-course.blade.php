<div class="card">
    <div class="card-body">
        <div class="truncate t3">
            <h5>{{ $course->name }}</h5>
        </div>
        <div>
            <b>Inscriptos:</b> {{ $course->students->count() }}
        </div>
        
        <div class="buttons mt10">
            <a href="/api/course/{{ $course->id }}/students" target="_blank" class="btn btn-sm btn-dark fr" title="Ver reporte de alumnos inscriptos">
                <x-Icon name="file" color="#FFF" size="18" />
            </a>
            <a href="{{ route('course.students', $course) }}" class="btn btn-sm btn-info" title="Alumnos">
                <x-Icon name="students" color="#FFF" size="18" />
            </a>
            <a href="{{ route('course.teachers', $course) }}" class="btn btn-sm btn-secondary" title="Profesores">
                <x-Icon name="teachers" color="#FFF" size="18" />
            </a>
            <a href="{{ route('course.edit', $course) }}" class="btn btn-sm btn-primary" title="Editar curso">
                <x-Icon name="edit" color="#FFF" size="18" />
            </a>
            <form action="{{ route('course.destroy', $course) }}" method="post" id="form-course-{{ $course->id }}" class="di">
                @csrf @method('delete')
                <button type="button" class="btn btn-sm btn-danger" onclick="delete_course('form-course-{{ $course->id }}');" title="Eliminar curso">
                    <x-Icon name="remove" color="#FFF" size="18" />
                </button>
            </form>
        </div>
    </div>
</div>