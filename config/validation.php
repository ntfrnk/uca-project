<?php

return [
	'messages' => [

		'user' => [
	        'level_id.required' => 'Tienes que indicar un tipo de usuario',
	        'level_id.numeric' => 'El tipo de dato es incorrecto',
	        'level_id.exists' => 'El tipo que indicas no existe en el sistema',
	        'name.required' => 'Debes ingresar un nombre',
	        'name.string' => 'El nombre contiene caracteres no permitidos',
	        'name.between' => 'El nombre debe tener entre 3 y 50 caracteres',
	        'lastname.required' => 'Debes ingresar un apellido',
	        'lastname.string' => 'El apellido contiene caracteres no permitidos',
	        'lastname.between' => 'El apellido debe tener entre 3 y 50 caracteres',
	        'email.required' => 'Debes ingresar una dirección de correo',
	        'email.email' => 'La dirección de correo no es válida',
	        'email.unique' => 'Esta dirección de correo ya está siendo usada',
	        'password.required' => 'Debes ingresar la contraseña',
	        'password.string' => 'La contraseña contiene caracteres no permitidos',
	        'password.between' => 'La contraseña debe tener entre 6 y 50 caracteres',
	        'password.confirmed' => 'Las nuevas contraseñas ingresadas no coinciden',
	        'old_password.required' => 'Debes ingresar la contraseña actual',
	        'old_password.current_password' => 'La contraseña actual no es correcta',
		],

		'course' => [
			'name.required' => 'Debes ingresar un nombre para el curso',
	        'name.string' => 'El nombre contiene caracteres no permitidos',
	        'name.between' => 'El nombre debe tener entre 5 y 50 caracteres',
	        'description.string' => 'La descripción contiene caracteres no permitidos',
		],

		'teachers' => [
			'user_id.required' => 'Debes indicar el profesor a asignar',
	        'user_id.exists' => 'El usuario no existe en el sistema',
	        'role_id.required' => 'Debes indicar un rol para el profesor',
	        'role_id.exists' => 'El rol no existe en el sistema',
		]

	],
];