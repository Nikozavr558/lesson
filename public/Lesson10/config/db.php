<?php


$dsn = "mysql:host=lesson-db;dbname=laravel;charset=utf8mb4";
$username = "laravel";
$password = "secret";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $username, $password, $options);