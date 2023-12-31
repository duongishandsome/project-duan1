<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Cửa hàng</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">sản phẩm</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Shop Category pages -->
<div class="shop-category-area pb-100px pt-70px">
    <div class="container">
        <h1 class="timk text-center"><?php if(isset($kyw)){
            echo "Kết quả tìm kiếm : ". $kyw;
        } ?></h1>

        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex p-2">
                    <!-- Left Side start -->
                    <p>Sản phẩm của cửa hàng</p>
                    <!-- Left Side End -->
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <!-- <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <div class="shop-select">
                            <select class="shop-sort">
                                <option data-display="Relevance">Relevance</option>
                                <option value="1"> Name, A to Z</option>
                                <option value="2"> Name, Z to A</option>
                                <option value="3"> Price, low to high</option>
                                <option value="4"> Price, high to low</option>
                            </select>

                        </div> -->
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">

                    <div class="row">
                        <?php
                        $i = 0;
                        foreach ($listsanpham as $sp) {
                            extract($sp);
                            $hinh = $img_path . $p_featured_photo;
                        ?>
                        <div class="col-lg-4  col-md-6 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-delay="200">
                            <!-- Single Prodect -->
                            <div class="product mb-25px">
                                <div class="thumb">
                                    <a href="index.php?act=sanphamct&idsp=<?php echo $p_id; ?>" class="image">
                                        <img src="<?php echo $hinh ?>" alt="Product" />
                                        <img class="hover-image" src="<?php echo $hinh ?>" alt="Product" />
                                    </a>

                                    <!-- <div class="actions">
                                        <a href="cart.php" class="action cart" title="cart"><i
                                                class="icon-handbag"></i></a>
                                        <a href="#" class="action quickview" data-link-action="quickview"
                                            title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="icon-size-fullscreen"></i></a>
                                        <a href="compare.php" class="action compare" title="Compare"><i
                                                class="icon-refresh"></i></a>
                                    </div> -->
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
                                            href="index.php?act=sanphamct&idsp=<?php echo $p_id; ?>"><?php echo $p_name ?></a>
                                    </h5>
                                    <span class="price">
                                        <span
                                            class="new"><?php echo number_format($p_current_price, 0, ',', '.') . " đ" ?></span>
                                        <span class="old"><?php echo $p_old_price ? $p_old_price .  " đ" : "" ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-30px" data-aos="fade-up">
                        <ul>
                            <li>
                                <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                            </li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li>
                                <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                <div class="shop-sidebar-wrap">
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <div class="main-heading">
                            <h3 class="sidebar-title">Danh mục</h3>
                        </div>
                        <div class="sidebar-widget-category">
                            <ul>
                                <?php
                                foreach ($dsdm as $dm) {
                                    extract($dm);
                                    $linkdm = "index.php?act=sanpham&cate_id=" . $cate_id;
                                    echo ' <li><a href="' . $linkdm . '">' . $cate_name . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget-group">

                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Size</h3>
                            <div class="sidebar-widget-category">
                                <ul>
                                    <?php
                                    foreach ($ds_size as $size) {
                                        extract($size);
                                        $linksp = "index.php?act=sanpham&size_id=" . $size_id;
                                        echo '
                                        <li>
                                            <div>
                                             <a href="' . $linksp . '">' . $size_name . '</a>
                                                
                                            </div>
                                        </li>';
                                    } ?>

                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->

                        <!-- Sidebar single item -->

                    </div>
                    <!-- Sidebar single item -->

                </div>
            </div>
        </div>
    </div>
</div>
</div>