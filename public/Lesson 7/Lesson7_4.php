<?php

function check($i)
{
    if ($i == 0) {
        echo "$i - равно нулю";
    } elseif ($i % 2 == 0) {
        echo "$i - чет";
    } else {
        echo "$i - не чет";
    }
}

check(2);
echo "<br>";
check(5);
echo "<br>";
check(8);
echo "<br>";
check(1989);
echo "<br>";
check(0);