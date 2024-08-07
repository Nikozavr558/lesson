<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    echo "Добро пожаловать, " . htmlspecialchars($username) . "!";
}