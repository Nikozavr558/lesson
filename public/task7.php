<?php
$temperature = 24;
if($temperature > 30) {
    echo "Ну очень жарко";
} elseif ($temperature >= 20 && $temperature <= 30) {
    echo "Вот теперь комфортно";
} else {
   echo "Подморозило что-то";
}
?>

