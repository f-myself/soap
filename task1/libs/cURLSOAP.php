<?php

require_once "SOAP.php";

class cURLSOAP implements SOAP
{
    private $url;

    function __construct()
    {
        $this->url = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
    }

    public function ListOfCountryNamesByName()
    {
        $xmlData = '<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
        '<soap:Body>'.
            '<ListOfCountryNamesByName xmlns="http://www.oorsprong.org/websamples.countryinfo">'.
            '</ListOfCountryNamesByName>'.
        '</soap:Body>'.
        '</soap:Envelope>';
        $headers = [
        "POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1",
        "Host: webservices.oorsprong.org",
        "Content-Type: text/xml; charset=utf-8",
        "Content-length: " . strlen($xmlData)
        ];

        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $xmlData);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $headers);
        $output = curl_exec($ch);
        curl_close($ch);

        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $output);
        $xml = new SimpleXMLElement($response);
        $result = $xml->soapBody->mListOfCountryNamesByNameResponse->mListOfCountryNamesByNameResult;
        
        return $result;
    }

    public function CapitalCity($iso)
    {
        $xmlData = '<?xml version="1.0" encoding="utf-8"?>'.
        '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
          '<soap:Body>'.
            '<CapitalCity xmlns="http://www.oorsprong.org/websamples.countryinfo">'.
              '<sCountryISOCode>' . $iso . '</sCountryISOCode>'.
            '</CapitalCity>'.
          '</soap:Body>'.
        '</soap:Envelope>';

        $headers = [
            "POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1",
            "Host: webservices.oorsprong.org",
            "Content-Type: text/xml; charset=utf-8",
            "Content-length: " . strlen($xmlData)
            ];
            
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $xmlData);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     $headers);
        $output = curl_exec($ch);
        curl_close($ch);

        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $output);
        $xml = new SimpleXMLElement($response);
        $result = $xml->soapBody->mCapitalCityResponse->mCapitalCityResult;

        return $result;
    }
}