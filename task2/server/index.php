<?php
ini_set("soap.wsdl_cache_enabled", 0);


include "config.php";
include "libs/PDOHandler.php";
include "libs/ServiceHandler.php";

$obj = new ServiceHandler;

$server = new SoapServer(WSDL_URL);
$server->setClass('ServiceHandler', array('cache_wsdl' => WSDL_CACHE_NONE));
$server->handle();

