<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
   
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $id && $item['color'] == $color && $item['size'] == $size) {
            $_SESSION['cart'][$key]['quantity'] = $quantity;
            $_SESSION['cart'][$key]['total_price'] = $total;
            break;
        }
    }
} else {
    echo 'Yêu cầu không hợp lệ';
}
