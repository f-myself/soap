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

    function getCarsByParam($year, $model=false, $year=false, $capacity=false, $color=false, $maxSpeed=false, $price=false)
    {
        return true;
    }
}