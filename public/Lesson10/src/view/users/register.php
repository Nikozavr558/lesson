<h1>Регистрация</h1>

<form method="post">
    <h3 style="color:red;font-weight:bold;"><?php if ($_SESSION['error']) echo $_SESSION['error']; ?></h3>
    <input name="username" placeholder="Имя" required><br>
    <input name="email" type="email" placeholder="Email" required><br>
    <input name="password" type="password" placeholder="Пароль" required><br>
    <button>Зарегистрироваться</button>
</form><?php
