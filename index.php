<?php
CONST WEBROOT = '/var/www/html';

$request = $_SERVER['REQUEST_URI'];

switch ($request)
{
    case '/api/v1/authenticate':
	    require WEBROOT . '/controllers/v1/authenticate.php';
	    break;
    case '/api/v1/quotation':
        require WEBROOT . '/controllers/v1/quotation.php';
        break;
    case '/favicon.ico':
        // Caveat of not setting up nginx better for static content
        header( 'Content-type: image/svg+xml' );
        require WEBROOT . '/images/favicon.svg';
        break;
    default:
	    require WEBROOT . '/controllers/v1/home.php';
	    break;
}

