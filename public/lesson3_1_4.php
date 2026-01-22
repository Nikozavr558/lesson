<?php

$age = 18;

switch (true) {
    case ($age >= 18);
        echo "Взрослый";
        break;
    case ($age >= 13 && $age < 18);
        echo "Подросток";
        break;
    Default;
        echo "Ребенок";
        break;
}

