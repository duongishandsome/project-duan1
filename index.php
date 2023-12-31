<?php
session_start();
include "model/pdo.php";
include "model/taikhoanuser.php";
include "model/danhmuc.php";
include_once "model/cart.php";
include "model/voucher.php";
include "model/binhluan.php";

include "model/color.php";
include "model/size.php";

include "global.php";
include "view/header.php";
include "model/sanpham.php";

$spnew = loadall_sanpham_home();
$sp_moi = loadall_sanpham_new();
$dsdm = loadall_danhmuc();
$ds_size = loadall_size();
$ds_color = loadall_color();
$ds_sp_store = loadall_sanpham_store();
$ds_sp_discount = loadall_sanpham_discount();
$count_sp = count_sanpham_shop();
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login':
            // Đăng nhập
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                if (empty($_POST['email']) || empty($_POST['password'])) {
                    $error_message = 'Email và Mật khẩu không được để trống <br>';
                } else {

                    $email = strip_tags($_POST['email']);
                    $password = strip_tags($_POST['password']);

                    $checkuser = get_info_user($email);

                    if (!$checkuser) {
                        $error_message .= 'Email không đúng<br>';
                    } else {
                        $check = password_verify($password, $checkuser['user_password']);
                        if ($check) {
                            if ($checkuser['user_status'] == 0) {
                                $error_message .= 'Tài khoản đã bị khóa<br>';
                            } else {
                                $_SESSION['user-name'] = $checkuser;
                                if ($checkuser['role_id'] == 1) {
                                    echo "<script>window.location.href='./admin/index.php '</script>";
                                } else {
                                    echo "<script>window.location.href='index.php '</script>";
                                }
                            }
                        } else {
                            $error_message .= 'Password không đúng<br>';
                        }
                    }
                }
            }
            include_once "view/acount/login.php";

            // Đăng ký  
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['user-email'];
                $user = $_POST['user-name'];
                $pass = $_POST['user-password'];
                $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
                $role_id = 2;

                insert_taikhoan($email, $user, $hashedPassword, $role_id);
                echo '<script>document.querySelector(".thongbao").innerText = "Đăng ký thành công :)";</script>';                        // $thongbao = "Tài khoản hoặc mật khẩu không chính xác !";


            }
            break;

        case 'quenmk':
            if (isset($_POST['guiemail']) && $_POST['guiemail']) {
                $email = $_POST['email'];
                // cách 2: Gửi thông báo về email
                $sendMailMess = sendMail($email);
            }
            include_once "view/acount/quenmk.php";
            break;

        case 'dangxuat':
            session_unset();
            // header('location:index.php');
            //    include_once "view/gioithieu.php";
            echo "<script>window.location.href='index.php?act=login'</script>";
            break;
        case "account":
            if (isset($_POST['update_user']) && $_POST['update_user']) {
                $email = $_POST['user-email'];
                $user = $_POST['user-name'];
                $pass = $_POST['user-password'];
                $phone = $_POST['user-phone'];
                $adress = $_POST['user-adress'];
                $gender = $_POST['gender'];
                $birth = $_POST['birth'];
                $id = $_POST['id'];

                $hinh = $_FILES['hinh']['name'];
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                }
                update_taikhoan($id, $email, $user, $pass, $phone, $adress, $gender, $birth, $hinh);

                // cập nhật lại session user mới 
                $_SESSION['user-name'] = get_info_user($email);

                $thongbao = "Cập nhật thông tin thành công !";
            }
            if (isset($_POST['update_pass']) && $_POST['update_pass']) {
                $user = $_POST['user-name'];
                $pass = $_POST['user-password'];
                $pass_new = $_POST['password-new'];
                $pass_new_confirm = $_POST['password-new-confirm'];
                $id = $_POST['id'];

                $thongbao = "";

                if ($pass_new == $pass_new_confirm) {
                    $pass = $pass_new;
                    $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
                    update_pass($id, $hashedPassword, $user);
                    // cập nhật lại session user mới 
                    $email_user = $_SESSION['user-name']['user_email'];
                    $_SESSION['user-name'] = get_info_user($email_user);
                    $thongbao = "Thay đổi mật khẩu thành công !";
                } else {
                    $thongbao = "Mật khẩu không trùng khớp !";
                }
            }
            include "view/acount/my-account.php";
            break;


        case 'addtocart':
            if (isset($_SESSION['user-name'])) {
                if (isset($_POST['addtocart'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $size = isset($_POST['size_name']) ? $_POST['size_name'] : '60cm';
                    $color = isset($_POST['color_name']) ? $_POST['color_name'] : 'Đen';
                    $soluong = isset($_POST['p_quantity']) && $_POST['p_quantity'] ? $_POST['p_quantity'] : 1;
                    $ttien = $soluong * $price;
                    $product_exists = false;
                    foreach ($_SESSION['cart'] as $key => $item) {
                        if ($item['id'] == $id && $item['color'] == $color && $item['size'] == $size) {
                            $_SESSION['cart'][$key]['quantity'] += $soluong;
                            $soluongnew =  $_SESSION['cart'][$key]['quantity'];
                            $total = $soluongnew * $price;
                            $_SESSION['cart'][$key]['total_price'] = $total;
                            $product_exists = true;
                            break;
                        }
                    }

                    unset($item);

                    if ($product_exists == false) {
                        $spadd = array(
                            'id' => $id,
                            'name' => $name,
                            'image' => $img,
                            'quantity' => $soluong,
                            'total_price' => $ttien,
                            'price' => $price,
                            'color' => $color,
                            'size' => $size,
                        );
                        array_push($_SESSION['cart'], $spadd);
                    }
                    echo "<script>window.location.href='index.php?act=viewcart'</script>";
                }
            } else {
                echo "<script>window.location.href='index.php?act=login'</script>";
            }
            break;


        case 'delcart':
            if (isset($_GET['idcart']) && $_GET['idcart'] > 0) {
                $id = $_GET['idcart'];
                array_splice($_SESSION['cart'], $id - 1, 1);
            } else {
                $_SESSION['cart'] = [];
            }

            echo "<script>window.location.href='index.php?act=viewcart'</script>";
            break;

        case 'xoahet_cart':
            $_SESSION['cart'] = []; // Xóa hết sản phẩm trong giỏ hàng
            include_once "view/cart/empty-cart.php";
            break;

        case 'viewcart':
            if (count($_SESSION['cart']) == 0) {
                include "view/cart/empty-cart.php";
            } else {
                include_once "view/cart/cart.php";
            }
            break;
        case 'thanhtoan':
            $voucher = loadall_voucher();
            include_once "view/cart/thanhtoan.php";
            break;
        case 'huydon':
            $payment_id = $_GET['payment_id'];
            huydon($payment_id );
            echo "<script>window.location.href='index.php?act=trangthaidon'</script>";
            break;
        case 'billcomfirm':
            if (isset($_POST['dongydathang'])) {
                if ($_POST['payment_method'] == 'cash') {
                    $user_id = $_SESSION['user-name']['user_id'];
                    $payment_id = time() . "";
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $pttt = $_POST['payment_method'];
                    $phone = $_POST['phone'];
                    $phone = $_POST['phone'];
                    $tongdonhang = $_POST['tongtien'];
                    $message = $_POST['message'];
                    $payment_date = date("Y-m-d H:i:s");
                    insert_bill($user_id, $name, $phone, $address, $tongdonhang, $pttt, $message, $payment_date, $payment_id);
                    $cart = cart_list();
                    foreach ($cart as $product) {
                        insert_order_detail($product['id'], $product['color'], $product['size'], $product['quantity'], $product['price'],  $payment_id);
                    }
                    cart_destroy();
                    echo "<script>window.location.href='index.php?act=pagethank&payment_id=$payment_id'</script>";
                }


                if ($_POST['payment_method'] == 'momo_atm') {
                    $user_id = $_SESSION['user-name']['user_id'];
                    $payment_id = time() . "";
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $pttt = $_POST['payment_method'];
                    $phone = $_POST['phone'];
                    $tongdonhang = $_POST['tongtien'];
                    $message = $_POST['message'];
                    $payment_date = date("Y-m-d H:i:s");

                    $_SESSION['infobill'] = array(
                        'user_id' => $user_id,
                        'payment_id' => $payment_id,
                        'name' => $name,
                        'address' => $address,
                        'payment_method' => $pttt,
                        'phone' => $phone,
                        'tongdonhang' => $tongdonhang,
                        'message' => $message,
                        'payment_date' => $payment_date
                    );

                    echo "<script>window.location.href='model/xulythanhtoanmomo_atm.php?payment_id=$payment_id&total=$tongdonhang'</script>";
                }
            }

            break;
        case 'pagethank':
            if (isset($_GET['payment_id'])) {
                $payment_id = $_GET['payment_id'];
                $bill = loadone_order($payment_id);
                $billct = loadall_order_detail($payment_id);

                include_once "view/cart/bill.php";
            } elseif (isset($_GET['partnerCode'])) {
                $infobill = $_SESSION['infobill'];

                $user_id = $infobill['user_id'];
                $payment_id = $infobill['payment_id'];
                $name = $infobill['name'];
                $address = $infobill['address'];
                $pttt = $infobill['payment_method'];
                $phone = $infobill['phone'];
                $tongdonhang = $infobill['tongdonhang'];
                $message = $infobill['message'];
                $payment_date = $infobill['payment_date'];
                insert_bill($user_id, $name, $phone, $address, $tongdonhang, $pttt, $message, $payment_date, $payment_id);
                $cart = cart_list();
                foreach ($cart as $product) {
                    insert_order_detail($product['id'], $product['color'], $product['size'], $product['quantity'], $product['price'],  $payment_id);
                }
                unset($_SESSION['infobill']);
                cart_destroy();
                $partnerCode = $_GET['partnerCode'];
                $orderId = $_GET['orderId'];
                $amount = $_GET['amount'];
                $orderType = $_GET['orderType'];
                $payType = $_GET['payType'];
                $orderType = $_GET['orderType'];
                $orderInfo = $_GET['orderInfo'];
                $transId = $_GET['transId'];
                insert_momo($partnerCode, $orderId, $amount, $orderInfo,  $orderType, $transId, $payType);

                $bill = loadone_order($orderId);
                $billct = loadall_order_detail($orderId);
                include_once "view/cart/bill.php";
            }
            break;
            unset($_SESSION['infobill']);

        case 'trangthaidon':
            $billct = loadall_order_user($_SESSION['user-name']['user_id']);
            include_once "view/cart/trangthaidon.php";
            break;

        case 'ctdh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $ct = loadall_order_detail($_GET['id']);
            }
            include_once "view/cart/trangthai_chitiet.php";
            break;
        case 'error':
            include_once "view/404.php";
            break;

        case 'about':
            include_once "view/gioithieu/about.php";
            break;
        case 'sanpham':
            $conditions = array();

            if (isset($_GET['size_id']) && $_GET['size_id'] > 0) {
                $size_id = $_GET['size_id'];
                $conditions[] = "ps.size_id = $size_id";
            }

            if (isset($_GET['cate_id']) && $_GET['cate_id'] > 0) {
                $cate_id = $_GET['cate_id'];
                $conditions[] = "p.cate_id = $cate_id";
            }

            if (isset($_POST['kyw']) && !empty($_POST['kyw'])) {
                $kyw = $_POST['kyw'];
                $conditions[] = "p.p_name LIKE '%$kyw%'";
            }

            $where_clause = !empty($conditions) ? " WHERE " . implode(" AND ", $conditions) : "";

            if (empty($where_clause)) {
                $sql = "SELECT * FROM product ORDER BY p_id DESC";
            } elseif (isset($_GET['cate_id'])) {
                $sql = "SELECT * FROM product p
                    " . $where_clause . " 
                    ORDER BY p.p_id DESC";
            } else {
                $sql = "SELECT p.*, GROUP_CONCAT(s.size_name) as sizes
                FROM product p
                LEFT JOIN product_size ps ON p.p_id = ps.p_id
                LEFT JOIN size s ON ps.size_id = s.size_id
                " . $where_clause . " 
                GROUP BY p.p_id
                ORDER BY p.p_id DESC";
            }

            $listsanpham = pdo_query($sql);

            include_once "view/sanpham/sanpham.php";
            break;


        case "sanphamct":
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $onesp = loadone_sanpham($_GET['idsp']);
                extract($onesp);
                $list_img = get_img_by_pid($_GET['idsp']);
                $list_color  = get_color_by_pid($_GET['idsp']);
                $list_size = get_size_by_pid($_GET['idsp']);
                $sp_cung_loai = load_sanpham_cungloai($_GET['idsp'], $cate_id);
                $binhluan = loadall_binhluan1($_GET['idsp']);
                include_once "view/product_detail.php";
            }
            break;

        case 'contact':
            include_once "view/lienhe/contact.php";
            break;

        default:
            include_once "view/404.php";
            break;
    }
} else {
    include "view/trangchu/home.php";
}

include "view/footer.php";