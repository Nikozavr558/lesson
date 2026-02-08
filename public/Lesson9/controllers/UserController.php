<?php

class UserController
{
    private $model;

    public function __construct($userModel)
    {
        $this->model = $userModel;
    }

    public function showUser($userId)
    {
        $user = $this->model->getUser($userId);
        require 'views/user.php';
    }
}

?>

