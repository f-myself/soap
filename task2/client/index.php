<?php
$client = new SoapClient('http://soap.loc/soap/task2/server/?WSDL');

echo "<pre>";
try 
{
    $cars = $client->getCarById(1);
} catch(Exception $e)
{ 
    print_r($e);
}  

echo "</pre>";

include "templates/index.php";