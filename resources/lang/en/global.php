<?php

return [
	
	'user-management' => [
		'title' => 'Admon de usuarios',
		'created_at' => 'Tempo',
		'fields' => [
		],
	],
	
	'permissions' => [
		'title' => 'Permisos',
		'created_at' => 'Tempo',
		'fields' => [
			'name' => 'Nombre',
		],
	],
	
	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombre',
			'permission' => 'Permisos',
		],
	],
	
	'process' => [
		'title' => 'Procesos',
		'process' => 'Procesar',
		'approved' => 'Aprobados',
		'unapproved' => 'No Aprobados',
		'finished' => 'Finalizados',
		'created_at' => 'Time',
		'fields' => [
			'description' => 'Descripción',
			'process_id' => 'Núm proceso',
			'start' => 'Fecha inicio',
			'end' => 'Fecha fin',
			'state' => 'Departamento',
			'date' => 'Fecha',
			'city' => 'Municipio',
			'approved' => 'Aprobado',
			'finished' => 'Terminado',
			'status' => 'Estado',
		],
	],
	
	'users' => [
		'title' => 'Usuarios',
		'title1' => 'Solicitante',
		'title2' => 'Aprobador',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombre',
			'email' => 'Correo',
			'password' => 'Contraseña',
			'roles' => 'Roles',
			'mobile' => 'Celular',
			'remember-token' => 'Recordar token',
		],
	],
	
	'app_create' => 'Crear',
	'app_save' => 'Salvar',
	'app_edit' => 'Editar',
	'app_view' => 'Ver',
	'app_update' => 'Actualizar',
	'app_upload' => 'Cargar Archivo',
	'app_finish' => 'Finalizar',
	'app_list' => 'Listar',
	'app_to' => ' para ',
	'app_no_entries_in_table' => 'No hay registros',
	'custom_controller_index' => 'Inicio.',
	'app_logout' => 'Salir',
	'app_add_new' => 'Agregar nuevo',
	'app_are_you_sure' => 'Seguro de continuar?',
	'app_back_to_list' => 'Volver al listado',
	'app_dashboard' => 'Inicio',
	'app_delete' => 'Borrar',
	'global_title' => 'Comforce',
	'global_title_short' => 'CFC',
];