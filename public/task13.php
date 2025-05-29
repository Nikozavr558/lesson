<?php
$odd = [];
$even = [];
$nums = [1, 2, 3, 4, 5, 6];
foreach ($nums as $num) {
    if ($num % 2 ==0){
    $even[] = $num;
    } else {
        $odd[] = $num;
    }
};
print_r($even);
print_r($num);
?>