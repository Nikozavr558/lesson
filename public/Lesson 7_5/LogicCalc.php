<?php
session_start();
class LogicCalc
{
    private string $expression = ''; // выводится на дисплей
    private bool $justCalculated = false;

    private ?string $lastBtn = null;

    private array $operators = ['+', '-', '*', '/']; // список операторов

    public function __construct()
    {
        $this->expression = $_SESSION['expression'] ?? '';
        $this->justCalculated = $_SESSION['justCalculated'] ?? false;
        $this->getPostAction();
    }


    public function run() {
        if ($this->lastBtn) {
            $this->expression = $this->press($this->lastBtn);
        }
        $this->updateState();
    }

    public function getPostAction(): void {
        if (isset($_POST['btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->lastBtn = $_POST['btn'];
        }
    }
    public function press(string $btn): string              // логика кнопок
    {
        switch ($btn) {

            case 'C':
                $this->clear();
                break;

            case '←':
                $this->backspace();
                break;

            case '=':
                $this->calculate();
                break;

            default:
                $this->handleInput($btn);
                break;
        }

        return $this->expression;
    }

    private function clear(): void          // С -  перезапуск калькулятора
    {
        $this->expression = '';
        $this->justCalculated = false;
    }

    private function backspace(): void         // ← удаляет последний символ
    {
        $this->expression = mb_substr($this->expression, 0, -1);
    }

    private function handleInput(string $btn): void     // проверяет чем заканчиватеся строка. если цифра новая, если оператор то продолжаем
    {
        $lastChar = mb_substr($this->expression, -1);
        $isOperator = in_array($btn, $this->operators);     // замена оператора

        // после =
        if ($this->justCalculated) {

            if ($isOperator) {
                $this->expression .= $btn;
            } else {
                $this->expression = $btn;
            }

            $this->justCalculated = false;
            return;
        }

        if ($isOperator && in_array($lastChar, $this->operators)) {                             // замена оператора другим
            $this->expression = mb_substr($this->expression, 0, -1) . $btn;
            return;
        }

        $this->expression .= $btn;
    }

    private function calculate(): void          // математика
    {
        try {
            $this->expression = $this->calculateExpression($this->expression);
            $this->justCalculated = true;
        } catch (Exception $e) {
            $this->expression = 'Ошибка';
        }
    }

    private function calculateExpression(string $expression): string
    {
        preg_match_all(
            '/(?:^|(?<=[\+\-\*\/]))-?\d*\.?\d+|[\+\-\*\/]/',
            $expression,
            $matches
        );

        $tokens = $matches[0];


        for ($i = 0; $i < count($tokens); $i++) {                //  Логика приоритета! Сначала * и /

            if ($tokens[$i] === '*' || $tokens[$i] === '/') {

                $left = (float)$tokens[$i - 1];
                $right = (float)$tokens[$i + 1];

                if ($tokens[$i] === '/') {
                    if ($right == 0) throw new Exception();
                    $result = $left / $right;
                } else {
                    $result = $left * $right;
                }

                array_splice($tokens, $i - 1, 3, (string)$result);
                $i--;
            }
        }


        $result = (float)array_shift($tokens);               //Логика приоритета! Потом + и -

        while (count($tokens) >= 2) {
            $operator = array_shift($tokens);
            $num = (float)array_shift($tokens);

            if ($operator === '+') {
                $result += $num;
            } else {
                $result -= $num;
            }
        }

        return (string)$result;
    }

    public function updateState(): void
    {
        $_SESSION['expression'] = $this->expression;
        $_SESSION['justCalculated'] = $this->justCalculated;
    }


    public function renderHtml(): void {

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
                   value="<?= htmlspecialchars((string)$this->expression) ?>" readonly><br><br>
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
        <?php ;


    }
}
