<div class="card">
	<div class="card-body">
		<h5 class="card-title truncate t2">{{ $course->name }}</h5>
		<p class="card-text truncate t3">{{ $course->description }}</p>
		<a href="{{ route('course.inscription', $course) }}" class="btn btn-primary">Inscribirme</a>
	</div>
</div>