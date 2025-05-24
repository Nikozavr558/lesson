<?php
$temperature = 18;
 echo match (true) {
     $temperature > 30 => "Жара",
     $temperature >= 20 && $temperature <=30 => "Нормас погодка",
     default => "Колотун бабай"
 };
?>