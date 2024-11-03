<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор v 2.0</title>
    <style>
        .calculator {
            display: grid;
            grid-template-columns: repeat(4, 60px);
            gap: 5px;
            max-width: 250px;
        }

        .calculator input, .calculator button {
            width: 60px;
            height: 60px;
            font-size: 20px;
        }

        .output {
            grid-column: span 4;
            text-align: right;
            padding: 10px;
            font-size: 40px;
        }
    </style>
</head>
<body>
<h2>Калькулятор вер. 2.0</h2>
<form method="post">
    <div class="calculator">
        <input class="output" type="text" name="expression" value="<?php echo $_POST['expression'] ?? ''; ?>" readonly>

        <?php
        $buttons = ['7', '8', '9', '/',
            '4', '5', '6', '*',
            '1', '2', '3', '-',
            '0', '.', '=', '+'];
        foreach ($buttons as $button) {
            if ($button == '=') {
                echo '<button type= "submit" name= "calculate" value= "=">' . $button . '</button>';
            } else {
                echo '<button type="submit" name="button" value="' . $button . '">' . $button . '</button>';
            }
        }
        ?>
        <button type="submit" name="clear" value="C">C</button>
    </div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_POST['expression'] ?? '';
    if (isset($_POST['clear'])) {
        $expression = '';
    } elseif (isset($_POST['calculate'])) {
        $result = calculateExpression($expression);
        $expression = $result !== false ? $result : "Ошибка";
    } elseif (isset($_POST['button'])) {
        $expression .= $_POST['button'];
    }
    echo "<script>document.querySelector('[name=\"expression\"]'). value = '$expression';</script>";
}
function calculateExpression($expression)
{
    $expression = preg_replace(pattern: '#[^0-9+\-*/.]/#', replacement: '', subject: $expression);

    return @eval("return $expression;");
}

?>
</body>
</html>

