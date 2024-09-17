<?php

class Person
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

    public function getname()
    {
        return "Name: " . $this->name;
    }

    public function getAge()
    {
        return "Age: " . $this->age;
    }

    public function getEmail()
    {
        return "Email: " . $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

$person = new Person ("Ритис", 33, "masteryoda@rulit.com");
echo $person->getname() . "<br>";
echo $person->getAge() . "<br>";
echo $person->getEmail() . "<br>";

$person->setEmail("Newmasteryoda@rulit.com");
echo $person->getEmail();
