<?php

$arr = [5, 3, 8, 1];

$count = count($arr);
$i = 0;

while ($i < $count -1){
    $j = 0;
    while ($j < $count - $i -1) {
        if ($arr[$j] > $arr[$j +1]) {
            $save = $arr[$j];
            $arr[$j] = $arr[$j +1];
            $arr[$j +1] = $save;
        }
        $j++;
    }
    $i++;
}

foreach ($arr as $numb) {
    echo $numb . "  <br>";
}