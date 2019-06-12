<?php

include "libs/XMLSOAP.php";
include "libs/cURLSOAP.php";

$XMLclient = new XMLSOAP;
$cURLclient = new cURLSOAP;

$countries = $XMLclient->ListOfCountryNamesByName()->ListOfCountryNamesByNameResult->tCountryCodeAndName;
$capital = $XMLclient->CapitalCity("JP")->CapitalCityResult;

$curlCountries = $cURLclient->ListOfCountryNamesByName();
$curlCapital = $cURLclient->CapitalCity("AU");
//var_dump($curlCapital);
//print_r($curlCountries);


include "templates/index.php";