<?php

//require '/var/www/html/vendor/autoload.php';

//use BradChesney79\EHJWT as EHJWT;
require WEBROOT . '/endpoints/quotation.php';
require WEBROOT . '/utility/utility.php';
require WEBROOT . '/vendor/bradchesney79/effortless-hs256-jwt/src/EHJWT/Ehjwt.php';
require WEBROOT . '/models/Quotation.php';

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $jwt = new BradChesney79\EHJWT('super-secure-secret');

    //error_log(getBearerToken(),0, '/var/log/nginx/error.log');

    $contentObject = new BattlefaceTestUtility();

    $authToken=$contentObject->getBearerToken();

    if ($jwt->loadToken($authToken)) {

        $requestPayload = file_get_contents('php://input');

        $quotationData = json_decode($requestPayload);

        // John's User ID is 5, His quotation ID is also 5 -- very suspicious
        $quotationObject = new Quotation(5, 5);

        if (strlen($quotationData->honeypot) > 0) {
            die; // go away low quality, dumb bots
        }

        // validate as date data


        $quotationObject->setStartDate($quotationData->trip-start-date);
        $quotationObject->setEndDate($quotationData->trip-end-date);




        // validate against currency whitelist

        $quotationObject->setOrUpdateCurrency($quotationData->country);

        // validate numeric ages between 0 - 130

        $quotationObject->setAgesOfTravellers($quotationData->age);


        $quotationObject->setTotalCost();

        $quotationObject->getQuotationAsJson();

        /*
         object(stdClass)#4 (5) {
          ["trip-start-date"]=>
          string(16) "2021-05-19T17:29"
          ["trip-end-date"]=>
          string(16) "2021-05-26T17:29"
          ["honeypot"]=>
          string(0) ""
          ["age"]=>
          array(1) {
            [0]=>
            string(2) "50"
          }
          ["country"]=>
          string(3) "MDL"
}
         */



        $contentObject->setOrUpdateOutputProperty('success', true);
        $contentObject->setOrUpdateOutputProperty('error','');
        //$contentObject->setOrUpdateOutputProperty('$requestPayload', stripslashes(stripslashes(json_encode($requestPayload))));
        //$contentObject->setOrUpdateOutputProperty('$_SERVER', json_encode($_SERVER, JSON_PRETTY_PRINT | JSON_UNESCAPED_LINE_TERMINATORS | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK));
        $contentObject->setOrUpdateOutputProperty('quoteObject', $quotationObject->getQuotationAsJson());

        sendOutput($contentObject->getOutputObjectAsJson());
        //echo "\n" . var_dump($quotationData->country);
    }
}