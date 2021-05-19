<?php

function sendOutput($contentObjectAsJson) {
    header('Content-Type: application/json; charset=utf-8');
    echo $contentObjectAsJson;
}
