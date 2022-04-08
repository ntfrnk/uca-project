<div class="card">
    <div class="card-body">
        <div>{{ $user->level->name }}</div>
        <div class="truncate t1">
            <h4 class="m0">{{ $user->lastname }}, {{ $user->name }}</h4>
        </div>
        <div>{{ $user->email }}</div>
        
        <div class="buttons mt20">
            <a href="{{ route('course.students.detach', [$course, $user]) }}" class="btn btn-sm btn-danger" title="Quitar a este alumno">
                <x-Icon name="times" color="#FFF" size="18" />
            </a>
        </div>
    </div>
</div>