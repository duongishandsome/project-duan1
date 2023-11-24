<?php
function get_info_product()
{
    $sql = "select 
            p.p_id, p.p_name, p.p_current_price, p.p_old_price, p.p_quantity, p.p_featured, p.p_featured_photo, p.p_status, c.cate_name
            from 
            product p left join category c on p.cate_id = c.cate_id  
            order by p.p_id asc";
    $list_product = pdo_query($sql);
    return  $list_product;
}

function get_product_by_id($id)
{
    $sql = "select * from product where p_id=" . $id;
    $product = pdo_query($sql);
    return $product;
}

function insert_product($name, $old_price, $current_price, $quantity, $featured_photo, $desc, $short_desc, $is_featured, $status, $cate_id)
{
    $sql = "INSERT INTO product(
            p_name,
            p_old_price,
            p_current_price,
            p_quantity,
            p_featured_photo,
            p_description,
            p_short_description,
            p_featured,
            p_status,
            cate_id
        ) VALUES ('$name', '$old_price', '$current_price', '$quantity','$featured_photo','$desc','$short_desc', '$is_featured', '$status', '$cate_id')";
    pdo_execute($sql);
}

function insert_product_color($p_id, $color_id)
{
    $sql = "INSERT INTO product_color (color_id,p_id) VALUES ($color_id, $p_id)";
    pdo_execute($sql);
}

function insert_product_size($p_id, $size_id)
{
    $sql = "INSERT INTO product_size (size_id,p_id) VALUES ($size_id, $p_id)";
    pdo_execute($sql);
}

function insert_product_img($p_id, $img_name)
{
    $sql = "INSERT INTO product_img (img_name,p_id) VALUES ('$img_name', '$p_id')";
    pdo_execute($sql);
}

function delete_product($id)
{
    $sql = "SELECT * FROM product WHERE p_id=" . $id;
    $product = pdo_query_one($sql);
    $p_featured_photo = $product['p_featured_photo'];
    unlink('../upload/' . $p_featured_photo);

    $sql = "SELECT * FROM product_img WHERE p_id=" . $id;
    $result = pdo_query($sql);
    foreach ($result as $row) {
        $img_name = $row['img_name'];
        unlink('../upload/product_photos/' . $img_name);
    }

    $sql = "DELETE FROM product_img WHERE p_id=" . $id;
    pdo_execute($sql);

    $sql = "DELETE FROM product_color WHERE p_id=" . $id;
    pdo_execute($sql);

    $sql = "DELETE FROM product_size WHERE p_id=" . $id;
    pdo_execute($sql);

    $sql = "DELETE FROM comment WHERE p_id=" . $id;
    pdo_execute($sql);

    $sql = "DELETE FROM product WHERE p_id=" . $id;
    pdo_execute($sql);
}

function update_product_with_img($p_id, $name, $old_price, $current_price, $quantity, $featured_photo, $desc, $short_desc, $is_featured, $status, $cate_id)
{
    $check_old_price = !empty($old_price) ? $old_price : 'NULL';
    $sql = "UPDATE product SET 
        p_name='$name', 
        p_old_price=$check_old_price, 
        p_current_price=$current_price, 
        p_quantity=$quantity,
        p_featured_photo='$featured_photo',
        p_description='$desc',
        p_short_description='$short_desc',
        p_featured= $is_featured,
        p_status=$status,
        cate_id=$cate_id
        WHERE p_id=$p_id";
    pdo_execute($sql);
}

function update_product_no_img($p_id, $name, $old_price, $current_price, $quantity, $desc, $short_desc, $is_featured, $status, $cate_id)
{
    $check_old_price = !empty($old_price) ? $old_price : 'NULL';
    $sql = "UPDATE product SET 
        p_name='$name', 
        p_old_price=$check_old_price, 
        p_current_price=$current_price, 
        p_quantity=$quantity,
        p_description='$desc',
        p_short_description='$short_desc',
        p_featured= $is_featured,
        p_status=$status,
        cate_id=$cate_id
        WHERE p_id=$p_id";
    pdo_execute($sql);
}



function get_product_id()
{
    $sql = "SHOW TABLE STATUS LIKE 'product'";
    $list_status = pdo_query($sql);
    foreach ($list_status as $row) {
        $p_id = $row[10];
    }
    return  $p_id;
}

function get_product_photo_id()
{
    $sql = "SHOW TABLE STATUS LIKE 'product_img'";
    $list_status = pdo_query($sql);
    foreach ($list_status as $row) {
        $img_id = $row[10];
    }
    return  $img_id;
}

function get_product_color($id)
{
    $sql = "select * from product_color where p_id=" . $id;
    $list_color = pdo_query($sql);
    return $list_color;
}

function get_product_size($id)
{
    $sql = "select * from product_size where p_id=" . $id;
    $list_size = pdo_query($sql);
    return $list_size;
}

function get_product_img($id)
{
    $sql = "select * from product_img where p_id=" . $id;
    $list_img = pdo_query($sql);
    return $list_img;
}

function get_product_img_one($id)
{
    $sql = "select * from product_img where img_id=" . $id;
    $list_img = pdo_query_one($sql);
    return $list_img;
}

function delete_product_img($id)
{
    $sql = "DELETE FROM product_img WHERE img_id=" . $id;
    pdo_execute($sql);
}

function delete_product_sizes($id)
{
    $sql = "DELETE FROM product_size WHERE p_id=" . $id;
    pdo_execute($sql);
}

function delete_product_colors($id)
{
    $sql = "DELETE FROM product_color WHERE p_id=" . $id;
    pdo_execute($sql);
}

// In ra người dùng 
function loadall_sanpham($kyw=""){
    $sql="select * from product where 1";
    // if($cate_id>0){
    //     $sql.=" and cate_id ='".$cate_id."'";
    // }
    if ($kyw != "") {
        $sql .= " and p_name like '%" . $kyw . "%'";
        }
    $sql.=" order by p_id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
// function load_sanpham_cungsize($size_id=0)
// {
// /$sql = "select * from product join product_size on product.p_id = product_size.p_id" ;

//     if($size_id>0){
//         $sql.=" and size_id ='".$size_id."'";
//     }
//     $sql.=" order by p_id desc";
//     $listsanpham=pdo_query($sql);
//     return  $listsanpham;
// }
function loadall_sanpham_home()
{
    $sql = "select * from product  order by RAND() limit 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_sanpham_cungloai($id,$iddm)
{
    $sql = "select * from product where cate_id=".$iddm." AND p_id <> ".$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_new()
{
    $sql = "select * from product  order by p_id desc limit 0,5";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_store()
{
    $sql = "select * from product  order by p_id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id)
{
    $sql = "select * from product where p_id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function get_img_by_pid($id)
{
    $sql = "select * from product_img where p_id=" . $id;
    $list_img = pdo_query($sql);
    return $list_img;
}
function get_color_by_pid($id)
{
    $sql = "SELECT * FROM product_color 
    JOIN color ON product_color.color_id = color.color_id
    WHERE product_color.p_id = " . $id;
    $list_color = pdo_query($sql);
    return $list_color;
}
function get_size_by_pid($id)
{
    $sql = "SELECT * FROM product_size
    JOIN size ON product_size.size_id = size.size_id
    WHERE product_size.p_id = " . $id;
    $list_size = pdo_query($sql);
    return $list_size;
}
