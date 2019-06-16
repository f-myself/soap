<?php
ini_set("soap.wsdl_cache_enabled", 0);


include "config.php";
include "libs/PDOHandler.php";
include "libs/ServiceHandler.php";

$obj = new ServiceHandler;

// var_dump($obj->getAllCars());
// echo "<pre>";
// var_dump($obj->newOrder());
// //var_dump($obj->getCarsByParam(2019, false, 5, false, false, 200000));
// echo "</pre>";

$server = new SoapServer(WSDL_URL);
$server->setClass('ServiceHandler', array('cache_wsdl' => WSDL_CACHE_NONE));
//var_dump($server->getFunctions());
$server->handle();

