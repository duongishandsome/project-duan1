<div class="offcanvas-overlay"></div>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Sản phẩm</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="index.php?act=store">sản phẩm</a></li>
                            <li class="breadcrumb-item active">Sản phẩm chi tiết</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Product Details Area Start -->
<div class="product-details-area pt-100px pb-100px">
    <div class="container">
        <div class="row">

            <?php extract($onesp);
            $hinh = $img_path . $p_featured_photo;
            ?>
            <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">

                        <?php
                        foreach ($list_img as $row) {
                            $hinh_con = $img_path2 . $row['img_name'];
                        ?>
                        <div class="swiper-slide zoom-image-hover">
                            <img class="img-responsive m-auto" src="<?php echo $hinh_con ?>" alt="">
                        </div>

                        <?php  } ?>


                    </div>
                </div>

                <div class="swiper-container zoom-thumbs slider-nav-style-1 small-nav mt-15px mb-15px">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($list_img as $row) {
                            $hinh_con = $img_path2 . $row['img_name'];
                        ?>
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="<?php echo $hinh_con ?>" alt="">
                        </div>

                        <?php  } ?>

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content">
                    <h2><?php echo $p_name ?></h2>
                    <div class="pro-details-rating-wrap">
                        <div class="rating-product">
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                            <i class="ion-android-star"></i>
                        </div>
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">
                                <?php echo number_format($p_current_price, 0, ',', '.')  . " đ" ?>
                                <del class="px-3 text-secondary

"><small><?php echo $p_old_price ? $p_old_price . " đ" : "" ?></small></del>
                            </li>
                        </ul>
                    </div>
                    <p class="quickview-para"><?php echo $p_short_description ?></p>
                    <form id="AddToCartForm" action="index.php?act=addtocart" method="post">
                        <div class="pro-details-size-color d-flex">
                            <div class="pro-details-color-wrap mx-3">
                                <span>Màu</span>
                                <select class="form-control" name="color_name">

                                    <?php
                                    foreach ($list_color as $row) {
                                        extract($row);
                                    ?>
                                    <option value="<?php echo $color_name ?>"><?php echo $color_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class=" pro-details-color-wrap">
                                <span>Kích cỡ</span>
                                <select class="form-control" name="size_name">
                                    <?php
                                    foreach ($list_size as $row) {
                                        extract($row);
                                    ?>
                                    <option value="<?php echo $size_name ?>"><?php echo $size_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class=" pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" required type="text" maxlength="1"
                                    onblur="validateInput(this);" name="p_quantity" value="1" />
                            </div>

                            <div class="pro-details-cart">
                                <input type="hidden" name="id" value="<?php echo $p_id ?>">
                                <input type="hidden" name="name" value="<?php echo $p_name ?>">
                                <input type="hidden" name="img" value="<?php echo $p_featured_photo ?>">
                                <input type="hidden" name="price" value="<?php echo $p_current_price ?>">

                                <div class="addtocart-wrapper">
                                    <?php if (empty($_SESSION['user-name'])) { ?>
                                    <!-- Hiển thị nút "Tung ngay" khi chưa đăng nhập -->
                                    <button id="addToCartButton" name="themcart"
                                        class="btn btn-primary btn-hover-primary ml-4 mx-3">Mua ngay</button>
                                    <?php } else { ?>
                                    <!-- Hiển thị nút "Mua ngay" khi đã đăng nhập -->
                                    <button class="btn btn-primary btn-hover-primary ml-4 mx-3" name="addtocart"
                                        type="submit">Mua ngay</button>
                                    <?php } ?>
                                    <button id="addToCartButton" name="themcart"><i class="icon-handbag"></i>Thêm vào
                                        giỏ
                                        hàng</button>
                                </div>
                            </div>
                    </form>

                </div>
            </div>

            <div class="pro-details-policy">
                <ul>
                    <li><img src="assets/images/icons/policy.png" alt="" /><span>Chính sách bảo mật</span></li>
                    <li><img src="assets/images/icons/policy-2.png" alt="" /><span>Chính sách giao hàng</span></li>
                    <li><img src="assets/images/icons/policy-3.png" alt="" /><span>Chính sách hoàn trả</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- product details description area start -->
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a class="active" data-bs-toggle="tab" style="text-decoration: none;" href="#des-details2">Chi tiết sản
                    phẩm</a>
                <a data-bs-toggle="tab" style="text-decoration: none;" href="#des-details3">Bình luận</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <p><?php echo $p_description ?></p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <?php
                    if (isset($_SESSION['user-name'])) {
                    ?>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                    <script>
                    $(document).ready(function() {
                        $("#binhluan").load("view/binhluan/binhluanform.php", {
                            idpro: <?php echo $p_id ?>
                        });
                    });
                    </script>
                    <div class="mb" id="binhluan">
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div style="margin-top: 20px;">
                            Vui lòng đăng nhập để bình luận sản phẩm này
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>
<div>

</div>
<!-- product details description area end -->

<!-- New Product Start -->
<div class="section pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-start mb-11">
                    <h2 class="title">Sản Phẩm Khác Cùng Loại :</h2>
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
            <div class="new-product-wrapper swiper-wrapper">
                <?php
                $i = 0;
                foreach ($sp_cung_loai as $sp) {
                    extract($sp);
                    $hinh = $img_path . $p_featured_photo;
                ?>
                <div class="new-product-item swiper-slide">
                    <div class="product">
                        <div class="thumb">
                            <a href="index.php?act=sanphamct&idsp=<?php echo $p_id; ?>" class="image">
                                <img src="<?php echo $hinh ?>" alt="Product" />
                                <img class="hover-image" src="<?php echo $hinh ?>" alt="Product" />
                            </a>
                            <form class="AddToCartFormItem"" method=" post">
                                <input type="hidden" name="id" value="<?php echo $p_id ?>">
                                <input type="hidden" name="name" value="<?php echo $p_name ?>">
                                <input type="hidden" name="img" value="<?php echo $p_featured_photo ?>">
                                <input type="hidden" name="price" value="<?php echo $p_current_price ?>">
                                <button title="Add To Cart" type="submit" name="themcart"
                                    class="addToCartButtonItem add-to-cart">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                        <div class="content">
                            <h5 class="title"><a
                                    href="index.php?act=sanphamct&idsp=<?php echo $p_id; ?>"><?php echo $p_name ?>
                                </a></h5>
                            <span class="price">
                                <span
                                    class="new"><?php echo number_format($p_current_price, 0, ',', '.') . " đ" ?></span>
                            </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- New Product End -->