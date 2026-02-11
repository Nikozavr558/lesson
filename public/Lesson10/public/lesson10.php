<?php
require '../config/db.php';
require '../src/controllers/PostController.php';
require '/var/www/public/Lesson10/src/view/post/lesson10.php';

$controller = new PostController($pdo);
$controller->index();