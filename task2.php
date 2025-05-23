<?php
$name = "Владимир";
$surname = "Кичемаев";
$age = 32;
echo  "Мое имя $name $surname и мне уже целых $age года.";

echo sprintf(
    "Мое имя %s моя фамилия %s и мне %d",
    $name,
    $surname,
    $age
);
?>
