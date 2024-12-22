<?php
session_start();

class Calculator
{
    public function evaluateExpression(string $expression): string
    {
        $safeExpression = preg_replace('#[^0-9+\-*/(). ]#', '', $expression);
        try {
            return (string)eval("return $safeExpression;");
        } catch (Throwable $e) {
            return 'Ошибка';
        }
    }
}

$expression = $_POST['expression'] ?? '';
$button = $_POST['button'] ?? '';

if ($button === 'C') {
    $expression = '';
} elseif ($button === '=') {
    $calculator = new Calculator();
    $expression = $calculator->evaluateExpression($expression);
} else {
    $expression .= $button;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <style>
        .calculator-container {
            width: 260px;
            margin: auto;
            display: grid;
            gap: 10px;
        }

        input[name="expression"] {
            width: 100%;
            height: 50px;
            font-size: 24px;
            text-align: right;
            padding-right: 10px;
            box-sizing: border-box;
        }

        .calculator-buttons {
            display: grid;
            grid-template-columns: repeat(4, 60px);
            gap: 5px;
        }

        button {
            width: 60px;
            height: 60px;
            font-size: 20px;
        }
    </style>
</head>
<body>
<form method="post">
    <div class="calculator-container">
        <input type="text" name="expression" value="<?php echo htmlspecialchars($expression); ?>" readonly>
        <div class="calculator-buttons">
            <?php
            $buttons = ['7', '8', '9', '/', '4', '5', '6', '*', '1', '2', '3', '-', '0', '.', '=', '+', 'C'];
            foreach ($buttons as $button) {
                echo '<button type="submit" name="button" value="' . $button . '">' . $button . '</button>';
            }
            ?>
        </div>
    </div>
</form>
</body>
</html>