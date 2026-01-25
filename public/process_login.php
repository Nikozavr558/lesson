
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    echo "<h1>Введенные данные:</h1>";
    echo "<ol>";
    echo "<li>Name:</li> " . htmlspecialchars($name) . "<br>";
    echo "<li>Email:</li> " . htmlspecialchars($email) . "<br>";


    if ($password !== "1234") {
        echo "<li>Password: <br>Wrong credentials</li>";
    } else echo "<li>Password:</li> " . htmlspecialchars($password) . "<br>";

    echo "</ol>";


}