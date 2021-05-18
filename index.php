<?php
CONST WEBROOT = '/var/www/html';

require WEBROOT . '/vendor/autoload.php';

use bradchesney79\EHJWT;

$request = $_SERVER['REQUEST_URI'];

function setApiHeaders()
{
    header('Content-type:application/json;charset=utf-8');
}

function initJsonResponse()
{
    $output = new class {
    };
    $output->success = false;
    $output->error = '';
}

switch ($request)
{
    case '/api/v1/authenticate':
        initJsonResponse();
	    require WEBROOT . '/controllers/v1/authenticate.php';
	    break;
    case '/api/v1/quotation':
        setApiHeaders();
        initJsonResponse();
        require WEBROOT . '/controllers/v1/quotation.php';
        break;
    case '/api/v1/status':
        setApiHeaders();
        initJsonResponse();
        require WEBROOT . '/controllers/v1/status.php';
    default:
	    require WEBROOT . '/controllers/v1/home.php';
	    break;
}


