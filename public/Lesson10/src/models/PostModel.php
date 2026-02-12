<?php


class PostModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()        // достаем все посты
    {
        $sql = "SELECT posts.*, users.username, users.id as user_id FROM posts JOIN users ON posts.user_id = users.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function find($id)  //VIEW - тут вытаскиваю и Username и id
    {
        $sql = "SELECT posts.*, users.username, users.id as user_id FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)       //CREATE
    {
        $sql = "INSERT INTO posts (user_id, title, content) VALUES (:user_id, :title, :content)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'content' => $data['content']
        ]);
    }

    public function update($id, $data)      //UPDATE
    {
        $sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data['id'] = $id; // добавляем id в данные
        return $stmt->execute($data);
    }

    public function delete($id)     //DELETE
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function findByAuthor($userId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE user_id = :id");
        $stmt->execute(['id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    public function addTagToPost($post_id, $tag_id)
//    {
//        $sql = "INSERT INTO post_tags (post_id, tag_id) VALUES (:post_id, :tag_id)";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->execute(['post_id' => $post_id, 'tag_id' => $tag_id]);
//
//    }

//    public function getTagsByPostId($post_id)
//    {
//        $sql = "SELECT tags.* FROM tags
//                JOIN post_tags ON tags.id = post_tags.tag_id
//                WHERE post_tags.post_id = :post_id";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->execute->fetchAll(PDO::FETCH_ASSOC);//   }

    public function getById($id)
    {
        try {
            $sql = "SELECT p.*, u.username 
                FROM posts p 
                JOIN users u ON p.user_id = u.id 
                WHERE p.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting post: " . $e->getMessage());
            return null;
        }
    }
}
