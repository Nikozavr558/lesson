<?php
function checkEvenOdd($number)
{
    if ($number % 2 == 0) {
        return "Число $number - четное ";
    } else {
        return "Число $number - нечетное ";
    }
}

echo checkEvenOdd(6) . "</br>";
echo checkEvenOdd(7) . "</br>";