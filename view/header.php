<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/furns/furns/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 15:04:44 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Furns - Furniture eCommerce HTML Template</title>
    <meta name="description"
        content="240+ Best Bootstrap Templates are available on this website. Find your template for your project compatible with the most popular HTML library in the world." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/furns/" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Furns - Responsive eCommerce HTML Template" />
    <meta property="og:url" content="PAGE_URL" />
    <meta property="og:site_name" content="Furns - Responsive eCommerce HTML Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Furns - Responsive eCommerce HTML Template" />
    <meta name="robots" content="noindex, follow" />
    <!-- Add site Favicon -->
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png" />
    
    <!-- Structured Data  -->
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "Replace_with_your_site_title",
        "url": "Replace_with_your_site_URL"
    }
    </script>

    <!-- vendor css (Bootstrap & Icon Font) -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css" />
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css" /> -->

    <!-- plugins css (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="assets/css/plugins/venobox.css" />  -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/css.css">


    <!-- Main Style -->
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->

</head>

<body>
    <!-- Header Area start  -->
    <div class="header section">
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                        class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="index.php?act=sanpham"  method="POST">
                                        <input class="form-control" placeholder="Enter your search key" type="text" name="kyw">
                                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>

                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">

                                    <?php
                                    if (isset($_SESSION['user-name'])) {
                                        extract($_SESSION['user-name']);
                                        if (!empty($img)) {
                                            $hinhpath = "upload/" . $img;
                                            if (is_file($hinhpath)) {
                                                $hinh = "<img src='" . $hinhpath . "' style='height: 40px; width: 40px; border-radius: 50%;'>";
                                            } else {
                                                $hinh = "No photo";
                                            }
                                        } else {
                                            $hinh = "<img src='assets/images/avata/avata_null.jpg' alt='' ' style='height: 40px; width: 40px; border-radius: 50%;'>";
                                        }
                                    ?>
                                    <?php echo $hinh ?>
                                    <?php
                                    } else {
                                    ?>
                                    <i class="icon-user"></i>
                                    <?php } ?>

                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">

                                    <?php
                                    if (isset($_SESSION['user-name'])) {
                                        extract($_SESSION['user-name']);
                                    ?>
                                    <li><a class="dropdown-item" href="index.php?act=account">Tài khoản</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=trangthaidon   ">Đơn mua</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=dangxuat">Đăng xuất</a></li>
                                    <?php

                                    } else {
                                    ?>
                                    <li><a class="dropdown-item" href="index.php?act=login">Đăng nhập</a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart"
                                class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="icon-handbag"></i>
                                <span class="header-action-num">100</span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu"
                                class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->

        <!-- Main Menu Start -->
        <div class="bg-gray d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="main-menu manu-color-white">
                            <ul>
                                <li><a href="index.php">Trang chủ</a></li>
                                <li><a href="index.php?act=about">Giới thiệu</a></li>
                                <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                                <li><a href="index.php?act=blog">Tin tức</a></li>
                                <li><a href="index.php?act=contact">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu End -->
    </div>
    <!-- Header Area End  -->