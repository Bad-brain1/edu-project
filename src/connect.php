<?php
    $mysql = new mysqli('localhost', 'root', 'root', 'new_database_user');
    if ($mysql->connect_errno) {
        die('Ошибка соединения: ' . $mysql->connect_error);
    } 
?>