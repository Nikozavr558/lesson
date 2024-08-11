<html lang="en">
<head>
    <title>Feedback form</title>
</head>
<body>
<form action="process_contact.php" method="post">
    <label for="username"> Name</label>
    <input type="text" id="username" name="username" required>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" required>
    <label for="message">Message</label>
    <textarea id="message" name="message" rows="4" cols="50"></textarea>
    <button type="submit">Send</button>
</form>
</body>
</html>


