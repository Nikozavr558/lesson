<?php

$value = 42.5;

$type = match(true) {
    is_int($value) => "Число",
    is_float($value) => "Дробное число",
    is_string($value) => "Строка",
    is_array($value) => "Массив",
    is_bool($value) => "Булевое число",
    is_null($value) => "ноль",
    default => "не существует такого"
};

echo "$value - $type";