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
                            viewcart(1);
                            ?>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="index.php">Tiếp tục mua sắm</a>
                                </div>
                                <div class="cart-shiping-update">
                                    <a href="index.php?act=xoahet_cart"
                                        onclick="showConfirmationDialog(this.href, event)">Xóa giỏ hàng</a>
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