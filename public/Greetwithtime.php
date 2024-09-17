<?php
function greetWithTime($name,)
{
    $hour = date('H');
    if ($hour >= 6 && $hour < 12) {
        $greeting = "Доброе утро";
    } elseif ($hour >= 18 && $hour < 24) {
        $greeting = "Добрый вечер";
    } else {
        $greeting = "Добрый день";

    }
    echo "$greeting, $name";

}

greetWithTime('Ритис');
