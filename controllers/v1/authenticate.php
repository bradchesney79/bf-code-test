<?php

use Http\Message;



if ($_SERVER['REQUEST_METHOD']=='POST') {
    $jwt = new \BradChesney79\EHJWT('super-secure-secret');

    $jwt->addOrUpdateJwtClaim('iss', 'Battleface Test');
    $jwt->addOrUpdateJwtClaim('aud', 'administration');
    $jwt->addOrUpdateJwtClaim('iat', $jwt->getUtcTime());
    $jwt->addOrUpdateJwtClaim('nbf', '0');
    $jwt->addOrUpdateJwtClaim('sub', 'John Jingleheimer Schmidt');
    $jwt->addOrUpdateJwtClaim('jti', $jwt->getUtcTime());
    $jwt->addOrUpdateJwtClaim('exp', '1887525317');

    $jwt->createToken();

    header('Authorization: Bearer ' . $jwt->getToken());
}

require WEBROOT . '/endpoints/authenticate.php';
