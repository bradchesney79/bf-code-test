<?php

//require '/var/www/html/vendor/autoload.php';

//use BradChesney79\EHJWT as EHJWT;
require WEBROOT . '/endpoints/authenticate.php';
require WEBROOT . '/utility/utility.php';
require WEBROOT . '/vendor/bradchesney79/effortless-hs256-jwt/src/EHJWT/Ehjwt.php';


if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $jwt = new BradChesney79\EHJWT('super-secure-secret');

    $jwt->addOrUpdateJwtClaim('iss', 'Battleface Test');
    $jwt->addOrUpdateJwtClaim('aud', 'administration');
    $jwt->addOrUpdateJwtClaim('iat', $jwt->getUtcTime());
    $jwt->addOrUpdateJwtClaim('nbf', '0');
    $jwt->addOrUpdateJwtClaim('sub', 'John Jingleheimer Schmidt');
    $jwt->addOrUpdateJwtClaim('jti', $jwt->getUtcTime());
    $jwt->addOrUpdateJwtClaim('exp', '1887525317');

    $jwt->createToken();

    $contentObject = new BattlefaceTestUtility();
    $contentObject->setOrUpdateOutputProperty('success', true);

    // no person in their right mind would normally expose the $_SERVER super global...
    $contentObject->setOrUpdateOutputProperty('_SERVER', json_encode($_SERVER, JSON_PRETTY_PRINT | JSON_UNESCAPED_LINE_TERMINATORS | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));


    sendOutput($contentObject->getOutputObjectAsJson(), $jwt->getToken());



}

if ($_SERVER['REQUEST_METHOD']=='DELETE')
{
    $contentObject = new BattlefaceTestUtility();
    $contentObject->setOrUpdateOutputProperty('success', true);

    sendOutput($contentObject->getOutputObjectAsJson());
}
