<html lang="en">
<head>
    <meta charset="UNF-8">
    <title>Data Entry</title>
</head>
<body>
<form action="process_register.php" method="POST">
    <div>
        <label for="username">User name:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="email">Your email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Enter password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>
</body>