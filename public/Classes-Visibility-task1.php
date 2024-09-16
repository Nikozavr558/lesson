<?php

class Car
{
    public $mark;
    public $model;
    public $year;

    public function __construct($mark, $model, $year)
    {
        $this->mark = $mark;
        $this->model = $model;
        $this->year = $year;
    }

    public function getinfo()
    {
        return "Mark: " . $this->mark . ", Model:" . $this->model . ", Year:" . $this->year;

    }

}

$car = new Car ("Vaz", "Lada", 2014);
echo $car->getinfo();