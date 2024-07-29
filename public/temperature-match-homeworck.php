<?php
$temperature = 21;
$weather = match (true) {
    $temperature > 30 => "Очень жарко",
    $temperature < 20 => "Холодно",
    $temperature >= 20 && $temperature <= 30 => "Комфортная температура"
};
var_dump($weather);

