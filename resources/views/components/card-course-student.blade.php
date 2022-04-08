<div class="card">
    <div class="card-body">
        <h5 class="card-title truncate t2">{{ $course->name }}</h5>
        <p class="card-text truncate t3">{{ $course->description }}</p>
        <div class="">
            <a href="{{ route('student.course.show', $course) }}" class="btn btn-info">Ver detalles</a>
            @if(!$unsubscription)

                @if(!$course->subscribed)
                    <a href="{{ route('student.course.subscribe', $course) }}" class="btn btn-primary">Suscribirme</a>
                @else
                    <a href="{{ route('student.course.subscribe', $course) }}" class="btn btn-success disabled" disabled>
                        <x-Icon name="check" color="#FFF" size="18" class="mr5" />
                        Suscrito
                    </a>
                @endif

            @else

                <a href="{{ route('student.course.unsubscribe', $course) }}" class="btn btn-outline-danger">Anular suscripción</a>

            @endif
        </div>
    </div>
</div>