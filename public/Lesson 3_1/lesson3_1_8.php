<?php

$keys = ["name", "age", "city"];
$values = ["Ivan", 25, "Moscow"];

$chel = [];

foreach ($keys as $index => $key) {
    $chel[$key] = $values[$index];
}

print_r($chel);

//echo "$keys[0]: $values[0], $keys[1]: $values[1], $keys[2]: $values[2]";