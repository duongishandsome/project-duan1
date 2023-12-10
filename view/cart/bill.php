<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Hóa đơn</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">hóa đơn</li>
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
        <div class="jumbotron text-center">
            <h1 class="display-4">Đặt hàng thành công!</h1>
            <p class="lead">Chúng tôi rất biết ơn sự quan tâm của bạn.</p>
            <hr class="my-4">
        </div>

        <div class="col-lg-12">
            <div class="cart-shiping-update-wrapper">
                <div class="cart-clear m-auto">
                    <a href="index.php">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
        <div class="thontin">
            <div class="your-order-area d-flex justify-content-around my-4">
                <div class="kh">
                    <?php
                    if (isset($bill) && (is_array($bill))) {
                        extract($bill);
                    }
                    ?>
                    <h1 class="text-center">Thông tin khách hàng</h1>
                    <ul>
                        <li>Họ tên : <?php echo $receiver_name ?></li>
                        <li>Địa chỉ : <?php echo $receiver_address ?></li>
                        <li>Số điện thoại : <?php echo $receiver_phone ?> </li>
                    </ul>
                </div>
                <div class="don">
                    <h1 class="text-center">Thông tin đơn hàng</h1>
                    <ul>
                        <li>Mã đơn hàng : <?php echo $payment_id ?></li>
                        <li>Ngày đặt hàng : <?php echo $payment_date ?></li>
                        <li>Phương thức thanh toán : <?php echo $payment_method == "cash" ? "Tiền mặt" : 'Momo ATM'  ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="your-order-area">
                <h1 class="text-center">ĐƠN HÀNG</h1>
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
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
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 0;
                                    $tongtien = 0;
                                    global $img_path;

                                    foreach ($billct as $billct) {
                                        $hinh = $img_path . $billct['p_featured_photo'];
                                        $i = $i + 1;
                                        extract($billct);
                                        $tongtien += $billct['price'];

                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="product-thumbnail">
                                                <a href="index.php?act=ctdh&id=<?php echo $payment_id; ?>"><img
                                                        class="img-responsive ml-15px" src="<?php echo $hinh ?>"
                                                        alt="" /></a>
                                            </td>
                                            <td class="product-name"><a
                                                    href="index.php?act=ctdh&id=<?php echo $payment_id; ?>"><?php echo $p_name ?></a>
                                            </td>
                                            <td class="product-price-cart"><span
                                                    class="amount"><?php echo $price ?></span></td>
                                            <td><?php echo $color_name ?></td>
                                            <td><?php echo $size_name ?></td>
                                            <td class="product-quantity">
                                                <span><?php echo $quantity ?></span>
                                            </td>
                                            <td class="product-subtotal">
                                                <?php echo number_format($price * $quantity, 0, ',', '.') ?></td>
                                        </tr>

                                    </tbody>
                                    <?php } ?>
                                    <!-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td>
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <div class="Place-order ">
                                                <p class="btn-hover text-danger">Chờ xác nhận</p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-bold">Thành tiền: <?php //echo $tongtien 
                                                                            ?></p>
                                        </td>
                                    </tr> -->

                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- <div class="cart-shiping-update-wrapper">
                                        <p class="col-lg-4">Vui lòng khi trạng thái "Đang vận chuyển" Bạn sẽ không hủy
                                            được đơn
                                            hàng
                                        </p>

                                        <div class="cart-shiping-update">
                                            <a href="index.php?act=huydon"  onclick="showConfirmCancle(this.href, event)">Hủy đơn hàng</a>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


<!-- Cart Area End -->