<?php
require __DIR__ . '/vendor/autoload.php';  // подключаем автозагрузчик

use DataProcessor\CSVProcessor;
use DataProcessor\JSONProcessor;


$csvProcessor = new CSVProcessor();     // создаем объект CSV
$jsonProcessor = new JSONProcessor();   // создаем объект JSON

$csvDataBase = 'data.csv';
echo "Выводим CSV файл: $csvDataBase <br>";
$csvData = $csvProcessor->read($csvDataBase);
print_r($csvData);

$jsonDataBase = 'data.json';
echo  "Выводим JSON файл: $jsonDataBase <br>";
$jsonData = $jsonProcessor->read($jsonDataBase);
print_r($jsonData);

