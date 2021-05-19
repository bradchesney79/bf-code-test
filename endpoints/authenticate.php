<?php

function sendOutput($contentObjectAsJson, $authToken = '')
{
    setcookie('auth-token', $authToken, 0, '/');
    header('Content-Type: application/json; charset=utf-8');
    echo $contentObjectAsJson;
}