<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = (int)$_POST["number"];
    if ($number % 2 == 0) {
        echo "<h1>Четные числа от 0 до $number:</h1>";
        for ($i = 0; $i <= $number; $i += 2) {
            echo $i . "<br";
        }

    } else {
        echo "<h1>Нечетные числа от 0 до $number:</h1>";
        for ($i = 1; $i <= $number; $i += 2) {
            echo $i . "<br>";
        }
        echo "<h1>Все числа массива от 0 до $number:</h1>";
        for ($i = 0; $i <= $number; $i++) {
            echo $i . "<br>";
        }
    }

}
