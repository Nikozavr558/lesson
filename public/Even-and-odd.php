<?php
function checkEvenodd($number)
{
    if ($number % 2 == 0) {
        return "Число $number - четное ";
    } else {
        return "Число $number - нечетное ";
    }
}

echo checkEvenodd(6) . "</br>";
echo checkEvenodd(7) . "</br>";