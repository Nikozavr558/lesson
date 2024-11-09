<?php
session_start();
if (!isset($_SESSION['expression'])) {
    $_SESSION['expression'] = '';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_SESSION['expression'];
    if ($_POST['button'] == 'C') {
        $expression = '';
    } elseif ($_POST['button'] == '=') {
        $expression = calculateExpression($expression);
    } else {
        $expression .= $_POST['button'];
    }
    $_SESSION['expression'] = $expression;
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
        <input type="text" name="expression" value="<?php echo htmlspecialchars($_SESSION['expression'] ?? ''); ?>"
               readonly>
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
<?php
function calculateExpression($expression)
{
    if (preg_match('#/0($|[^0-9])#', $expression)) {
        return "Ошибка: деление на 0";
    }
    $expression = preg_replace('#[^0-9+\-*/.]#', '', $expression);
    return @eval("return $expression;");
}

?>
</body>
</html>

