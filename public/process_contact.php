<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = $_POST["email"];
    $massage = htmlspecialchars($_POST["message"]);
    echo "Your massage:";
    echo "<p><strong>Name:</strong> $username</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Message:</strong> $massage</p>";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Your massage:";
        echo "<p><strong>Name:</strong> $username</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Message:</strong> $massage</p>";
    } else {
        echo "<p>Error: incorrect email address format.</p>";
    }
} else {
    echo "Error:the form has not been sent. ";
}


