<?php
require '../config/db.php';
require '../src/controllers/UserController.php';
require '/var/www/public/Lesson10/src/view/post/lesson10.php';

$controller = new UserController($pdo);
$controller->register();
