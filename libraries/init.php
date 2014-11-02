<?php

/* Una página de error personalizada */

function errorPage() {
	require_once( ROOT . DS . 'application/views/404.html');
	die();
}

function routes($controllersApplication) {

    global $url;

    $urlArray = array();
    $urlArray = explode("/",$url);

    if ( in_array($urlArray[0], $controllersApplication) ) {
 
	    $controller = $urlArray[0];
	    array_shift($urlArray);
	    
	    $action = $urlArray[0];
	    
	    array_shift($urlArray);
	    $queryString = $urlArray;
	 	
	    $controllerName = $controller;
	    $controller 	= ucwords($controller);
	    $dispatch 		= new $controller($controllerName,$action);
	 
	    if ((int)method_exists($controller, $action)) {
	        call_user_func_array(array($dispatch,$action),$queryString);
	    } else {
	        errorPage();
	    }

	} else {
		errorPage();
	}
	
}

function loadClass() {
	require_once ('../application/models/modelo.php');
	require_once ('../application/controllers/main.php');
}

/* Añadir aquí los nuevos controladores que se vayan generando */
$controllersApplication = ['main'];

loadClass();
routes($controllersApplication);