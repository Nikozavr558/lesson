<?php

class LogicCalc // класс который будет производить вычисления
{
    public function calculateExpression(string $expression)  // функция которая считает
    {
        preg_match_all('/(?:^|(?<=[\+\-\*\/]))-?\d*\.?\d+|[\+\-\*\/]/', $expression, $matches);   // ищем совпадения (+отрицательные числа)

        $tokens = $matches[0]; // сохраняем все в массив для чисел

        $result = (float)array_shift($tokens); // берем первое число

        while (count($tokens) >= 2) {                 //  продолжаем вычисления пока в массиве есть числа
            $operator = array_shift($tokens);
            $num = array_shift($tokens);

            if (!is_numeric($num)) {                // проверка что это число
                throw new Exception('Ошибка');
            }

            $num = (float)$num;                     // преобразуем строку в число

            switch ($operator) {                    // выбираем одно из соответствующих
                case '+':
                    $result += $num;
                    break;
                case '-':
                    $result -= $num;
                    break;
                case '*':
                    $result *= $num;
                    break;
                case '/':
                    if ($num == 0) throw new Exception('На ноль делить нельзя');
                    $result /= $num;
                    break;
                default:
                    throw new Exception('Недоступная операция');
            }
        }

        return $result;             // возвращаем число, которое получилось
    }
}