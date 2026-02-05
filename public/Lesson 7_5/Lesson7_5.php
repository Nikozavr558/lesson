<?php

require_once 'LogicCalc.php';
session_start();

$_SESSION['expression'] ??= '';
$_SESSION['justCalculated'] ??= false;

$calc = new LogicCalc(
    $_SESSION['expression'],
    $_SESSION['justCalculated']
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $calc->press($_POST['btn']);

    $state = $calc->getState();
    $_SESSION['expression'] = $state['expression'];
    $_SESSION['justCalculated'] = $state['justCalculated'];
}

$expression = $_SESSION['expression'];

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