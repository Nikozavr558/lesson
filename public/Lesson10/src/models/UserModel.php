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
        $sql = "INSERT INTO users (username, email, password)VALUES (:username, :email, :password)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'username' => $data['username'],
            'email' => $data ['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    public function findByEmail(string $email): array|false         // Email
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): array|false          //id
    {
        $stmt = $this->pdo->prepare("SELECT id, username, email FROM users WHERE id = :id");
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