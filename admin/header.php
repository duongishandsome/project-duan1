<?php
ob_start();
session_start();
$error_message = '';
$success_message = '';
if(!isset($_SESSION['user-name']) && $_SESSION['user-name']['role_id'] != 1) {
	header('location: ../index.php?act=login');
	exit;
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>

    <link rel="stylesheet" href="assets/lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/cmxform.css">

    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/css/style.css">



</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index.php" class="nav-link">Trang chủ</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                                    if (isset($_SESSION['user-name'])) {
                                        extract($_SESSION['user-name']);
                                        if (!empty($img)) {
                                            $hinhpath = "../upload/" . $img;
                                            if (is_file($hinhpath)) {
                                                $hinh = "<img src='" . $hinhpath . "' style='height: 40px; width: 40px; border-radius: 50%;'>";
                                            } else {
                                                $hinh = "No photo";
                                            }
                                        } else {
                                            $hinh = "<img src='assets/images/avata/avata_null.jpg' alt='' ' style='height: 40px; width: 40px; border-radius: 50%;'>";
                                        }
                                    ?>
                        <?php echo $_SESSION['user-name']['user_name'] ?>
                        <?php echo $hinh ?>
                        <?php
                                    } else {
                                    ?>
                        <i class="icon-user"></i>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="../index.php?act=account">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./index.php?act=logout_admin">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <?php $cur_page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>

        <?php include 'sidebar.php'; ?>

        <div class="content-wrapper">