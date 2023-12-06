<?php
session_start();
if (isset($_SESSION['user-name'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $size = isset($_POST['size_name']) ? $_POST['size_name'] : '60cm';
        $color = isset($_POST['color_name']) ? $_POST['color_name'] : 'Đen';
        $soluong = isset($_POST['p_quantity']) && $_POST['p_quantity'] ? $_POST['p_quantity'] : 1;
        $ttien = $soluong * $price;
        $product_exists = false;
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $id && $item['color'] == $color && $item['size'] == $size) {
                $_SESSION['cart'][$key]['quantity'] += $soluong;
                $soluongnew =  $_SESSION['cart'][$key]['quantity'];
                $total = $soluongnew * $price;
                $_SESSION['cart'][$key]['total_price'] = $total;
                $product_exists = true;
                break;
            }
        }
    
        unset($item);
    
        if ($product_exists == false) {
            $spadd = array(
                'id' => $id,
                'name' => $name,
                'image' => $img,
                'quantity' => $soluong,
                'total_price' => $ttien,
                'price' => $price,
                'color' => $color,
                'size' => $size,
            );
            array_push($_SESSION['cart'], $spadd);
        }
    
        echo count($_SESSION['cart']);
    } else {
        echo 'Yêu cầu không hợp lệ';
    }
} else {
    echo "error";
}

