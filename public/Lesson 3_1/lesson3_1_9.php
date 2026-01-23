<?php

$words = ["sun", "cloud", "sky", "thunder", "rain"];
$result = [];

foreach ($words as $i) {
    if (strlen($i) > 4) {
        $result[] = $i;
    }
}

print_r($result);