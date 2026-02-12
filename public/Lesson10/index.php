<?php

session_start();

require '/var/www/public/Lesson10/config/db.php';
require '/var/www/public/Lesson10/src/controllers/PostController.php';
require '/var/www/public/Lesson10/src/controllers/AuthController.php';
require '/var/www/public/Lesson10/src/controllers/UserController.php';
require '/var/www/public/Lesson10/src/models/CommentModel.php';

$userId = $_SESSION['user_id'] ?? null;

$userController = new UserController($pdo);     // контроллер юзеров
$postController = new PostController($pdo);     // контроллер постов
$authController = new AuthController($pdo);

// Определяем действие
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;


// Вызываем нужный метод
switch ($action) {
    case 'create':
        $postController->create();
        break;
    case 'update':
        if ($id) $postController->update($id);
        break;
    case 'delete':
        if ($id) $postController->delete($id);
        break;
    case 'view':
        if ($id) $postController->view($id);
        break;
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'profile':
        $userController->profile();
        break;
    case 'index':
    default:
        $postController->index();
        break;
}

?>
