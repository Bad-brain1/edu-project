<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: auth.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="../styles/profile-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="nav">
            <lu class="nav__bar">
                <li class="nav__item"><a href="../index.html" class="nav__link main">Главная</a></li>
                <li class="nav__item">|</li>
                <li class="nav__item"><a href="../src/logout.php" class="nav__link logout">Выход</a></li>
            </lu>
        </div>
        <h2 class="title">Ваш профиль</h2>
        <div class="card">
            <img src="../images/resume.svg" alt="">
            <div class="user">
                <div class="user__name"><?= $_SESSION['user']['name'] ?> </div>
                <div class="user__email"><?= $_SESSION['user']['email'] ?></div>
            </div>
        </div>
        <h3 class="title">Заказы</р>
            
        <div class="">
        <?php
            require_once '../src/connect.php';
            $id = $_SESSION['user']['id'];
            $check_order = mysqli_query($mysql, "SELECT `id`,`id_user`,`id_product` FROM `new_order` WHERE `id_user`='$id'");
            if (mysqli_num_rows($check_order) > 0) {
                while($row=mysqli_fetch_array($check_order)){
                    echo 'номер заказа:'.$row['id'].' Номер товара: '.$row['id_product'].'<br>';
                }
            }else{
                echo'Нет заказов';
            }
        ?>
        </div>
    </div>
</body>

</html>