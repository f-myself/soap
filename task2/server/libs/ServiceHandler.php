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

    function getCarById($id)
    {
        if(is_numeric($id))
        {
            $car = $this->sql->newQuery()->select(['model', 'year', 'capacity', 'color', 'max_speed', 'price'])->from('cars')->where('id=' . $id)->doQuery();
            return $car;
        }
    }

    function getCarsByParam($year, $model=null, $capacity=null, $color=null, $maxSpeed=null, $price=null)
    {
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
}