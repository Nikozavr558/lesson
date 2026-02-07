<?php

namespace DataProcessor;

class CSVProcessor
{
    public function read($database)
    {
        $data = [];
        if (($control = fopen($database, 'r')) !== FALSE)   // если строка не открывается - false
        {
            while (($result = fgetcsv($control, 100, ',')) !== FALSE) {  // цикл: пока есть строки: читаем, получаем массив, сохраняем в $result
                $data[] = $result;  // сохранение в массив
            }
            fclose($control);  // закрываем файл
        }
        return $data;
    }
}