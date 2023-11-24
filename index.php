    <?php
    session_start();
    include "model/pdo.php";
    include "model/taikhoanuser.php";
    include "model/danhmuc.php";
    include "model/cart.php";
    include "model/voucher.php";


    include "model/color.php";
    include "model/size.php";

    include "global.php";
    include "view/header.php";
    include "view/OffCanvas.php";
    include "model/sanpham.php";

    $spnew = loadall_sanpham_home();
    $sp_moi = loadall_sanpham_new();
    $dsdm = loadall_danhmuc();
    $ds_size = loadall_size();
    $ds_color = loadall_color();
    $ds_sp_store = loadall_sanpham_store();


    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];


    if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'login':
                include_once "view/acount/login.php";

                // Đăng nhập
                if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                    $user = $_POST['user-name'];
                    $pass = $_POST['user-password'];
                    $checkuser = checkuser($user, $pass);
                    $thongbao = "";
                    if (is_array($checkuser)) {
                        $_SESSION['user-name'] = $checkuser;
                        // header('location:index.php');
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
                        exit; // Kết thúc kịch bản sau khi chuyển hướng
                    } else {
                        echo '<script>document.querySelector(".thongbao").innerText = "Mật khẩu sai rồi !";</script>';                        // $thongbao = "Tài khoản hoặc mật khẩu không chính xác !";
                    }
                }

                // Đăng ký  
                if (isset($_POST['dangky']) && $_POST['dangky']) {
                    $email = $_POST['user-email'];
                    $user = $_POST['user-name'];
                    $pass = $_POST['user-password'];

                    insert_taikhoan($email, $user, $pass);
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
                ?>
    <meta http-equiv="refresh" content="0;url=index.php?act=login">
    <?php
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
                    $_SESSION['user-name'] = checkuser($user, $pass);

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
                        update_pass($id, $pass, $user);
                        // cập nhật lại session user mới 
                        $_SESSION['user-name'] = checkuser($user, $pass);
                        $thongbao = "Thay đổi mật khẩu thành công !";
                    } else {
                        $thongbao = "Mật khẩu không trùng khớp !";
                    }
                }
                include "view/acount/my-account.php";
                break;


            case 'addtocart':
                if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];

                    $size = $_POST['size_name'];
                    $color = $_POST['color_name'];

                    $soluong = 2;
                    $ttien = $soluong * $price;
                    $spadd = [$id, $name, $img, $price, $soluong, $ttien, $color, $size];
                    array_push($_SESSION['cart'], $spadd);
                }

                include_once "view/cart/cart.php";
                break;

            case 'delcart':
                if (isset($_GET['idcart']) && $_GET['idcart'] > 0) {
                    $id = $_GET['idcart'];
                    array_splice($_SESSION['cart'], $id - 1, 1);
                } else {
                    $_SESSION['cart'] = [];
                }
            ?>
    <script>
setTimeout(function() {
    window.location.href = 'index.php?act=viewcart';
}, 0);
    </script>
    <?php
                break;

            case 'xoahet_cart':
                $_SESSION['cart'] = []; // Xóa hết sản phẩm trong giỏ hàng
                include_once "view/cart/empty-cart.php";
                break;

            case 'viewcart':
                if(count($_SESSION['cart'])==0){
                    include "view/cart/empty-cart.php";
                }
                else{
                    include_once "view/cart/cart.php";
                }
                break;
            case 'thanhtoan':
                $voucher = loadall_voucher();
                include_once "view/cart/thanhtoan.php";
                break;
            case 'bill':
                include_once "view/cart/bill.php";
                break;
            case 'trangthaidon':
                include_once "view/cart/trangthaidon.php";
                break;

            case 'trangthai_chitiet':
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
                    $sql = "SELECT * FROM product p
                    LEFT JOIN product_size ps ON p.p_id = ps.p_id
                    LEFT JOIN size s ON ps.size_id = s.size_id
                    " . $where_clause . " 
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
                    include_once "view/product_detail.php";
                }
                break;

            case 'blog':
                include_once "view/tintuc/blog.php";
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