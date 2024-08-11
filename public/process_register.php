<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    if ($password === "1234") {
        echo "<h2>Your data:</h2>";
        echo "<ul>";
        echo "<li><strong>User name:</strong> " . htmlspecialchars($username) . "</li>";
        echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
        echo "<li><strong>Password:</strong> " . htmlspecialchars($password) . "</li>";
        echo "</ul>";
    } else {
        echo "<p>Wrong credentials</p>";
    }
}