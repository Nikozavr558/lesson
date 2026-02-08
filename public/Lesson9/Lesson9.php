<?php
require 'db.php';
require 'models/UserModel.php';
require 'controllers/UserController.php';

// Создаем экземпляры модели и контроллера
$userModel = new UserModel($db);
$userController = new UserController($userModel);

// Запрашиваем и отображаем пользователя с ID 1
$uiserId = $_GET['id'] ?? 1;
$userController->showUser($uiserId);
//$userController->showUser(2);
?>