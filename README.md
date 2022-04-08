## UCA PROJECT

*UCA Project* es un sistema desarrollado a fines de presentar una plataforma educativa, la cual consiste en una serie de cursos a los que sus alumnos pueden inscribirse voluntariamente una vez dentro del sistema.

Paralelamente, la plataforma de *UCA Project* permite a uno, o más usuarios con privilegios de administrador, la gestión de los cursos, suscripciones, y usuarios (que pueden ser alumnos, profesores u otros administradores); proporcionando así un control total a los encargados de gestionar el sistema.


## Tecnologías utilizadas

El *UCA Project* fue desarrollado combinando las más recientes técnicas y tecnologías tanto en lo que a frontend como a backend se refiere, entra las cuales destacan las siguientes:

- Laravel Framework 8.83.6
- PHP 7.4.19
- Composer 2.0.12
- PostgreSQL 11.0
- NodeJS 14.17.0
- NPM 8.0.0
- Bootstrap 5.1.3
- SASS 1.49.11

- [Simple, fast routing engine](https://laravel.com/docs/routing).


## Instalación y puesta en marcha

La instalación del *UCA Project* debe ser realizada respetando los siguientes pasos:

1. Descargar el repositorio (esto debe hacerse en el directorio de publicación del servidor):
	
	```
	git clone https://github.com/ntfrnk/uca-project.git
	```

2. Ingresar a la carpeta del proyecto

	```
	cd uca-project
	```

3. Instalar las dependencias de composer

	```
	composer install
	```

4. Copiar el archivo de entorno y generar la APP_KEY

	```
	cp .env.example .env
	php artisan key:generate
	```

5. Instalar las dependencias de NPM y realizar la compilación de archivos

	```
	npm install
	npm run prod
	```

6. Configurar las variables de entorno de Laravel (particularmente las variables que se detallan a continuación, que contienen la configuración de la conexión a la base de datos):

	```
	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=5432
	DB_DATABASE=
	DB_USERNAME=
	DB_PASSWORD=
	```
	
7. Una vez instalado el Framework con sus dependencias y configuraciones, pasamos a ejecutar las migraciones y seeders para inicializar la plataforma:

	```
	php artisan migrate --seed
	```

8. Ahora el sistema debería estar instalado; con sus tablas creadas y con sus datos básicos inicializados.


## Modelo de datos

![](http://frankoca.com.ar/images/DB.jpeg){width='600px'}


## Indicaciones de uso

Al ejecutar las migraciones y seeders el sistema creará una serie de datos imprescindibles para el funcionamiento de la plataforma. Uno de esos datos es un usuario genérico con permisos de administrador, que podrá acceder por primera vez a la plataforma para gestionar los cursos, alumnos, profesores, administradores y suscripciones.

Iniciar sesión con los siguientes datos (*):

- Usuario: admin@ucaproject.com
- Contraseña: admin

(*) Todos los usuarios que se crean luego de manera automática tendrán una misma contraseña para acceder, salvo que se modifique manualmente la misma. La contraseña será: 

```generic```

![](http://frankoca.com.ar/images/login.png){width='600px'}

En la primera pantalla sólo encontraremos el usuario administrador que se creó junto con la migración.

![](http://frankoca.com.ar/images/segunda.png){width='600px'}

Además están los botones numerados 1, 2, y 3, que permitirán crear usuarios manual o automáticamente, de la siguiente manera:

	1. Creación manual de usuarios (estudiantes, profesores y administradores).
	2. Creación automática de alumnos (con datos aleatorios).
	3. Creación automática de profesores (con datos aleatorios).

![](http://frankoca.com.ar/images/acciones-usuarios.png){width='600px'}

En esta imagen podemos ver encuadrados dos grupos de funcionalidades útiles para gestionar a los usuarios de la plataforma:

	1. Filtro de usuarios según su rango (alumnos, profesores, administradores).
	2. Opciones de edición / eliminación de usuarios.

![](http://frankoca.com.ar/images/cursos-acciones.png){width='600px'}

En este screenshot se puede observar las diferentes opciones que ofrece la plataforma para administrar los cursos.

	1. Creación de cursos manual / automáticamente (ídem usuarios).
	2. Vistazo rápido de cantidad de usuarios inscriptos.
	3. Opciones para cada curso:
		a. Gestión de alumnos inscriptos (se pueden agregar automáticamente).
		b. Gestión de profesores con distintos cargos (titular, suplente, etc)
		c. Edición de datos del curso.
		d. Eliminación del curso.
	4. API de generación de reporte JSON con los alumnos de cada curso.

![](http://frankoca.com.ar/images/cuenta.png){width='600px'}

En esta captura se puede ver el contenido de la opción "Configuración", donde el usuario logueado puede modificar sus datos de cuenta y contraseña.

![](http://frankoca.com.ar/images/alumno-cursos.png){width='600px'}

Aquí podemos observar la forma en que un estudiante puede ver el listado de cursos disponibles cuando ingresa a la plataforma.

![](http://frankoca.com.ar/images/alumno-cursos-detalle.png){width='600px'}

En esta imagen vemos un ejemplo de la vista del detalle de cada curso.

![](http://frankoca.com.ar/images/alumno-suscripciones.png){width='600px'}

En esta última captura vemos el listado de cursos a los que un alumno ya está suscrito, con la opción de eliminar esa suscripción.


