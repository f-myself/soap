<?php

include "config.php";
include "libs/ServiceClient.php";

ini_set("soap.wsdl_cache_enabled", 0);

$service = new ServiceClient;


if($_GET['car'])
{
    $carInfo = $service->getCarById($_GET['car']);
    $errors = $service->getError();
    include "templates/car.php";
} elseif($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['year'])
{
    $allCars = $service->getCarsByParam($_POST);
    $errors = $service->getError();
    include "templates/index.php";
} elseif($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['CarId'])
{
    $status = $service->newOrder($_POST);
    $allCars = $service->getAllCars();
    $errors = $service->getError();
    include "templates/index.php";
} else {
    $allCars = $service->getAllCars();
    $errors = $service->getError();
    include "templates/index.php";
}


