<?php

abstract class Vehicle
{
    const WHEELS = '4';

    abstract public function startEngine();

    abstract public function stopEngine();

    abstract public function wheelsCount();
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

    public function wheelsCount()
    {
        echo "Колес у машины: " . Car::WHEELS . "</br>";
    }


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

    public function wheelsCount()

    {
        echo "Колес у мотоцикла: " . Bike::WHEELS . "</br>";
    }

}

$car = new Car();
$car->startEngine();
$car->stopEngine();
$car->wheelsCount();

$bike = new Bike();
$bike->startEngine();
$bike->stopEngine();
$bike->wheelsCount();






