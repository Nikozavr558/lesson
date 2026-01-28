<?php

interface ShapeInterface
{
    public function getArea();
}

class Circle implements ShapeInterface // Класс КРУГА
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return pi() * pow($this->radius, 2);
    }

}

class Square implements ShapeInterface
{
    private $a;                              // ошибка. тут я формулу прямоугольника сделал. "а*b" а нужно "a*a"

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function getArea()
    {
        return $this->a * $this->a;
    }
}

class Rectangle implements ShapeInterface
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getArea()
    {
        return $this->a * $this->b;
    }
}

$circle = new circle(1);
$square = new square(4);
$rectangle = new rectangle(2, 10);

echo $circle->getArea() . "<br>";
echo $square->getArea() . "<br>";
echo $rectangle->getArea() . "<br>";



