<?php

class car
{
    public $brand;
    public $model;
    public $year;

    public function __construct($brand, $model, $yaer)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $yaer;
    }

    public function getInfo()
    {
        return "Brand: " . $this->brand . ", Model: " . $this->model . ", Year: " . $this->year;
    }
}

$car = new car("Volkswagen", "Passat B8", "2022");

echo $car->getInfo();
