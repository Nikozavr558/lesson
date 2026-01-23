<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$nch = [];
$ch = [];

foreach ($numbers as $numb) {
    if ($numb % 2 == 0){
        $ch[]=$numb;
    }
    else {
        $nch[]=$numb;
    }
}

echo "Нечетные:" . print_r ($nch)  . "<br>";
echo "Четные:" . print_r ($ch);