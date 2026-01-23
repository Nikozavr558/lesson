<?php

$fruits = ["apple", "cherry", "Banana", "orage",];

$i = 0;
$lenght = count($fruits);  // задаем длину (значение) 4-элемента. (count - считает сколько в массиве элементов "apple" и т.д
while ($lenght > $i) {
    echo $fruits[$i] . "<br>";
    $i++;
}