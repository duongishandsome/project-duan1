<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/color.php";
include "../model/size.php";
include "../model/user.php";
include "../model/sanpham.php";
include "../model/accuser.php";
include "../model/voucher.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/cart.php";
include 'header.php';
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "listdm":
            $listdanhmuc = loadall_danhmuc();
            include "category/list.php";
            break;
        case "adddm":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $valid = 1;
                if (empty($_POST['tendm'])) {
                    $valid = 0;
                    $error_message .= "Tên danh mục không được để trống<br>";
                } else {
                    $total = check_exist_category($_POST['tendm']);
                    if ($total) {
                        $valid = 0;
                        $error_message .= "Danh mục đã tồn tại<br>";
                    }
                }

                if ($valid == 1) {
                    $tendm = $_POST['tendm'];
                    insert_danhmuc($tendm);
                    $success_message = 'Thêm danh mục thành công.';
                }
            }
            include "category/add.php";
            break;
        case "xoadm":
            if (isset($_GET['cate_id']) && ($_GET['cate_id'] > 0)) {
                delete_danhmuc($_GET['cate_id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "category/list.php";
            break;
        case "suadm":
            if (isset($_GET['cate_id']) && $_GET['cate_id'] > 0) {
                $danhmuc = loadone_danhmuc($_GET['cate_id']);
            }
            include "category/update.php";
            break;
        case "updatedm":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $valid = 1;
                if (empty($_POST['namedm'])) {
                    $valid = 0;
                    $error_message .= "Tên danh mục không được để trống<br>";
                } else {
                    $total = check_exist_category($_POST['namedm']);
                    if ($total) {
                        $valid = 0;
                        $error_message .= "Danh mục đã tồn tại<br>";
                    }
                }

                if ($valid == 1) {
                    $tendm = $_POST['namedm'];
                    $id = $_POST['cate_id'];
                    update_danhmuc($id, $tendm);

                    $listdanhmuc = loadall_danhmuc();
                    include "category/list.php";
                } else {
                    $danhmuc = loadone_danhmuc($_POST['cate_id']);
                    include "category/update.php";
                }
            }
            break;

        case "listuser":
            $list_user = get_all_user_customer();
            $list_admin = get_all_user_admin();
            include "user/list.php";
            break;
        case "listproduct":
            $list_product = get_info_product();
            include "product/list.php";
            break;
        case "adduser":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) { 
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_phone = $_POST['user_phone'];
                $user_password = $_POST['user_password'];
                $status = $_POST['status'];
                $role_id = $_POST['role_id'];

                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

                insert_user($user_name, $user_email, $user_phone, $hashed_password, $status, $role_id);
                $success_message = 'Thêm tài khoản thành công.';
            }
            $list_role = get_role();
            include "user/add.php";
            break;
        case "updatestatususer":
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                update_user_status($_GET['user_id']);
            }
            header("location: index.php?act=listuser");
            break;
        case "deleteuser":
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                delete_user($_GET['user_id']);
                header("location: index.php?act=listuser");
            }
            break;
            break;
        case "addproduct":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $valid = 1;
                if (empty($_POST['cate_id'])) {
                    $valid = 0;
                    $error_message .= "Bạn phải chọn danh mục<br>";
                }
                if (empty($_POST['p_name'])) {
                    $valid = 0;
                    $error_message .= "Tên sản phẩm không được để trống<br>";
                }

                if (empty($_POST['p_current_price'])) {
                    $valid = 0;
                    $error_message .= "Giá hiện tại không được để trống<br>";
                }

                if (empty($_POST['p_quantity'])) {
                    $valid = 0;
                    $error_message .= "Số lượng sản phẩm không được để trống<br>";
                }

                $path = $_FILES['p_featured_photo']['name'];
                $path_tmp = $_FILES['p_featured_photo']['tmp_name'];

                if ($path != '') {
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $file_name = basename($path, '.' . $ext);
                    if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
                        $valid = 0;
                        $error_message .= 'Bạn phải chọn ảnh có định dạng jpg, jpeg, gif or png<br>';
                    }
                } else {
                    $valid = 0;
                    $error_message .= 'Bản phải chọn ảnh đại diện<br>';
                }

                if ($valid == 1) {
                    $name = $_POST['p_name'];
                    $old_price = $_POST['p_old_price'];
                    $current_price = $_POST['p_current_price'];
                    $quantity = $_POST['p_quantity'];
                    $desc = $_POST['p_description'];
                    $short_desc = $_POST['p_short_description'];
                    $is_featured = $_POST['p_is_featured'];
                    $status = $_POST['status'];
                    $cate_id = $_POST['cate_id'];

                    $product_id = get_product_id();


                    $featured_photo = 'product-featured-' . $product_id . '.' . $ext;
                    move_uploaded_file($path_tmp, '../upload/' . $featured_photo);

                    insert_product($name, $old_price, $current_price, $quantity, $featured_photo, $desc, $short_desc, $is_featured, $status, $cate_id);



                    if (isset($_POST['size'])) {
                        foreach ($_POST['size'] as $value) {
                            insert_product_size($product_id, $value);
                        }
                    }

                    if (isset($_POST['color'])) {
                        foreach ($_POST['color'] as $value) {
                            insert_product_color($product_id, $value);
                        }
                    }

                    if (isset($_FILES['photo']["name"]) && isset($_FILES['photo']["tmp_name"])) {
                        $photo = array();
                        $photo = $_FILES['photo']["name"];
                        $photo = array_values(array_filter($photo));

                        $photo_temp = array();
                        $photo_temp = $_FILES['photo']["tmp_name"];
                        $photo_temp = array_values(array_filter($photo_temp));

                        $next_id = get_product_photo_id();
                        $z = $next_id;

                        for ($i = 0; $i < count($photo); $i++) {
                            $my_ext1 = pathinfo($photo[$i], PATHINFO_EXTENSION);
                            if ($my_ext1 == 'jpg' || $my_ext1 == 'png' || $my_ext1 == 'jpeg' || $my_ext1 == 'gif') {
                                $final_name1[$i] = $z . '.' . $my_ext1;
                                move_uploaded_file($photo_temp[$i], "../upload/product_photos/" . $final_name1[$i]);
                                $z++;
                            }
                        }

                        if (isset($final_name1)) {
                            for ($i = 0; $i < count($final_name1); $i++) {
                                insert_product_img($product_id, $final_name1[$i]);
                            }
                        }
                    }

                    $success_message = 'Thêm sản phẩm thành công.';
                }
            }
            $listdanhmuc = loadall_danhmuc();
            $listcolor = loadall_color();
            $listsize =  loadall_size();
            include "product/add.php";
            break;
        case "suaproduct":
            if (isset($_GET['p_id']) && ($_GET['p_id'] > 0)) {
                $id_pro = $_GET['p_id'];
                $product = get_product_by_id($_GET['p_id']);
                $listdanhmuc = loadall_danhmuc();
                $listcolor = loadall_color();
                $listsize =  loadall_size();
                $result1 = get_product_color($id_pro);
                foreach ($result1 as $row) {
                    $list_color[] = $row['color_id'];
                }
                $result2 = get_product_size($id_pro);
                foreach ($result2 as $row) {
                    $list_size[] = $row['size_id'];
                }
                $list_img = get_product_img($id_pro);
            }
            include "product/update.php";
            break;
        case "delete-other-photo":
            if (isset($_GET['p_id']) && isset($_GET['img_id'])) {
                $img_id = $_GET['img_id'];

                $product_img = get_product_img_one($img_id);
                $photo = $product_img['img_name'];
                if ($photo != '') {
                    unlink('../upload/product_photos/' . $photo);
                }
                delete_product_img($img_id);
            }
            if (isset($_GET['p_id']) && ($_GET['p_id'] > 0)) {
                $id_pro = $_GET['p_id'];
                $product = get_product_by_id($_GET['p_id']);
                $listdanhmuc = loadall_danhmuc();
                $listcolor = loadall_color();
                $listsize =  loadall_size();
                $result1 = get_product_color($id_pro);
                foreach ($result1 as $row) {
                    $list_color[] = $row['color_id'];
                }
                $result2 = get_product_size($id_pro);
                foreach ($result2 as $row) {
                    $list_size[] = $row['size_id'];
                }
                $list_img = get_product_img($id_pro);
            }
            include "product/update.php";
            break;
        case "updateproduct":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $valid = 1;
                if (empty($_POST['cate_id'])) {
                    $valid = 0;
                    $error_message .= "Bạn phải chọn dnah mục sản phẩm<br>";
                }
                if (empty($_POST['p_name'])) {
                    $valid = 0;
                    $error_message .= "Tên sản phẩm không được để trống<br>";
                }

                if (empty($_POST['p_current_price'])) {
                    $valid = 0;
                    $error_message .= "Giá hiện tại không được để trống<br>";
                }

                if (empty($_POST['p_quantity'])) {
                    $valid = 0;
                    $error_message .= "Số lượng sản phẩm không được để trống<br>";
                }

                $path = $_FILES['p_featured_photo']['name'];
                $path_tmp = $_FILES['p_featured_photo']['tmp_name'];

                if ($path != '') {
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $file_name = basename($path, '.' . $ext);
                    if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
                        $valid = 0;
                        $error_message .= 'Bạn phải chọn ảnh có định dạng jpg, jpeg, gif or png<br>';
                    }
                }

                if ($valid == 1) {
                    $p_id = $_POST['p_id'];
                    $name = $_POST['p_name'];
                    $old_price = $_POST['p_old_price'];
                    $current_price = $_POST['p_current_price'];
                    $quantity = $_POST['p_quantity'];
                    $desc = $_POST['p_description'];
                    $short_desc = $_POST['p_short_description'];
                    $is_featured = $_POST['p_is_featured'];
                    $status = $_POST['status'];
                    $cate_id = $_POST['cate_id'];

                    if ($path == '') {
                        update_product_no_img($p_id, $name, $old_price, $current_price, $quantity, $desc, $short_desc, $is_featured, $status, $cate_id);
                    } else {

                        unlink('../upload/' . $_POST['current_photo']);

                        $final_name = 'product-featured-' . $p_id . '.' . $ext;
                        move_uploaded_file($path_tmp, '../upload/' . $final_name);

                        update_product_with_img($p_id, $name, $old_price, $current_price, $quantity, $final_name, $desc, $short_desc, $is_featured, $status, $cate_id);
                    }

                    if (isset($_POST['size'])) {

                        delete_product_sizes($p_id);

                        foreach ($_POST['size'] as $value) {
                            insert_product_size($p_id, $value);
                        }
                    } else {
                        delete_product_sizes($p_id);
                    }

                    if (isset($_POST['color'])) {

                        delete_product_colors($p_id);

                        foreach ($_POST['color'] as $value) {
                            insert_product_color($p_id, $value);
                        }
                    } else {
                        delete_product_colors($p_id);
                    }

                    if (isset($_FILES['photo']["name"]) && isset($_FILES['photo']["tmp_name"])) {
                        $photo = array();
                        $photo = $_FILES['photo']["name"];
                        $photo = array_values(array_filter($photo));

                        $photo_temp = array();
                        $photo_temp = $_FILES['photo']["tmp_name"];
                        $photo_temp = array_values(array_filter($photo_temp));

                        $next_id = get_product_photo_id();
                        $z = $next_id;

                        for ($i = 0; $i < count($photo); $i++) {
                            $my_ext1 = pathinfo($photo[$i], PATHINFO_EXTENSION);
                            if ($my_ext1 == 'jpg' || $my_ext1 == 'png' || $my_ext1 == 'jpeg' || $my_ext1 == 'gif') {
                                $final_name1[$i] = $z . '.' . $my_ext1;
                                move_uploaded_file($photo_temp[$i], "../upload/product_photos/" . $final_name1[$i]);
                                $z++;
                            }
                        }

                        if (isset($final_name1)) {
                            for ($i = 0; $i < count($final_name1); $i++) {
                                insert_product_img($p_id, $final_name1[$i]);
                            }
                        }
                    }
                    $list_product = get_info_product();
                    include "product/list.php";
                } else {
                    if (isset($_POST['p_id'])) {
                        $id_pro = $_POST['p_id'];
                        $product = get_product_by_id($id_pro);
                        $listdanhmuc = loadall_danhmuc();
                        $listcolor = loadall_color();
                        $listsize =  loadall_size();
                        $result1 = get_product_color($id_pro);
                        foreach ($result1 as $row) {
                            $list_color[] = $row['color_id'];
                        }
                        $result2 = get_product_size($id_pro);
                        foreach ($result2 as $row) {
                            $list_size[] = $row['size_id'];
                        }
                        $list_img = get_product_img($id_pro);
                    }

                    include "product/update.php";
                }
            }

            break;
        case "deleteproduct":
            if (isset($_GET['p_id']) && ($_GET['p_id'] > 0)) {
                delete_product($_GET['p_id']);
            }
            header("location: index.php?act=listproduct");
            break;
        case "listcolor":
            $listcolor = loadall_color();
            include "settingpro/color/list.php";
            break;
        case "addcolor":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $valid = 1;
                if (empty($_POST['tenmau'])) {
                    $valid = 0;
                    $error_message .= "Tên màu không được để trống<br>";
                } else {
                    $total = check_exist_color($_POST['tenmau']);
                    if ($total) {
                        $valid = 0;
                        $error_message .= "Màu đã tồn tại<br>";
                    }
                }

                if ($valid == 1) {
                    $tenmau = $_POST['tenmau'];
                    insert_color($tenmau);
                    $success_message = 'Thêm màu thành công.';
                }
            }
            include "settingpro/color/add.php";
            break;
        case "xoacolor":
            if (isset($_GET['color_id']) && ($_GET['color_id'] > 0)) {
                delete_color($_GET['color_id']);
            }
            $listcolor = loadall_color();
            include "settingpro/color/list.php";
            break;
        case "suacolor":
            if (isset($_GET['color_id']) && ($_GET['color_id'] > 0)) {
                $color = loadone_color($_GET['color_id']);
            }
            include "settingpro/color/update.php";
            break;
        case "updatecolor":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tencolor = $_POST['namecolor'];
                $id = $_POST['color_id'];
                update_color($id, $tencolor);
                $thongbao = "cập nhật thành công";
            }
            $listcolor = loadall_color();
            include "settingpro/color/list.php";
            break;
        case "listsize":
            $listsize = loadall_size();
            include "settingpro/size/list.php";
            break;
        case "addsize":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $valid = 1;
                if (empty($_POST['tensize'])) {
                    $valid = 0;
                    $error_message .= "Tên size không được để trống<br>";
                } else {
                    $total = check_exist_size($_POST['tensize']);
                    if ($total) {
                        $valid = 0;
                        $error_message .= "size đã tồn tại<br>";
                    }
                }

                if ($valid == 1) {
                    $tensize = $_POST['tensize'];
                    insert_size($tensize);
                    $success_message = 'Thêm size thành công.';
                }
            }
            include "settingpro/size/add.php";
            break;
        case "xoasize":
            if (isset($_GET['size_id']) && ($_GET['size_id'] > 0)) {
                delete_size($_GET['size_id']);
            }
            $listsize = loadall_size();
            include "settingpro/size/list.php";
            break;
        case "suasize":
            if (isset($_GET['size_id']) && ($_GET['size_id'] > 0)) {
                $size = loadone_size($_GET['size_id']);
            }
            include "settingpro/size/update.php";
            break;
        case "updatesize":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tensize = $_POST['namesize'];
                $id = $_POST['size_id'];
                update_size($id, $tensize);
                $thongbao = "cập nhật thành công";
            }
            $listsize = loadall_size();
            include "settingpro/size/list.php";
            break;

        case "logout_admin":
            ob_start();
            session_start();
            unset($_SESSION['user-name']);
            header('location: ../index.php?act=login');
            exit;
            break;
        case "listbinhluan":
            $listbinhluan = loadall_binhluan();
            include "binhluan/list.php";
            break;
        case "xoabinhluan":
            if (isset($_GET['cmt_id']) && ($_GET['cmt_id'] > 0)) {
                delete_binhluan($_GET['cmt_id']);
            }
            $listbinhluan = loadall_binhluan();
            include "binhluan/list.php";
            break;
        case "listvoucher":
            $listvoucher = loadall_voucher();
            include "discount/list.php";
            break;
        case "addvoucher":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $description = $_POST['desc'];
                $discount_percent = $_POST['discount_percent'];
                $status = $_POST['status'];
                $quantity = $_POST['quantity'];
                $valid_from = $_POST['valid_from'];
                $valid_to = $_POST['valid_to'];
                insert_voucher($name, $description, $discount_percent, $status, $quantity, $valid_from, $valid_to);
                $success_message = 'Thêm danh mục thành công.';
            }
            $listvoucher = loadall_voucher();
            include "discount/add.php";
            break;
        case "xoavoucher":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_voucher($_GET['id']);
            }
            $listvoucher = loadall_voucher();
            include "discount/list.php";
            break;
        case "suavoucher":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $voucher = loadone_voucher($_GET['id']);
            }
            include "discount/update.php";
            break;
        case "updatevoucher":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['desc'];
                $discount_percent = $_POST['discount_percent'];
                $status = $_POST['status'];
                $quantity = $_POST['quantity'];
                $valid_from = $_POST['valid_from'];
                $valid_to = $_POST['valid_to'];
                update_voucher($id, $name, $description, $discount_percent, $status, $quantity, $valid_from, $valid_to);
            }
            $listvoucher = loadall_voucher();
            include "discount/list.php";
            break;
        case "listthongke":
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;

        case "bieudo":
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case "listoders":
            $listbill=loadall_order(0);
            include "cart/list.php";
            break;
            case 'ctdh':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $ct=loadall_ctdh($_GET['id']);
                }
                include "cart/donhang.php";
                break;
        default:
            //
            break;
    }
} else {
    include "dashboard.php";
}
include 'footer.php';
