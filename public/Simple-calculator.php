<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Простой калькулятор</title>
</head>
<body>
<h2>Калькулятор</h2>
<form method="post">
    <input type="number" name="num1" placeholder="Число № 1" required>
    <input type="number" name="num2" placeholder="Число № 2" required>
    <select name="Операции">
        <option value="Сложение">+</option>
        <option value="Вычетание">-</option>
        <option value="Умножение">*</option>
        <option value="Деление">/</option>
    </select>
    <button type="submit" name="Посчитать">Рассчитать</button>
</form>
<?php
if (isset($_POST['Посчитать'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['Операции'];
    $result = 0;
    if ($operation == "Сложение") {
        $result = $num1 + $num2;
    } elseif ($operation == "Вычетание") {
        $result = $num1 - $num2;
    } elseif ($operation == "Умножение") {
        $result = $num1 * $num2;
    } elseif ($operation == "Деление") {
        if ($num2 != 0) {
            $result = $num1 / $num2;
        } else {
            $result = "Балбес! Делить на ноль нельзя!";
        }
    }
    echo "<h3>Результат: $result</h3>";
}
?>
</body>
</html>


