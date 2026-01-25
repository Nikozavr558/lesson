<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="vievport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title></head>
<body>
    <form action="/process_login.php" method="POST">
        <label for="name">Enter the data:</label><br>
        <label for="name">LOGIN:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">ПАРОЛЬ:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Отправить">
</form>
</body>
</html>



<?php
