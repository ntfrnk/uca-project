<header>
    <div class="container">
        <div class="fullnav">
            <div class="logo">
                <a class="brand" href="#">UCA Cursos</a>
            </div>
            <nav>
                <a href="#">Home</a>
                <a href="#">Cursos</a>
                @auth
                    <a href="#">Configuración</a>
                    <a href="#">Salir</a>
                @else
                    <a href="#">Ingresar</a>
                @endauth
            </nav>
        </div>
    </div>
</header>