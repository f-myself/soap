<?php

include "config.php";
include "libs/PDOHandler.php";
include "libs/ServiceHandler.php";

$obj = new ServiceHandler;

//var_dump($obj->getAllCars());

var_dump($obj->getCarById(2));