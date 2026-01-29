<?php

class NumberProcessor
{
    public $numbers = [];

    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }

    public function showfor()
    {
        echo "For: ";
        $length = count($this->numbers);
        for ($i = 0; $i < $length; $i++) {
            echo $this->numbers[$i] . " ";
        }
        echo "<br>";
    }

    public function showwhile()
    {
        echo "While: ";
        $i = 0;
        while ($i < count($this->numbers)) {
            echo $this->numbers[$i] . "";
            $i++;
        }
        echo "<br>";
    }

    public function showforeach()
    {
        echo "foreach: ";
        foreach ($this->numbers as $number) {
            echo $number . " ";
        }
        echo "<br>";
    }

    public function sum()
    {
        $total = 0;
        foreach ($this->numbers as $number) {
            $total += $number;
        }
        return $total;
    }
}

$numbers = [2, 4, 6, 8];
$processor = new NumberProcessor($numbers);

$processor->showfor();
$processor->showwhile();
$processor->showforeach();

echo "Сумма: " . $processor->sum();