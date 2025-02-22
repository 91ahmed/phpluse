<?php

	$route = new \Core\Modules\Routes\Route();

	// Remove specific words from the URL
	$route->remove([DIR]);

	$route->middleware(['app'])->get('/dashboard', 'HomeController@index');

	// Admins
	$route->middleware(['app'])->get('/dashboard/admin/create', 'AdminsController@create');
	$route->middleware(['app'])->post('/dashboard/admin/create/request', 'AdminsController@createRequest');
?>