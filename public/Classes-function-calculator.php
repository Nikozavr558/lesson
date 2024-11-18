<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>

<h2>Простой калькулятор</h2>

<form method="post">
    <input type="number" name="number1" placeholder="Введите первое число" required>
    <input type="number" name="number2" placeholder="Введите второе число" required>

    <select name="operation">
        <option value="add">Сложение</option>
        <option value="subtract">Вычитание</option>
        <option value="multiply">Умножение</option>
        <option value="divide">Деление</option>
    </select>

    <button type="submit" name="calculate">Вычислить</button>
</form>

<?php

class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function subtract($a, $b)
    {
        return $a - $b;
    }

    public function multiply($a, $b)
    {
        return $a * $b;
    }

    public function divide($a, $b)
    {
        if ($b == 0) {
            throw new Exception("деление на ноль.");
        }
        return $a / $b;
    }
}

if (isset($_POST['calculate'])) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
    $calculator = new Calculator();
    try {
        switch ($operation) {
            case 'add' :
                $result = $calculator->add($number1, $number2);
                break;
            case 'subtract' :
                $result = $calculator->subtract($number1, $number2);
                break;
            case 'multiply' :
                $result = $calculator->multiply($number1, $number2);
                break;
            case 'divide' :
                $result = $calculator->divide($number1, $number2);
                break;
            default:
                $result = "Неизвестная операция";

        }
        echo "<h3>Результат: $result</h3>";
    } catch (Exception $e) {
        echo "<h3>Ошибка: " . $e->getMessage() . "</h3>";
    }
}
?>

</body>
</html>