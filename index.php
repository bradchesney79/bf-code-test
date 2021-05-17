<?php

$request = $_SERVER['REQUEST_URI'];

function setApiHeaders() {
    header('Content-type:application/json;charset=utf-8');
}

switch ($request) {
    case '/api/v1/shouting':
        setApiHeaders();
	    require __DIR__ . '/controllers/v1/shouting.php';
	    break;
    case '/api/v1/status':
        setApiHeaders();
        require __DIR__ . '/controllers/v1/status.php';
    default:
	    require __DIR__ . '/controllers/v1/home.php';
	    break;
}


