<?php

class person
{
    public $name;
    public $age;
    private $email;

    public function __construct($name, $age, $email)
    {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    public function getName()
    {
        return "Name: " . $this->name . "<br>";
    }

    public function getAge()
    {
        return "Age: " . $this->age . "<br>";
    }

    public function getEmail()
    {
        return "Email: " . $this->email . "<br>";
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

$i = new Person("Frodo", 55, "Frodo@shire.com");
echo $i->getName();
echo $i->getAge();
echo $i->Email();

$i->setEmail("FrodoBaggins@shire.com");
echo $i->getEmail();


