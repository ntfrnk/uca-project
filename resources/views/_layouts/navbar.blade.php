<header>
    <div class="container">
        <div class="fullnav">
            <div class="logo">
                <a class="brand" href="{{ route('home') }}"><span>UCA</span> <small>Capacitación</small></a>
            </div>
            <nav>
                @auth
                    @if(isAdmin())
                        <a href="{{ route('user.index') }}">Usuarios</a>
                        <a href="{{ route('course.index') }}">Cursos</a>
                    @else
                        <a href="{{ route('student.course.index') }}">Todos los cursos</a> 
                        <a href="{{ route('student.course.subscriptions') }}">Mis Cursos</a> 
                    @endif
                    <a href="{{ route('account.index') }}">Configuración</a>
                    <a href="{{ route('logout') }}">Salir</a>
                @endauth
            </nav>
        </div>
    </div>
</header>