    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Giỏ hàng</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <?php
                    $tien = 0;
                    $tongtien = 0;
                    $phiship = 0;
                    foreach ($_SESSION['cart'] as $cart) {
                        $hinh = $img_path . $cart[2];
                        $tien += $cart[3];

                    ?>
                    <li>
                        <a href="index.php?act=sanphamct&idsp=<?php echo $p_id; ?>" class="image"><img
                                src="<?php echo $hinh ?>" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="index.php?act=sanphamct&idsp=<?php echo $p_id; ?>"
                                class="title"><?php echo $cart[1] ?></a>
                            <span class="quantity-price">1 x <span class="amount"><?php echo $cart[3] ?></span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-start">Tổng phụ :</td>
                                <td class="text-end"><?php echo $tien ?></td>
                            </tr>

                            <tr>
                                <td class="text-start">Phí ship :</td>
                                <td class="text-end"><?php echo $phiship = 20000 ?></td>
                            </tr>
                            <tr>
                                <td class="text-start">Tổng cộng :</td>
                                <td class="text-end theme-color"><?php echo $tongtien = $tien + $phiship ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="buttons">
                    <a href="index.php?act=viewcart" class="btn btn-dark btn-hover-primary mb-30px">Giỏ hàng</a>
                    <a href="index.php?act=thanhtoan" class="btn btn-outline-dark current-btn">Thanh toán</a>
                </div>
                <p class="minicart-message">Giao hàng miễn phí cho tất cả các đơn hàng trên $100!</p>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->