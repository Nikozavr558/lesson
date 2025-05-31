<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = $_POST["login"];
        echo "Вы успешно авторизовались" .$login;
}   else {
    echo "Не получилось";
}
?>