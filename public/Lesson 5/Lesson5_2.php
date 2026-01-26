<?php
$name = "mr. Frodo";
function greetWithTime($name)
{ $currentHour = date('H');
    if ($currentHour >= 6 && $currentHour <12) {
        $text = "Good morning";
    } elseif ($currentHour >= 12 && $currentHour <18) {
        $text = "Good day";
    }elseif ($currentHour >= 12 && $currentHour <18) {
        $text = "Good evening";
    } else { $text = "Good nigth";
} echo $text . ", " . $name . "!";
}
greetWithTime("mr. Frodo");