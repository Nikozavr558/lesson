
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];

    echo "Вы ввели: $number<br>";


    for ($i =0; $i <= $number; $i++) {
        echo $i . " ";
    }
    echo "<br>";

    if ($number % 2 == 0) {
        echo "$number - Четное число<br>";

        for ($i = 0; $i <= $number; $i++) {
            if ($i % 2 == 0) {
                echo $i . " ";
            }
        }
    } else {
        echo "$number - Нечетное число<br>";

        for ($i = 0; $i <= $number; $i++) {
            if ($i % 2 !== 0) {
                echo $i . " ";
            }
        }
    }
}

