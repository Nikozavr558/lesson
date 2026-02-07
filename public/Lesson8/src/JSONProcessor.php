<?php

namespace DataProcessor;

class JSONProcessor {
    public function read($database) {   // получаем путь к файлу
        $jsonString = file_get_contents($database);     // загружаем в виде строки
        return json_decode($jsonString, true);      // декодируем
    }

}