<?php

class ServiceClient
{
    private $client;
    private $error;

    function __construct()
    {
        $this->client = new SoapClient(WSDL_CLIENT_URL);
    }

    public function getError()
    {
        return $this->error;
    }

    public function getAllCars()
    {
        try
        {
            $allCars = $this->client->getAllCars();
        } catch (Exception $e) {
            $this->error = $e;
            return false;
        }
        
        if($allCars)
        {
            return $allCars;
        }
        $this->error = ERR_ALL_CARS;
        return false;
    }

    public function getCarById($id)
    {
        if(is_numeric($id))
        {
            try 
            {
                $carInfo = $this->client->getCarById(["CarId" => trim($id)]);
            } catch (Exception  $e) {
                $this->error = $e;
                return false;
            }
        }

        if( $carInfo->id and 
            $carInfo->brand and 
            $carInfo->model and 
            $carInfo->year and 
            $carInfo->capacity and 
            $carInfo->color and 
            $carInfo->max_speed and 
            $carInfo->price )
        {
            return $carInfo;
        }

        $this->error = ERR_CAR_BY_ID;
        return false;
    }

    public function getCarsByParam($post)
    {
        $year = trim(strip_tags($post['year']));
        $model = trim(strip_tags($post['model']));
        $capacity = trim(strip_tags($post['capacity']));
        $color = trim(strip_tags($post['color']));
        $maxSpeed = trim(strip_tags($post['maxSpeed']));
        $price = trim(strip_tags($post['price']));

        if($year and is_numeric($year))
        {
            try 
            {
                $allCars = $this->client->getCarsByParam(["year"     => $year,
                                                          "model"    => $model,
                                                          "capacity" => $capacity,
                                                          "color"    => $color,
                                                          "maxSpeed" => $maxSpeed,
                                                          "price"    => $price]);
            } catch (Exception $e) {
                $this->error = $e;
                return false;
            }
        }

        if (!is_numeric($year))
        {
            $this->error = ERR_CAR_PARAM_YEAR;
            return false;
        }

        if ($allCars)
        {
            return $allCars;
        }

        $this->error = ERR_CAR_BY_PARAMS;
        return false;       
    }

    public function newOrder($post)
    {
        $CarId = trim(strip_tags($post['CarId']));
        $FirstName = trim(strip_tags($post['FirstName']));
        $LastName = trim(strip_tags($post['LastName']));
        $PaymentId = trim(strip_tags($post['PaymentId']));
        
        if($CarId and $FirstName and $LastName and $PaymentId)
        {
            try 
            {
                $sendOrder = $this->client->newOrder(["CarId" => $CarId,
                                                      "FirstName" => $FirstName,
                                                      "LastName" => $LastName,
                                                      "PaymentId" => $PaymentId]);
                if ($sendOrder)
                {
                    return OK_NEW_ORDER;
                }
            } catch (Exception $e)
            {
                $this->error = $e;
                return false;
            }
        }
        $this->error = ERR_NEW_ORDER;
        return false;
    }

    function __destruct()
    {
        $this->client = NULL;
    }
}