<?php

class UserModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getUser($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
