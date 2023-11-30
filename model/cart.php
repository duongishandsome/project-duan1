 <?php
    if (!function_exists('insert_bill')) {

        function insert_bill($user_id, $name, $phone, $address, $payment_date, $tongdonhang, $pttt, $message)
        {
            $sql = "insert into `order`(user_id, receiver_name,receiver_phone,receiver_address,payment_date,paid_amount,payment_method,message) values ($user_id, '$name', '$phone', '$address','$payment_date', $tongdonhang, '$pttt', '$message')";
            return pdo_execute_return_lastInssertId($sql);
        }
    }
    
    if (!function_exists('insert_bill_detail')) {

        function insert_bill_detail($p_id, $order_id, $user_id, $size, $color, $price, $p_name, $p_img)
        {
            $sql = "insert into `order_detail`(p_id, order_id,user_id,size_name,color_name,price,product_name,product_img) values ('$p_id', '$order_id', '$user_id', '$size', '$color', '$price', '$p_name', '$p_img')";
            return pdo_execute($sql);
        }
    }

    if (!function_exists('viewcart')) {

        function viewcart($del)
        {
            global $img_path;
            $tong = 0;
            $i = 0;
            if ($del == 1) {
                $xoasp_th = 'Thao tác';
                $xoasp_td = '<td></td>';
            } else {
                $xoasp_th = '';
                $xoasp_td = '';
            }
    ?>
 <thead>
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
                    $hinh = $img_path . $cart[2];
                    $ttien = $cart[3] * $cart[4];
                    $tong = tongdonhang();
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
             <a href="#"><img class="img-responsive ml-15px" src="<?php echo $hinh ?>" alt="" /></a>
         </td>
         <td class="product-name"><a href="#"><?php echo $cart[1] ?></a></td>
         <td class="product-price-cart"><span class="amount"><?php echo $cart[3] ?></span></td>
         <td><?php echo $cart[6] ?></td>
         <td><?php echo $cart[7] ?></td>
         <td class="product-quantity">
             <div class="cart-plus-minus">
                 <input class="cart-plus-minus-box" type="text" name="qtybutton" value="<?php echo $cart[4] ?>" />
             </div>
         </td>
         <td class="product-subtotal"><?php echo $cart[5] ?></td>
         <td class="product-remove">
             <a href="<?php echo $xoasp_td; ?>"><i class="icon-close"></i></a>
         </td>
     </tr>
     <?php } ?>
 </tbody>
 <?php
        }
    }

    if (!function_exists('tongdonhang')) {
        function tongdonhang()
        {
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart) {
                $tongtien += $cart[3] * $cart[4];
            }
            return $tongtien;
        }
    }
    if (!function_exists('loadone_order')) {
    function loadone_order($id)
{
    $sql = "SELECT * FROM `order` WHERE id = $id";
    $order = pdo_query_one($sql);
    return $order;
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

?>