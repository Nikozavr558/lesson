<?php
require 'vendor/autoload.php';

use DockerAutoloadProject\CSVProcessor;
use DockerAutoloadProject\JSONProcessor;

$csvProcessor = new CSVProcessor();
$csvData = $csvProcessor->read(__DIR__ . '/src/data/data.csv');
echo "CSV данные:<br>";
print_r($csvData);


$jsonProcessor = new JSONProcessor();
$jsonData = $jsonProcessor->read(__DIR__ . '/src/data/data.json');
echo "<br>Json данные:<br>";
print_r($jsonData);
