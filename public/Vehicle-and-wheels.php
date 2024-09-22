<?php

abstract class Vehicle
{
    const WHEELS = '4';

    abstract public function startEngine();

    abstract public function stopEngine();
}

class car extends Vehicle
{
    public function startEngine()
    {
        echo "Машинка завелась: врум-врум-врум  " . "</br>";  // TODO: Implement startEngine() method.
    }

    public function stopEngine()
    {
        echo "Машинка заглохла: Брррррр " . "</br>";
    }
    // TODO: Implement stopEngine() method.
}

class bike extends Vehicle
{
    const WHEELS = '2';

    public function startEngine()
    {
        echo "Мотоцикл завелся: дыр-дыр-дыр " . "</br>";
    }

    public function stopEngine()
    {
        echo "Мотоцикл заглох: бы-бы-бы-бы" . "</br>";
    }
}

$car = new Car();
$car->startEngine();
$car->stopEngine();

echo "Колес машины: " . Car::WHEELS . "</br>";

$bike = new Bike();
$bike->startEngine();
$bike->stopEngine();

echo "Колес мотоцикла: " . Bike::WHEELS;




