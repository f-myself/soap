<?php

require_once "SOAP.php";

class XMLSOAP implements SOAP
{
    private $client;

    function __construct()
    {
        $this->client = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');
    }

    public function ListOfCountryNamesByName()
    {
        $countries = $this->client->ListOfCountryNamesByName();
        return $countries;
    }

    public function CapitalCity($iso)
    {
        $capital = $this->client->CapitalCity(["sCountryISOCode" => $iso]);
        return $capital;
    }
}