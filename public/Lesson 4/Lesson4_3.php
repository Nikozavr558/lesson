<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="vievport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title></head>
<body>
    <form action="/process_login.php" method="POST">
        <label for="name">NAME:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="text">Опишите проблему:</label>
        <input type="text" id="text" name="text" required><br>
        <input type="submit" value="Отправить">
</form>
</body>
</html>



<?php
