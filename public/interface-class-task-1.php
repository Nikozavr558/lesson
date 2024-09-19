<?php

interface ShapeInterface
{
    public function getArea();
}

class Circle implements ShapeInterface
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return pi() * $this->radius * $this->radius;
    }
}

class Square implements ShapeInterface
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function getArea()
    {
        return $this->side * $this->side;
    }

}

class Rectangle implements ShapeInterface
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }
}

$circle = new Circle(6);
echo "Circle area: " . $circle->getArea() . "<br>";
$square = new Square(4);
echo "Square area: " . $square->getArea() . "<br>";
$rectangle = new Rectangle(4, 6);
echo "Rectangle area: " . $rectangle->getArea() . "<br>";








