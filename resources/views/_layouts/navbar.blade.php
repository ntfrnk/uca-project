<header>
    <div class="container">
        <div class="fullnav">
            <div class="logo">
                <a class="brand" href="{{ route('home') }}">UCA Cursos</a>
            </div>
            <nav>
                @auth
                    <a href="{{ route('home') }}">Cursos</a> 
                    <a href="{{ route('settings') }}">Configuración</a>
                    <a href="{{ route('logout') }}">Salir</a>
                @endauth
            </nav>
        </div>
    </div>
</header>