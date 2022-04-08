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
	
	``
	git clone https://github.com/ntfrnk/uca-project.git

2. Ingresar a la carpeta del proyecto

	cd uca-project

3. Copiar el archivo de entorno

	cp .env.example .env

4. Configurar las variables de entorno de Laravel (particularmente las variables que se detallan a continuación):

	APP_URL=

	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=5432
	DB_DATABASE=
	DB_USERNAME=
	DB_PASSWORD=



4. Instalar las dependencias de composer

	composer install

4. 
