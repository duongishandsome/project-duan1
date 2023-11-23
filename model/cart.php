<?php
function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['cart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}
