<?php

abstract class Vehicle
{
    abstract function getVehicleType();

    const WHEELS = '4';

    public function startEngine()
    {
        echo "Двигатель " . $this->getVehicleType() . " завелся </br>";
    }

    public function stopEngine()
    {
        echo "Двигатель " . $this->getVehicleType() . " заглох </br>";
    }

    public function wheelsCount()
    {
        echo "Количество колес у данной техники: " . static::WHEELS . "</br>";
    }
}

class Car extends Vehicle
{
    public function getVehicleType()
    {
        return "машины";
    }
}

$car = new Car();
$car->startEngine();
$car->stopEngine();
$car->wheelsCount();

class Bike extends Vehicle
{
    const WHEELS = '2';

    public function getVehicleType()
    {
        return "мотоцикла";
    }
}

$bike = new Bike();
$bike->startEngine();
$bike->stopEngine();
$bike->wheelsCount();




