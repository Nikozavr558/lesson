<?php

abstract class Vehicle
{
    const WHEELS = '4';

    abstract public function startEngine();

    abstract public function stopEngine();

    public function wheelsCount()
    {
        echo "Количество колес у данной техники: " . static::WHEELS . "</br>";
    }
}

class Car extends Vehicle
{
    public function startEngine()
    {
        return "Машина завелась ";
    }

    public function stopEngine()
    {
        return "Машина заглохла ";
    }
}


$car = new Car();
echo $car->startEngine() . "</br>";
echo $car->stopEngine() . "</br>";
echo $car->wheelscount() . "</br>";

class Bike extends Vehicle
{
    const WHEELS = '2';

    public function startEngine()
    {
        return "Мотоцикл завелся ";
    }

    public function stopEngine()
    {
        return "Мотоцикл заглох ";
    }
}

$bike = new Bike();
echo $bike->startEngine() . "</br>";
echo $bike->stopEngine() . "</br>";
echo $bike->wheelsCount();




