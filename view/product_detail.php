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
                        <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut"><?php echo $p_current_price . " đ" ?></li>
                        </ul>
                    </div>
                    <p class="quickview-para"><?php echo $p_short_description ?></p>
                    <div class="pro-details-size-color d-flex">
                        <div class="pro-details-color-wrap">
                            <span>Color</span>
                            <div class="pro-details-color-content">
                                <ul>
                                    <?php
                                    foreach ($list_color as $row) {
                                        extract($row);
                                    ?>
                                    <li style="background-color: <?php if ($color_name == "Trắng") {
                                                                            echo "white";
                                                                        } elseif ($color_name == "Đen") {
                                                                            echo "black";
                                                                        } elseif ($color_name == "Nâu") {
                                                                            echo "saddlebrown";
                                                                        } elseif ($color_name == "Vàng") {
                                                                            echo "goldenrod";
                                                                        }
                                                                        elseif ($color_name == "Xám") {
                                                                            echo "grey";
                                                                        } ?>;"></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <div class="product-size">
                            <span>Size</span>
                            <select>
                                <?php
                                foreach ($list_size as $row) {
                                    extract($row);
                                ?>
                                <option value="<?php echo $size_id ?>"><?php echo $size_name ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class=" pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                        </div>
                        <div class="pro-details-cart">
                            <button class="add-cart btn btn-primary btn-hover-primary ml-4" href="#"> Mua
                                Ngay </button>
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
    </div>
</div>


<!-- product details description area start -->
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a class="active" data-bs-toggle="tab" href="#des-details2">Product Details</a>
                <a data-bs-toggle="tab" href="#des-details3">Reviews (2)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <p><?php echo $p_description ?></p>
                    </div>
                </div>

                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/1.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                euismod vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/2.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                euismod vehicula.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <button class="btn btn-primary btn-hover-color-primary "
                                                        type="submit" value="Submit">Submit</button>
                                                </div>
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
        <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
            <div class="new-product-wrapper swiper-wrapper">
                <!-- Single Prodect -->
                <?php
                            foreach($sp_cung_loai as $sp){
                                extract($sp);
                                $linksp="index.php?act=sanphamct&idsp=".$p_id;
                                $hinh = $img_path . $p_featured_photo;
                                echo '
                                <div class="new-product-item swiper-slide">
                                <div class="product">
                                <div class="thumb">
                                <a href="'.$linksp.'" class="image">
                                    <img src="'.$hinh.'" alt="Product" />
                                    <img class="hover-image" src="'.$hinh.'" alt="Product" />
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
                                <h5 class="title"><a href="'.$linksp.' ?>">'.$p_name.'</a></h5>
                <span class="price">
                    <span class="new">'.$p_current_price.'</span>
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