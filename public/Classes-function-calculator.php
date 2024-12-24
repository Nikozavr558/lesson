<?php
session_start();

class Calculator
{
    private string $expression;

    public function __construct()
    {
        $this->expression = $_SESSION['expression'] ?? '';
    }

    public function handleButtonInput(string $button): void
    {
        if ($button === 'C') {
            $this->clearExpression();
        } elseif ($button === '=') {
            $this->expression = $this->evaluateExpression($this->expression);
        } else {
            $this->appendToExpression($button);
        }
        $_SESSION['expression'] = $this->expression;
    }

    public function getExpression(): string
    {
        return $this->expression;
    }

    private function clearExpression(): void
    {
        $this->expression = '';
    }

    private function appendToExpression(string $button): void
    {
        $this->expression .= $button;
    }

    private function evaluateExpression(string $expression): string
    {
        $safeExpression = preg_replace('#[^0-9+\-*/(). ]#', '', $expression);
        try {
            return (string)eval("return $safeExpression;");
        } catch (Throwable $e) {
            return 'Ошибка';
        }
    }
}

class CalculatorApp
{
    private Calculator $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function run(): void
    {
        $button = $_POST['button'] ?? '';
        $this->calculator->handleButtonInput($button);
        $this->render($this->calculator->getExpression());
    }

    private function render(string $expression): void
    {
        echo "<!DOCTYPE html>";
        echo "<html lang=\"ru\">";
        echo "<head>";
        echo "<meta charset=\"UTF-8\">";
        echo "<title>Калькулятор</title>";
        echo "<style>";
        echo ".calculator-container { width: 260px; margin: auto; display: grid; gap: 10px; }";
        echo "input[name=\"expression\"] { width: 100%; height: 50px; font-size: 24px; text-align: right; padding-right: 10px; box-sizing: border-box; }";
        echo ".calculator-buttons { display: grid; grid-template-columns: repeat(4, 60px); gap: 5px; }";
        echo "button { width: 60px; height: 60px; font-size: 20px; }";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<form method=\"post\">";
        echo "<div class=\"calculator-container\">";
        echo "<input type=\"text\" name=\"expression\" value=\"" . htmlspecialchars($expression) . "\" readonly>";
        echo "<div class=\"calculator-buttons\">";
        foreach (['7', '8', '9', '/', '4', '5', '6', '*', '1', '2', '3', '-', '0', '.', '=', '+', 'C'] as $button) {
            echo "<button type=\"submit\" name=\"button\" value=\"$button\">$button</button>";
        }
        echo "</div>";
        echo "</div>";
        echo "</form>";
        echo "</body>";
        echo "</html>";
    }
}

$app = new CalculatorApp();
$app->run();





















