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

Como tecnología principal, el *UCA Project* utiliza Laravel 8, el cual conecta a todas las demás antes mencionadas, y se busca aprovechar al máximo las características ofrecidas por este framework, tales como los Middlewares, Helpers, Providers, View Composers, Components, archivos de configuración y todas aquellas relacionadas al modelo de datos, que se detalla más adelante.


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


## Modelo de datos y convenciones

El modelo de datos se desarrolló respetando las convenciones indicadas en la documentación oficial de Laravel 8, haciendo uso de algunas de sus características nativas, como su ORM Eloquent, y su sistema de migraciones, seeders y factories.

El sistema consiste en un esquema relacional formado por seis tablas, de las cuales surgen cuatro modelos, conectados por dos tablas dinámicas que funcionan como pivot's entre los modelos antes mencionados.

Las tablas son las siguientes:

	- levels (Tipos de usuarios: alumnos|profesores|administradores)
	- users (Datos de usuarios)
	- courses (Información de cada curso)
	- roles (Tipos de profesores: titular|suplente|adjunto)
	- subscriptions (guarda las suscripciones de alumnos a cursos)
	- teachers (guarda las relaciones entre profesores, roles y cursos)

Los modelos son los siguientes:

	- Level
	- User
	- Course
	- Role

El esquema relacional es el siguiente:

<img src="http://frankoca.com.ar/images/DB.jpeg" width='700px' />


## Indicaciones de uso

Al ejecutar las migraciones y seeders el sistema creará una serie de datos imprescindibles para el funcionamiento de la plataforma. Uno de esos datos es un usuario genérico con permisos de administrador, que podrá acceder por primera vez a la plataforma para gestionar los cursos, alumnos, profesores, administradores y suscripciones.

Iniciar sesión con los siguientes datos (*):


	Usuario: admin@ucaproject.com
	Contraseña: admin


(*) Todos los usuarios que se crean luego de manera automática tendrán una misma contraseña para acceder, salvo que se modifique manualmente la misma. La contraseña será: 

	generic


<img src="http://frankoca.com.ar/images/login.png" width='700px' />

En la primera pantalla sólo encontraremos el usuario administrador que se creó junto con la migración.


<img src="http://frankoca.com.ar/images/segunda.png" width='700px' />

Además están los botones numerados 1, 2, y 3, que permitirán crear usuarios manual o automáticamente, de la siguiente manera:

	1. Creación manual de usuarios (estudiantes, profesores y administradores).
	2. Creación automática de alumnos (con datos aleatorios).
	3. Creación automática de profesores (con datos aleatorios).


<img src="http://frankoca.com.ar/images/acciones-usuarios.png" width='700px' />

En esta imagen podemos ver encuadrados dos grupos de funcionalidades útiles para gestionar a los usuarios de la plataforma:

	1. Filtro de usuarios según su rango (alumnos, profesores, administradores).
	2. Opciones de edición / eliminación de usuarios.


<img src="http://frankoca.com.ar/images/cursos-opciones.png" width='700px' />

En este screenshot se puede observar las diferentes opciones que ofrece la plataforma para administrar los cursos.

	1. Creación de cursos manual / automáticamente (ídem usuarios).
	2. Vistazo rápido de cantidad de usuarios inscriptos.
	3. Opciones para cada curso:
		a. Gestión de alumnos inscriptos (se pueden agregar automáticamente).
		b. Gestión de profesores con distintos cargos (titular, suplente, etc)
		c. Edición de datos del curso.
		d. Eliminación del curso.
	4. API de generación de reporte JSON con los alumnos de cada curso.


<img src="http://frankoca.com.ar/images/cuenta.png" width='700px' />

En esta captura se puede ver el contenido de la opción "Configuración", donde el usuario logueado puede modificar sus datos de cuenta y contraseña.


<img src="http://frankoca.com.ar/images/alumno-cursos.png" width='700px' />

Aquí podemos observar la forma en que un estudiante puede ver el listado de cursos disponibles cuando ingresa a la plataforma.


<img src="http://frankoca.com.ar/images/alumno-cursos-detalle.png" width='700px' />

En esta imagen vemos un ejemplo de la vista del detalle de cada curso.


<img src="http://frankoca.com.ar/images/alumno-suscripciones.png" width='700px' />

En esta última captura vemos el listado de cursos a los que un alumno ya está suscrito, con la opción de eliminar esa suscripción.


