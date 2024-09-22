<?php

abstract class Vehicle
{
    const WHEELS = '4';

    public function startEngine()
    {
        echo "Двигатель завелся " . "</br>";
    }

    public function stopEngine()
    {
        echo "Двигатель заглох " . "</br>";
    }

    public function wheelsCount()
    {
        echo "Количество колес у данной техники: " . static::WHEELS . "</br>";
    }
}

class Car extends Vehicle
{

}

$car = new Car();
echo $car->startEngine() . "</br>";
echo $car->stopEngine() . "</br>";
echo $car->wheelscount() . "</br>";

class Bike extends Vehicle
{
    const WHEELS = '2';
}

$bike = new Bike();
echo $bike->startEngine() . "</br>";
echo $bike->stopEngine() . "</br>";
echo $bike->wheelsCount();




