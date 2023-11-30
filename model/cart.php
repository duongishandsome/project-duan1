 <?php

    function insert_bill($user_id, $name, $phone, $address, $tongdonhang, $pttt, $message)
    {
        $sql = "insert into `order`(user_id, receiver_name,receiver_phone,receiver_address,paid_amount,payment_method,message) values ($user_id, '$name', '$phone', '$address', $tongdonhang, '$pttt', '$message')";
        return pdo_execute_return_lastInssertId($sql);
    }
    
    if (!function_exists('insert_bill_detail')) {

        function insert_bill_detail($p_id, $order_id, $user_id, $size, $color, $price, $p_name, $p_img)
        {
            $sql = "insert into `order_detail`(p_id, order_id,user_id,size_name,color_name,price,product_name,product_img) values ('$p_id', '$order_id', '$user_id', '$size', '$color', '$price', '$p_name', '$p_img')";
            return pdo_execute($sql);
        }
    }

    function insert_order_detail($order_id, $p_id, $color, $size, $quantity, $price)
    {
        $sql = "insert into order_detail(p_id, order_id,size_name,color_name, price,quantity) values ($p_id, $order_id, '$size', '$color', $price, $quantity)";
        return pdo_execute($sql);
    }
    function cart_list()
    {
        return $_SESSION['cart'];
    }

    function cart_destroy()
    {
        $_SESSION['cart'] = array();
    }

    function viewcart($del)
    {
        global $img_path;
        $tong = 0;
        $i = 0;
        if ($del == 1) {
            $xoasp_th = 'Thao tác';
            $xoasp_td2 = '<td></td>';
        } else {
            $xoasp_th = '';
            $xoasp_td2 = '';
        }
    ?>
     <thead class="cart-table">
         <tr>
             <th>STT</th>
             <th>Ảnh</th>
             <th>Tên sản phẩm</th>
             <th>Giá</th>
             <th>Màu</th>
             <th>Size</th>
             <th>Số lượng</th>
             <th>Thành tiền</th>
             <th><?php echo $xoasp_th ?></th>
         </tr>
     </thead>
     <tbody>
         <?php foreach ($_SESSION['cart'] as $cart) {
                $hinh = $img_path . $cart['image'];
                $tong = tongdonhang();
                echo $tong;
                $i++;
                if ($del == 1) {
                    $xoasp_td = 'index.php?act=delcart&idcart=' . $i;
                } else {
                    $xoasp_td = '';
                }
            ?>
             <tr>
                 <td><?php echo $i ?></td>
                 <td class="product-thumbnail">
                     <a href="#"><img class="img-responsive" src="<?php echo $hinh ?>" alt="" /></a>
                 </td>
                 <td class="product-name"><a href="#"><?php echo $cart['name'] ?></a></td>
                 <td class="product-price-cart"><span class="amount"><?php echo number_format($cart['price'], 0, ',', '.')  ?></span></td>
                 <td><?php echo $cart['color'] ?></td>
                 <td><?php echo $cart['size'] ?></td>
                 <td class="product-quantity">
                     <div class="cart-plus-minus">
                         <input class="cart-plus-minus-box" type="text" name="qtybutton" value="<?php echo $cart['quantity'] ?>" />
                     </div>
                 </td>
                 <td class="product-subtotal"><?php echo number_format($cart['total_price'], 0, ',', '.')  ?></td>
                 <td class="product-remove">
                     <a href="<?php echo $xoasp_td; ?>"><i class="icon-close"></i></a>
                 </td>
             </tr>
         <?php } ?>
     </tbody>
 <?php
    }


    function tongdonhang()
    {
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cart) {
            $tongtien += $cart['price'] * $cart['quantity'];
        }
        return $tongtien;
    }


    if (!function_exists('loadone_order')) {
    function loadone_order($id)
{
    $sql = "SELECT * FROM `order` WHERE id = $id";
    $order = pdo_query_one($sql);
    return $order;
}}
if (!function_exists('loadall_order')) {
    function loadall_order($iduser=0)
{
    $sql= "select * from `order` where 1";
    if($iduser>0) $sql.=" AND user_id=".$iduser;
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}}
if (!function_exists('loadall_order_detail')) {
    function loadall_order_detail($id)
{
    $sql = "SELECT * FROM `order_detail` WHERE order_id = $id";
    $order = pdo_query($sql);
    return $order;
}}
if (!function_exists('loadall_order_detail_all')) {
    function loadall_order_detail_all()
{
    $sql = "SELECT * FROM `order_detail`";
    $order = pdo_query($sql);
    return $order;
}}
if (!function_exists('loadall_ctdh')) {
    function loadall_ctdh($idbil)
    {
        $sql = "select * from  order_detail where order_id=" . $idbil;
        $cart = pdo_query($sql);
        return $cart;
    }
}
if (!function_exists('get_ttdh')) {
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới !";
            break;
        case '1':
            $tt = "Đang xử lý !";
            break;
        case '2':
            $tt = "Đang giao hàng !";
            break;
        case '3':
            $tt = "Đã giao hàng !";
            break;
        case '4':
            $tt = "Hoàn tất!";
            break;
        default:
        $tt="Đơn hàng mới ";
        break;
    }
    return $tt;
}
}

