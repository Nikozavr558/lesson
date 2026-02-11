<?php

// session_start();

class AuthController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: lesson10.php');
                exit;
            }

            $error = 'Неверный email или пароль';
        }

        require '/var/www/public/Lesson10/src/view/users/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $stmt = $this->pdo->prepare(
                "INSERT INTO users (username, email, password)VALUES (:u, :e, :p)"
            );

            $stmt->execute([
                'u' => $_POST['username'],
                'e' => $_POST['email'],
                'p' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ]);

            header('Location: lesson10.php?action=login');
            exit;
        }

        require '/var/www/public/Lesson10/src/view/users/register.php';
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: lesson10.php');
        exit;
    }
}