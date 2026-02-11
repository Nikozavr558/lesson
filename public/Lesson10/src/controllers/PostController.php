<?php

require_once '/var/www/public/Lesson10/src/models/PostModel.php';

class PostController
{
    private $pdo;
    private $postModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;

        $this->postModel = new PostModel($pdo);
    }

    public function index()
    {

        $posts = $this->postModel->getAll();

        require '/var/www/public/Lesson10/src/view/post/enter_point.php';
    }


    public function create() // CREATE
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => 3                      //Юзер под номером
            ];

            $this->postModel->create($data);

            header("Location: lesson10.php");
            exit;
        }
        require '/var/www/public/Lesson10/src/view/post/create_post.php';
    }

    public function update($id)     //UPDATE
    {
        $post = $this->postModel->find($id);        //вынимаем из

        if (!$post) {
            die('Пост не найден');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Готовим данные
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ];

            $this->postModel->update($id, $data);         // PostModel

            header("Location: lesson10.php?action=view&id=" . $id);
            exit;
        }
        require '/var/www/public/Lesson10/src/view/post/update_post.php';         // Показываем форму редактирования
    }

    public function delete($id)     //DELETE
    {
        // Используем Модель для удаления
        $this->postModel->delete($id);

        header("Location: lesson10.php");
        exit;
    }


    public function view($id)       // VIEW
    {
        $post = $this->postModel->find($id);        // Получаем пост через PostModel

        if (!$post) {
            die('Пост не найден');
        }

        // Показываем View
        require '/var/www/public/Lesson10/src/view/post/view_post.php';
    }
}

