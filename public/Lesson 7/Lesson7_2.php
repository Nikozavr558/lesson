<?php

abstract class Vehicle
{
    protected const WHEELS = 4;

    abstract function startEngine();

    abstract function stopEngine();
}

class Car extends Vehicle
{
    public function startEngine()
    {
        echo "car start engine<br>";
    }

    public function stopEngine()
    {
        echo "car stop engine<br>";
    }

    public function showWheels()
    {
        echo "car wheels: " . self::WHEELS . "<br>";
    }
}

class Bike extends Vehicle
{
    public const WHEELS = 2;

    public function startEngine()
    {
        echo "bike start engine<br>";
    }

    public function stopEngine()
    {
        echo "bike stop engine<br>";
    }

    public function showWheels()
    {
        echo "bike wheels: " . self::WHEELS . "<br>";
    }
}


$car = new Car();
$bike = new Bike();

$car->startEngine();
$car->stopEngine();
$car->showWheels();

echo "<br>";

$bike->startEngine();
$bike->stopEngine();
$bike->showWheels();