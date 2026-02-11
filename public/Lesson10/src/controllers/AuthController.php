<?php

require_once '/var/www/public/Lesson10/src/models/UserModel.php';

class AuthController
{
    private $pdo;

    private UserModel $userModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->userModel = new UserModel($pdo);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->userModel->login($_POST);

            if ($result) {
                header('Location: index.php');
                exit;
            }
        }

        require '/var/www/public/Lesson10/src/view/users/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $result = $this->userModel->create($_POST);

            if (!$result) {
                header('Location: index.php?action=register');
                exit;
            }

            header('Location: index.php?action=login');
            exit;
        }

        require '/var/www/public/Lesson10/src/view/users/register.php';
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
