<?php
$client = new SoapClient('http://192.168.0.15/~user6/soap/task2/server/?WSDL');

// try 
// {
// $file = file('http://192.168.0.15/~user6/soap/task2/server/?WSDL');
// print_r($file);
// } catch (Exception $e)
// {
//     print_r($e->getMessage());
// }

echo "<pre>";

    try{
        $client->getCarById();
    }
    catch (Exception  $e)
    {
        echo($e);
    }

echo "</pre>";

include "templates/index.php";