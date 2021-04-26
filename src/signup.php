<?php
    session_start();
    require_once 'connect.php';
    
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $wpass = filter_var(trim($_POST['wpass']), FILTER_SANITIZE_STRING);

    if(!isset($pass) && !isset($wpass)){
        $_SESSION['message'] = 'пароль не введен';
        header('Location: ../page/registration.php');
        exit();
    }else if ($pass != $wpass) {
        $_SESSION['message'] = 'пароли не совпарают';
        header('Location: ../page/registration.php');
        exit();
    } else if (!valid_email($email)) {
        $_SESSION['message'] = 'Введена не верная почта';
        header('Location: ../page/registration.php');
        exit();
    } else if(strlen($name) < 2) {
        $_SESSION['message'] = 'Введите имя больше 2-х символов';
        header('Location: ../page/registration.php');
        exit();
    }

    $check_email = mysqli_query($mysql, "SELECT * FROM `new_users` WHERE `email` = '$email'");
    if(mysqli_num_rows($check_email) > 0){
        $_SESSION['message'] = 'такая почта уже используется';
        header('Location: ../page/registration.php');
        exit();
    }
    $pass = md5($pass);

    $mysql -> query("INSERT INTO `new_users`(`name`,`email`,`password`) VALUES('$name','$email','$pass')");
    $mysql -> close();

    $_SESSION['message'] = 'Вы успешно зарегистрировались';
    header('Location: ../page/auth.php');

    function valid_email($str)
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

?>