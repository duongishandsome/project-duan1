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
                <form action="index.php?act=addtocart&idsp=<?php echo $p_id; ?>" method="post">

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
                        <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut"><?php echo $p_current_price . " đ" ?></li>
                        </ul>
                    </div>
                    <p class="quickview-para"><?php echo $p_short_description ?></p>
                    <form action="index.php?act=addtocart>" method="post">
                        <div class="pro-details-size-color d-flex">
                            <div class="pro-details-color-wrap">
                                <span>Color</span>
                                <select class="form-select" name="color_name">
                                    <?php
                                    foreach ($list_color as $row) {
                                        extract($row);
                                    ?>
                                    <option value="<?php echo $color_name ?>"><?php echo $color_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="product-size">
                                <span>Size</span>
                                <select class="form-select" name="size_name">
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
                                <input class="cart-plus-minus-box" type="text" name="p_quantity" value="1" />
                            </div>
                            <div class="pro-details-cart">
                                <input type="hidden" name="id" value="<?php echo $p_id ?>">
                                <input type="hidden" name="name" value="<?php echo $p_name ?>">
                                <input type="hidden" name="img" value="<?php echo $p_featured_photo ?>">
                                <input type="hidden" name="price" value="<?php echo $p_current_price ?>">

                                <div class="addtocart-wrapper">
                                    <input type="submit" name="addtocart" value="Mua ngay">
                                </div>
                    </form>

                </div>
            </div>
            <div class="pro-details-wish-com">
                <div class="pro-details-cart">
                    <a href="cart.php"><i class="icon-handbag"></i>Thêm vào giỏ hàng</a>
                </div>
                <div class="pro-details-compare">
                    <a href="compare.php"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                </div>
            </div>
            <div class="pro-details-social-info">
                <span>Share</span>
                <div class="social-info">
                    <ul class="d-flex">
                        <li>
                            <a href="#"><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-google"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pro-details-policy">
                <ul>
                    <li><img src="assets/images/icons/policy.png" alt="" /><span>Chính sách bảo mật (Chỉnh
                            sửa
                            với mô-đun trấn an khách hàng)</span></li>
                    <li><img src="assets/images/icons/policy-2.png" alt="" /><span>Chính sách giao hàng
                            (Chỉnh
                            sửa với mô-đun trấn an khách hàng)</span></li>
                    <li><img src="assets/images/icons/policy-3.png" alt="" /><span>Chính sách hoàn trả
                            (Chỉnh
                            sửa với mô-đun trấn an khách hàng)
                        </span></li>
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
                <a class="active" data-bs-toggle="tab" href="#des-details2">Product Details</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <p><?php echo $p_description ?></p>
                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <?php
                if (isset($_SESSION['user-name'])) {
                ?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script>
                $(document).ready(function() {
                    $("#binhluan").load("view/binhluan/binhluanform.php", {
                        idpro: <?php echo $id ?>
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
                    <div>
                        Vui lòng đăng nhập để bình luận sản phẩm này
                    </div>
                </div>
                <?php } ?>

            </div>

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
                <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="new-product-wrapper swiper-wrapper">
                        <!-- Single Prodect -->
                        <?php
                        foreach ($sp_cung_loai as $sp) {
                            extract($sp);
                            $linksp = "index.php?act=sanphamct&idsp=" . $p_id;
                            $hinh = $img_path . $p_featured_photo;
                            echo '
                                <div class="new-product-item swiper-slide">
                                <div class="product">
                                <div class="thumb">
                                <a href="' . $linksp . '" class="image">
                                    <img src="' . $hinh . '" alt="Product" />
                                    <img class="hover-image" src="' . $hinh . '" alt="Product" />
                                </a>
                                <span class="badges">
                                    <span class="sale">-10%</span>
                                    <span class="new">New</span>
                                </span>
                                <div class="actions">
                                    <a href="index.php?act=cart" class="action cart" title="cart"><i class="icon-heart"></i></a>
                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                    <a href="compare.php" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                </div>
                                <button title="Add To Cart" class=" add-to-cart">Add
                                    To Cart</button>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="' . $linksp . ' ?>">' . $p_name . '</a></h5>
                        <span class="price">
                            <span class="new">' . $p_current_price . '</span>
                        </span>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
</div>

<!-- New Product End -->