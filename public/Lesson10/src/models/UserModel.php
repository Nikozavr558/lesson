<?php

class UserModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(array $data): bool       //CREATE USER
    {
        $_SESSION['error'] = false;
        if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password'])) {
            $_SESSION['error'] = "Необходимо заполнить все поля";
            return false;
        }

        if ($this->checkIfUserAlreadyExist($_POST['email'], $_POST['username'])) {
            $_SESSION['error'] = "Пользователь c такой почтой или ником уже существует";
            return false;
        }

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'username' => $data['username'],
            'email' => $data ['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    public function checkIfUserAlreadyExist($email, $username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
        $stmt->execute([
            'email' => $email,
            'username' => $username,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function findByEmail(string $email): array|false         // Email
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login(array $data): bool {
        $_SESSION['error'] = false;
        $_SESSION['user'] = null;
        if (!isset($data['email']) || !isset($data['password'])) {
            $_SESSION['error'] = "Необходимо заполнить все поля";
            return false;
        }

        $login = $data['email'];
        $password = $data['password'];

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
        $stmt->execute([
            'email' => $login,
            'username' => $login,
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            return true;
        }
        $_SESSION['error'] = "Неверный email или пароль";
        return false;
    }
    public function findById(int $id): array|false          //id
    {
        $stmt = $this->pdo->prepare("SELECT id, username, email, created_at FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function find($id)               // profile
    {
        $stmt = $this->pdo->prepare(
            "SELECT id, username, email FROM users WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
