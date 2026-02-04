<?php

require_once 'LogicCalc.php';
session_start();

if (!isset($_SESSION['expression'])) {
    $_SESSION['expression'] = '';
}
if (!isset($_SESSION['justCalculated'])) {      // инициализируем флаг
    $_SESSION['justCalculated'] = false;
}

$expression = $_SESSION['expression'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $btn = $_POST['btn'];

    if ($btn === 'C') {              // если С то удаляем все
        $expression = '';
    } elseif ($btn === '←') {       // если <-  то удаляем 1 символ
        $expression = mb_substr($expression, 0, -1);
    } elseif ($btn === '=') {       // если = то используем класс  LogicCalc()
        $calc = new LogicCalc();
        try {
            $expression = $calc->calculateExpression($expression);          // с класса нам приходит посчитанное число
            $_SESSION['justCalculated'] = true;                 // включаем флаг TRUE после =
        } catch (Exception $e) {
            $expression = 'Ошибка';
        }
    } else {
        if ($_SESSION['justCalculated']) {   // после =

            if (in_array($btn, ['+', '-', '*', '/'])) {  // если оператор - ок
                $expression .= $btn;
            } else {
                $expression = $btn;                     // если цифра, то стираем.
            }

            $_SESSION['justCalculated'] = false;
        } else {                                                    // запрет на добавления второго оператора
            $lastChar = mb_substr($expression, -1);            // и замена одного опер. на другой.
            $operators = ['+', '-', '*', '/'];

            if (in_array($btn, $operators)) {

                if (in_array($lastChar, $operators)) {
                    $expression = mb_substr($expression, 0, -1) . $btn;
                } else {
                    $expression .= $btn;
                }

            } else {

                $expression .= $btn;
            }
        }
    }
    $_SESSION['expression'] = $expression;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cul Cul Empty v1</title>
    <style>
        .calc-btn {
            box-shadow: 0 3px 0 #888888;
            border-radius: 20px;
            width: 100px;
            height: 100px;
            font-size: 70px;
            margin: 2px;
            background-color: #222831;
            color: white;
        }

        .calc-btn:active, .calc-с:active {
            transform: translateY(3px);
            box-shadow: 0 1px 0 #555;
        }

        .calc-btn, .calc-с {
            transition: all 0.1s ease-in-out;
        }

        .calc-btn:hover, .calc-с:hover {
            background-color: #393e46;
            cursor: pointer;
        }

        .display {
            box-shadow: 0 5px 0 #888888;
            border-radius: 20px;
            width: 415px;
            height: 100px;
            font-size: 80px;
            text-align: right;
            background-color: #00adb5;
            color: white;
        }


        .calc-с {
            box-shadow: 0 5px 0 #888888;
            border-radius: 20px;
            background-color: #b5b8b1;
            color: white;
            width: 205px;
            height: 100px;
            font-size: 40px;
            margin: 2px;
        }

        .text {
            box-shadow: 0 5px 0 #888888;
            border-radius: 20px;
            width: 415px;
            height: 20px;
            font-size: 20px;
            text-align: right;
            background-color: #222831;
            color: white;
        }

        body {
            background-color: rgba(231, 231, 231, 0.57);
        }

    </style>
</head>
<body>
<form method="post">
    <input class="text" type="name" name="name" value="КУЛЬ КУЛЬ v2.0" readonly><br><br>
    <input class="display" type="text" name="expression"
           value="<?= htmlspecialchars((string)$expression) ?>" readonly><br><br>
    <input class="calc-с" type="submit" name="btn" value="C">
    <input class="calc-с" type="submit" name="btn" value="←"><br><br>
    <input class="calc-btn" type="submit" name="btn" value="7">
    <input class="calc-btn" type="submit" name="btn" value="8">
    <input class="calc-btn" type="submit" name="btn" value="9">
    <input class="calc-btn" type="submit" name="btn" value="/"><br>


    <input class="calc-btn" type="submit" name="btn" value="4">
    <input class="calc-btn" type="submit" name="btn" value="5">
    <input class="calc-btn" type="submit" name="btn" value="6">
    <input class="calc-btn" type="submit" name="btn" value="*"><br>

    <input class="calc-btn" type="submit" name="btn" value="1">
    <input class="calc-btn" type="submit" name="btn" value="2">
    <input class="calc-btn" type="submit" name="btn" value="3">
    <input class="calc-btn" type="submit" name="btn" value="+"><br>

    <input class="calc-btn" type="submit" name="btn" value="0">
    <input class="calc-btn" type="submit" name="btn" value=".">
    <input class="calc-btn" type="submit" name="btn" value="-">
    <input class="calc-btn" type="submit" name="btn" value="="><br>


</form>
</body>
</html>