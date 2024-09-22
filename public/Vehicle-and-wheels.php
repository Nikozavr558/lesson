<?php

abstract class Vehicle
{
    abstract function getVehicleType();

    abstract function getVehicleSoundStart();

    abstract function getVehicleSoundStop();

    const WHEELS = '4';

    public function startEngine()
    {
        echo "Двигатель " . $this->getVehicleType() . " завелся " . $this->getVehicleSoundStart() . "</br>";
    }

    public function stopEngine()
    {
        echo "Двигатель " . $this->getVehicleType() . " заглох " . $this->getVehicleSoundStop() . "</br>";
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

    public function getVehicleSoundStart()
    {
        return "ТЫР-ТЫР-ТЫР-Врууум";
        // TODO: Implement getVehicleSound() method.
    }

    public function getVehicleSoundStop()
    {
        return "все, машинка спать идите в жопу!";  // TODO: Implement getVehicleSoundStop() method.
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

    public function getVehicleSoundStart()
    {
        return "ДРын-дын-дын-врум-врум";
    }

    public function getVehicleSoundStop()
    {
        return "Бензин тютю! Иди пешком!";   // TODO: Implement getVehicleSoundStop() method.
    }
}

$bike = new Bike();
$bike->startEngine();
$bike->stopEngine();
$bike->wheelsCount();




