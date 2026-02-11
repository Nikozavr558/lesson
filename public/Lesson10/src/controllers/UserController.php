<?php

require_once '/var/www/public/Lesson10/src/models/UserModel.php';

class UserController
{
    private PDO $pdo;
    private UserModel $userModel;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new UserModel($pdo);
        $this->pdo = $pdo;
        $this->userModel = new UserModel($pdo);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->userModel->create($_POST);
            header('Location: login.php');
            die;
        }
        require '/var/www/public/Lesson10/src/view/users/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->userModel->findByEmail($_POST['email']);

            if ($user and password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: lesson10.php?action=profile');
                die;
            }
            echo 'Неверный: Login or Password';
        }
        require '/var/www/public/Lesson10/src/view/users/login.php';
    }

    public function profile()       // profile
    {

        if (!isset($_SESSION['user_id'])) {
            header('Location: lesson10.php?action=login');
            exit;
        }

        $user = $this->userModel->findById($_SESSION['user_id']);

        $postModel = new PostModel($this->pdo);
        $posts = $postModel->findByAuthor($_SESSION['user_id']);

        if (!$user) {
            die('Пользователь не найден');
        }

        require '/var/www/public/Lesson10/src/view/users/profile.php';
    }

    public function logout()        //logout
    {
        session_destroy();
        header('Location: lesson10.php');
        die;
    }
}
