<?php

if (isset($_SESSION['user-name'])) {

?>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Giỏ hàng</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">giỏ hàng</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Giỏ hàng của bạn</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">

                    <table>
                            <?php
                                global $img_path;
                                $tong = 0;
                                $i = 0;
                                $del = 1;
                                if ($del == 1) {
                                    $xoasp_th = 'Thao tác';
                                    $xoasp_td2 = '<td></td>';
                                } else {
                                    $xoasp_th = '';
                                    $xoasp_td2 = '';
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
                                <?php
                                    foreach ($_SESSION['cart'] as $cart) {
                                        $hinh = $img_path . $cart[2];
                                        $ttien = $cart[3] * $cart[4];
                                        $tong += $ttien;
                                        $i++;
                                        if ($del == 1) {
                                            $xoasp_td = 'index.php?act=delcart&idcart=' . $i;                                   
                                             } else {
                                            $xoasp_td = '';
                                        }
                                    ?>
                                <tr>
                                    <td><?php echo $i ?> </td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="img-responsive ml-15px" src="<?php echo $hinh ?>"
                                                alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#"><?php echo $cart[1] ?></td>
                                    <td class="product-price-cart"><span class="amount"><?php echo $cart[3] ?></span>
                                    </td>

                                    <td>
                                        <?php echo $cart[6] ?>
                                    </td>

                                    <td>
                                        <?php echo $cart[7] ?>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                value="<?php echo $cart[4] ?>" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><?php echo $cart[5] ?></td>

                                    <td class="product-remove">
                                        <a href="<?php echo $xoasp_td; ?>"><i class="icon-close"></i></a>

                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="index.php">Tiếp tục mua sắm</a>
                                </div>
                                <div class="cart-shiping-update">
                                    <a href="#">Cập nhật giỏ hàng</a>
                                    <a href="index.php?act=xoahet_cart">Xóa giỏ hàng</a>
                                </div>
                            </div>

                            <div class="col-lg-12 d-flex justify-content-lg-end">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-clear">
                                        <a href="index.php?act=thanhtoan">Tiến hành thanh toán</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
<?php
} else {
    include_once "view/acount/login.php";
    echo '<script>document.querySelector(".thongbao").innerText = "Đăng nhập để mua hàng !";</script>';
}
?>