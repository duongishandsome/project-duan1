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
                                <li class="breadcrumb-item"><a href="index.php">trang chủ</a></li>
                                <li class="breadcrumb-item active">Thanh toán</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <?php
            //       foreach($list_order as $order){
            // extract($order);
            ?>
            <form action="index.php?act=billcomfirm" method="post">
                <?php  ?>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Chi tiết thanh toán </h3>
                            <?php
                            if (isset($_SESSION['user-name'])) {
                                $name = $_SESSION['user-name']['user_name'];
                                $address = $_SESSION['user-name']['user_address'];
                                $email = $_SESSION['user-name']['user_email'];
                                $tel = $_SESSION['user-name']['user_phone'];
                            } else {
                                $name = "";
                                $address = "";
                                $email = "";
                                $tel = "";
                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Tên</label>
                                        <input type="text" name="name" id="" value="<?php echo $name ?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Địa chỉ</label>
                                        <input class="billing-address" name="address" value="<?php echo $address ?>" type="text" />
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?php echo $tel ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Email</label>
                                        <input type="text" value="<?php echo $email ?>" />
                                    </div>
                                </div>



                                <div class="col-lg-12">
                                    <h5 class="boxtitle">PHƯƠNG THỨC THANH TOÁN</h5>
                                    <div class="form-check">
                                        <input class="form-check-input p-0 btn-rounded" type="radio"  value="cash" name="payment_method" id="payment1" checked>
                                        <label class="form-check-label" for="payment1">Trả tiền khi nhận hàng</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input p-0 btn-rounded" type="radio" name="payment_method" value="momo_atm" id="payment3">
                                        <label class="form-check-label" for="payment3">Thanh toán online</label>
                                    </div>
                                </div>

                            </div>

                            <div class="checkout-account-toggle open-toggle2 mb-30">
                                <input placeholder="Email address" type="email" />
                                <input placeholder="Password" type="password" />
                                <button class="btn-hover checkout-btn" type="submit">register</button>
                            </div>
                            <div class="additional-info-wrap">
                                <h4>Thông tin thêm</h4>
                                <div class="additional-info">
                                    <label>Ghi chú đặt hàng</label>
                                    <textarea placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng." name="message"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Sản phẩm</li>
                                            <li>Tổng cộng</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            <?php
                                            $tien = tongdonhang();
                                            foreach ($_SESSION['cart'] as $cart) {
                                            ?>

                                                <li><span class="order-middle-left"><?php echo $cart['name'] ?></span>
                                                    x<?php echo $cart['quantity'] ?> <span class="order-price">
                                                        <?php echo number_format($cart['total_price'], 0, ',', '.')  ?></span></li>

                                            <?php
                                            } ?>

                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">

                                        <ul>
                                            <li class="your-order-shipping">Phí ship</li>
                                            <li><?php echo $phiship = number_format(20000, 0, ',', '.')  ?></li>
                                        </ul>
                                    </div>
                                    <div style="border-top: 1px solid #dee0e4; margin-top:30px;">
                                        <div class="discount-code py-2">
                                            <p class="fw-bold mb-2">Nhập mã phiếu giảm giá của bạn nếu bạn có.</p>
                                            <form class="d-flex align-items-center">
                                                <select class="form-select me-2"  name="voucher_id">
                                                    <option value="" selected>Mã giảm giá</option>
                                                    <?php foreach ($voucher as $row) {
                                                        extract($row);
                                                    ?>
                                                        <option value="<?php echo $id ?>"><?php echo $name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <button class="btn btn-primary" type="submit">Áp dụng</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="your-order-total">
                                        <div class="sub-total">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-start">Tổng giá đơn :</td>
                                                        <td class="text-end"><?php echo number_format($tien, 0, ',', '.'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-start">Phí ship :</td>
                                                        <td class="text-end"><?php echo  $phiship ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td class="text-start">Mã giảm giá :</td>
                                                        <td class="text-end"></td>
                                                    </tr> -->

                                                </tbody>
                                            </table>
                                        </div>
                                        <ul>
                                            <?php
                                            $tongtien = tongdonhang(); ?>
                                            <li class="order-total">Tổng cộng</li>
                                            <li><?php echo number_format($tongtien + 20000, 0, ',', '.');  ?></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="Place-order mt-25">
                                <input type="text" hidden name="tongtien" value="<?php echo tongdonhangship(); ?>">
                                <input type="submit" class="btn-hover btn-order" name="dongydathang" value="Đặt hàng">
                                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="model/xulythanhtoanmomo.php">
                                    <button type="submit" class="btn btn-primary btn-block">Start MoMo payment....</button>
                                </form>
                                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="model/xulythanhtoanmomo_atm.php">
                                    <button type="submit" class="btn btn-primary btn-block">Thanh toán atm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-lg-12 d-flex justify-content-lg-end">
                <div class="cart-shiping-update-wrapper">
                    <div class="cart-shiping-update">
                        <a href="index.php?act=cart">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->