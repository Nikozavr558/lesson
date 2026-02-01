<?php

$expression = $_POST['expression'] ?? '';
$btn = $_POST['btn'] ?? '';

if ($btn === 'C') {
    $expression = '';
} elseif ($btn === '=') {
    try {
        // Очищаем и проверяем выражение
        $safe_expression = preg_replace('/[^0-9+\-*\/\(\)\.\s]/', '', $expression);
        // Используем eval() для вычисления
        $result = eval('return ' . $safe_expression . ';');
        $expression = (string)$result;


    } catch (Throwable $e) {
        $expression = 'Error';
    }
} elseif ($btn !== '') {
    $expression .= $btn;
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
            box-shadow: 0 3px 0 #313131;
            border-radius: 40px;
            width: 100px;
            height: 100px;
            font-size: 40px;
            margin: 2px;
        }

        .display {
            box-shadow: 0 5px 0 #313131;
            border-radius: 40px;
            width: 415px;
            height: 100px;
            font-size: 80px;
            text-align: right;
        }

        .display {
            background-color: #5ea462;
            color: white;
        }

        .calc-с {
            box-shadow: 0 5px 0 #313131;
            border-radius: 40px;
            background-color: #861616;
            color: white;
            width: 425px;
            height: 100px;
            font-size: 40px;
            margin: 2px;
        }

    </style>
</head>
<body>
<form method="post">

    <input class="display" type="text" name="expression" value="<?= htmlspecialchars($expression) ?>" readonly><br><br>
    <input class="calc-с" type="submit" name="btn" value="C"><br><br>
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
    <input class="calc-btn" type="submit" name="btn" value="=">

</form>
</body>
</html>


