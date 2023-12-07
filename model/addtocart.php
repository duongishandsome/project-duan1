<?php
session_start();
include_once "pdo.php";
if (isset($_SESSION['user-name'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $img = $_POST['img'];
        $price = $_POST['price'];

         if(isset($_POST['color_name'])) {
            $color = $_POST['color_name'];
         } else {
            $sql = "SELECT pc.color_id, c.color_name FROM product_color pc
            JOIN color c ON pc.color_id = c.color_id where pc.p_id = $id LIMIT 1";
            $colorget = pdo_query_one($sql);
            $color = $colorget['color_name'];
         }

         if(isset($_POST['size_name'])) {
            $size = $_POST['size_name'];
         } else {
            $sql1 = "SELECT s.size_name FROM product_size ps
            JOIN size s ON ps.size_id = s.size_id where ps.p_id = $id LIMIT 1";
            $sizeget = pdo_query_one($sql1);
            $size = $sizeget['size_name'];
         }

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
