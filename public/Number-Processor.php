<?php

class Numberprocessor
{
    private $numbers;

    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }

    public function displayNumbersFor()
    {
        echo "Числа (for): ";
        for ($i = 0; $i < count($this->numbers); $i++) {
            {
                echo $this->numbers[$i] . " ";
            }
            echo "\n";
        }
        echo "</br>";
    }

    public function displayNumbersWhile()
    {
        echo "Числа (while): ";
        $i = 0;
        while ($i < count($this->numbers)) {
            echo $this->numbers[$i] . " ";
            $i++;
        }
        echo "</br>";
    }

    public function displayNumbersForeach()
    {
        echo "Числа (foreach): " . " ";
        foreach ($this->numbers as $number) {
            echo $number . " ";
        }
        echo "</br>";
    }

    public function getSum()
    {
        $sum = 0;
        foreach ($this->numbers as $number) {
            $sum += $number;
        }
        return $sum;
    }
}

$numbers = range(1, 10);
$processor = new Numberprocessor($numbers);

$processor->displayNumbersFor();
$processor->displayNumbersWhile();
$processor->displayNumbersForeach();
echo "Сумма чисел: " . $processor->getSum() . "\n";






