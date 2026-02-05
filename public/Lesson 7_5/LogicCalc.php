<?php

class LogicCalc
{
    private string $expression = ''; // выводится на дисплей
    private bool $justCalculated = false;

    private array $operators = ['+', '-', '*', '/']; // список операторов

    public function __construct(string $expression = '', bool $justCalculated = false)  //
    {
        $this->expression = $expression;
        $this->justCalculated = $justCalculated;
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

    public function getState(): array
    {
        return [                                        // возвращаем значения
            'expression' => $this->expression,
            'justCalculated' => $this->justCalculated
        ];
    }
}