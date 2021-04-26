<?php
session_start();
    require_once 'connect.php';

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    
    $pass = md5($pass);
    $check_user = mysqli_query($mysql, "SELECT * FROM `new_users` WHERE `email` = '$email' AND `password` = '$pass'");
    if(mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" =>$user['name'],
            "email" => $user['email']
        ];
        $mysql->close();
        header('Location: ../page/profile.php');
    } else{
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../page/auth.php');

    }

?>