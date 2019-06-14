<?php

include "config.php";
include "libs/PDOHandler.php";
include "libs/ServiceHandler.php";

$obj = new ServiceHandler;

//var_dump($obj->getAllCars());
echo "<pre>";
//var_dump($obj->getCarById(2));
var_dump($obj->getCarsByParam(2019, false, 5, false, false, 200000));
echo "</pre>";

