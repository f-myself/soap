<?php

ini_set("soap.wsdl_cache_enabled", 0);
$client = new SoapClient('http://soap.loc/soap/task2/server/?WSDL');

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $errors = "";

    $year = trim(strip_tags($_POST['year']));

    //var_dump($_POST);

    $model = trim(strip_tags($_POST['model']));
    $capacity = trim(strip_tags($_POST['capacity']));
    $color = trim(strip_tags($_POST['color']));
    $maxSpeed = trim(strip_tags($_POST['maxSpeed']));
    $price = trim(strip_tags($_POST['price']));

    $allCars = $client->getCarsByParam(array("year"     => $year,
                                             "model"    => $model,
                                             "capacity" => $capacity,
                                             "color"    => $color,
                                             "maxSpeed" => $maxSpeed,
                                             "price"    => $price
                                            ));
    
    if(!$allCars)
    {
        $errors = "No car by this params. Please, try again";
    }

    if(!$year or !is_numeric($year))
    {
        $errors = "Hey! I saw what you have done, angry hacker! Stop touching my code! Year is numeric and required. Cuz I said so.";
    }

} else {
    $allCars = $client->getAllCars();
}

// try 
// {
// $file = file('http://192.168.0.15/~user6/soap/task2/server/?WSDL');
// print_r($file);
// } catch (Exception $e)
// {
//     print_r($e->getMessage());
// }

// echo "<pre>";

//     try{
//         var_dump($client->newOrder(["CarId" => 1, "FirstName" => "Vasya", "LastName" => "Pupkin", "PaymentId" => 2]));
//     }
//     catch (Exception  $e)
//     {
//         echo($e);
//     }

// echo "</pre>";



if($_GET['car'] and is_numeric($_GET['car']))
{
    $carInfo = $client->getCarById(["CarId" => (int)$_GET['car']]);
    if(!$carInfo->year)
    {
        $carInfo = "Sorry, can't find car with this ID :(";
    }
    include "templates/car.php";
} else {
    include "templates/index.php";
}
