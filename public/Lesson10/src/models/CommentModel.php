<?php

namespace Models;

use PDO;

use PDOException;

class CommentModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($postId, $userId, $content)
    {
        try {
            $sql = "INSERT INTO comments (post_id, user_id, content) 
                    VALUES (:post_id, :user_id, :content)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("CommentModel create error: " . $e->getMessage());
            return false;
        }
    }

    public function getByPostId($postId)
    {
        try {
            $sql = "SELECT c.*, u.username 
                    FROM comments c 
                    JOIN users u ON c.user_id = u.id 
                    WHERE c.post_id = :post_id 
                    ORDER BY c.created_at ASC";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("CommentModel getByPostId error: " . $e->getMessage());
            return [];
        }
    }

    public function getCountByPostId($postId)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM comments WHERE post_id = :post_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            error_log("CommentModel count error: " . $e->getMessage());
            return 0;
        }
    }
}