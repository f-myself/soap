<?php

require_once "PDOHandler.php";

class ServiceHandler
{

    private $sql;

    function __construct()
    {
        $this->sql = new PDOHandler;
    }

    function getAllCars()
    {
        $allcars = $this->sql->newQuery()->select(['c.id', 'b.brand', 'model'])->from('cars c')->join('brands b', 'c.brand_id=b.id')->doQuery();
        return $allcars;
    }

    function getCarById($param)
    {
        //var_dump($id);
        $id = $param->CarId;
        if(is_numeric($id))
        {
            $car = $this->sql->newQuery()->select(['c.id, b.brand, c.model', 'c.year', 'c.capacity', 'c.color', 'c.max_speed', 'c.price'])
                             ->from('cars c')
                             ->join('brands b', 'c.brand_id=b.id')
                             ->where('c.id=' . $id)
                             ->doQuery();
            // var_dump($car);
            return $car[0];
        }
    }

    function getCarsByParam($params)
    {

        $year = $params->year;
        $model = $params->model;
        $capacity = $params->capacity;
        $color = $params->color;
        $maxSpeed = $params->maxSpeed;
        $price = $params->price;
        $carsByParams = $this->sql->newQuery()
                                  ->select(['c.id', 'b.brand', 'model'])
                                  ->from('cars c')
                                  ->join('brands b', 'c.brand_id=b.id')
                                  ->where("c.year<=" . $year);
        if ($model and is_string($model))
        {
            $carsByParams = $carsByParams->l_and("c.model='" . trim($model) . "'");
            echo $carsByParams->getQuery();
        }

        if ($capacity and is_numeric($capacity))
        {
            $carsByParams = $carsByParams->l_and("c.capacity<=" . $capacity);
        }

        if ($color and is_string($color))
        {
            $carsByParams = $carsByParams->l_and("c.color='" . trim($color) . "'");
        }

        if ($maxSpeed and is_numeric($maxSpeed))
        {
            $carsByParams = $carsByParams->l_and("c.max_speed<=" . $maxSpeed);
        }

        if ($price and is_numeric($price))
        {
            $carsByParams = $carsByParams->l_and("c.price<=" . $price);
        }
        $carsByParams = $carsByParams->doQuery();
        return $carsByParams;
    }

    public function newOrder($params)
    {
        $carId = $params->CarId;
        $firstName = $params->FirstName;
        $lastName = $params->LastName;
        $paymentId = $params->PaymentId;

        $newOrder = $this->sql->newQuery()
                              ->insert("orders", ['firstname', 'lastname', 'payment_id'], "'$firstName', '$lastName', $paymentId")
                              ->doQuery();
        $lastOrderIdResult = $this->sql->newQuery()
                                       ->select('id')
                                       ->from('orders')
                                       ->order('id')
                                       ->limit(1, true)
                                       ->doQuery();
        $lastOrderId = $lastOrderIdResult[0]->id;
        $addConn = $this->sql->newQuery()
                             ->insert('cars_orders', ['car_id', 'order_id'], "$carId, $lastOrderId")
                             ->doQuery();

        var_dump($this->sql->getErrors());
        if ($this->sql->getErrors())
        {
            return false;
        }
        return $this->sql->getQuery();
    }
}