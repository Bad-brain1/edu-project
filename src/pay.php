<?php
session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$phone = $_POST['phone'];

$card_id = $_POST['card_id'];
$card_user = $_POST['card_user'];
$card_year = $_POST['card_year'];
$card_month = $_POST['card_month'];
$card_cvv = $_POST['card_cvv'];

if (is_valid_credit_card($card_id)) {
    echo 'карта не верна' . '<br>';
    echo '<a href="../page/pay-page.html">назад<a>';
    exit();
} else if (check_name($card_user) == 0) {
    echo 'держатель карты не верен' . '<br>';
    echo '<a href="../page/pay-page.html">назад<a>';
    exit();
} else if (check_date($card_year, $card_month) == 0) {
    echo 'дата не верна' . '<br>';
    echo '<a href="../page/pay-page.html">назад<a>';
    exit();
} else

if (check_name($full_name) == 1 && check_phone($phone) == 1) {
    $id_user = $_SESSION['user']['id'];
    $id_product = $_SESSION['order']['id'];

    $mysql->query("INSERT INTO `new_order`(`id_user`,`id_product`,`name`,`phone`) VALUES('$id_user','$id_product','$full_name','$phone')");

    $mysql->close();
    echo 'Заказ добавлен в базу' . '<br>' . 'Спасибо за покупку' . '<br>';
    $_SESSION['message'] = 'Спасибо за покупку';
    echo '<a href="../page/pay-page.html">назад<a>';
} else {
    echo 'некоректные данные' . '<br>';
    echo '<a href="../page/pay-page.html">назад<a>';
}

function check_name($full_name)
{
    $regex = '/^[a-zA-Z\s]+$/u';
    return preg_match($regex, $full_name);
}

function check_phone($phone)
{
    return preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $phone);
}

function check_date($card_year, $card_month)
{
    if ($card_month > 12 && $card_year > 20) {
        return 0;
    } else {
        return 1;
    }
}

function is_valid_credit_card($card_id)
{
    
    $card_id = preg_replace('/\s+/', '', $card_id);

    $sum = 0;
    for ($i = 0, $j = strlen($card_id); $i < $j; $i++) {
        
        if (($i % 2) == 0) {
            $val = $card_id[$i];
        } else {
           
            $val = $card_id[$i] * 2;
            if ($val > 9)  $val -= 9;
        }
        $sum += $val;
    }
    return (($sum % 10) == 0);
}
