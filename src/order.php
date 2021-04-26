<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../page/auth.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформить заказ</title>
    <link rel="stylesheet" href="../styles/order-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <?php
    require_once 'connect.php';

    $id = $_POST['id-prod'];
    $name = $_POST['name-prod'];
    $price = $_POST['price-prod'];

    $check_prod = mysqli_query($mysql, "SELECT * FROM `new_product` WHERE `id` = '$id' AND `name` = '$name' AND `price`='$price'");
    if (mysqli_num_rows($check_prod) > 0) {
        $order = mysqli_fetch_assoc($check_prod);
        $_SESSION['order'] = [
            "id" => $order['id'],
            "name" => $order['name'],
            "price" => $order['price']
        ];
        $mysql->close();
        $_SESSION['message'] = 'Товар есть на складе.';
    } else {
        $_SESSION['message'] = 'Товар не найден.';
    }
    ?>
    <div class="container">
        <div class="header">
            <h2>Оформление заказа</h2>
        </div>
        <a class="tomain" href="../index.html">Отмена</a>
        <div class="order">
            <div class="product">
                <div class="">Номер товара: <?= $_SESSION['order']['id'] ?> </div>
                <div class="">Название товара: <?= $_SESSION['order']['name'] ?> </div>
                <div class="">Цена: <?= $_SESSION['order']['price'] ?></div>
            </div>
            
            <iframe src="../page/pay-page.html" frameborder="1" width="230" height="340" marginwidth="0" class="frame">

            </iframe>
        </div>
        <div class="info">
            <div class="">
                <?php 
                error_reporting(E_ALL);
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
                ?>
            
            </div>
            <div class="">
                В данный момент доставки нет товар можно забрать в магазине.<br>
                Вам сообщат когда будет готов товар.
            </div>
        </div>
    </div>
</body>

</html>