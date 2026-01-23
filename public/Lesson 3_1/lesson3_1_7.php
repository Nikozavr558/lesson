<?php

$items = ['apple', 'banana', 'apple', 'orange', 'banana', 'apple'];

$counts = [];

foreach ($items as $item) {
    if (!isset($counts[$item])) {    // isset - проверяет - существует ли переменная.
        $counts[$item] = 1;  // если фрукта нет, создаем 1
    }
    else {
        $counts[$item]++;   // если фрукт есть, то делаем +1
    }
}
print_r($counts);