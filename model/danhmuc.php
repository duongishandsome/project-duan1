<?php
function loadall_danhmuc()
{
    $sql = "select * from category order by cate_id asc";
    $listdanhmuc = pdo_query($sql);
    return  $listdanhmuc;
}
function loadone_danhmuc($id)
{
    $sql = "select * from category where cate_id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function insert_danhmuc($tendm)
{
    $sql = "insert into category(cate_name) values('$tendm')";
    pdo_execute($sql);
}
function delete_danhmuc($id)
{
    $get_product = "select * from product where cate_id=" . $id;
    $list_product = pdo_query($get_product);
    $p_ids = [];
    foreach ($list_product as $row) {
        $p_ids[] = $row['p_id'];
    }

    for ($i = 0; $i < count($p_ids); $i++) {
        $sql = "SELECT * FROM product WHERE p_id=" . $p_ids[$i];
        $result = pdo_query($sql);
        foreach ($result as $row) {
            $p_featured_photo = $row['p_featured_photo'];
            unlink('../upload/' . $p_featured_photo);
        }

        $sql = "SELECT * FROM product_img WHERE p_id=" . $p_ids[$i];
        $result = pdo_query($sql);
        foreach ($result as $row) {
            $img_name = $row['img_name'];
            unlink('../upload/product_photos/' . $img_name);
        }

        $sql = "DELETE FROM product_img WHERE p_id=" . $p_ids[$i];
        pdo_execute($sql);

        $sql = "DELETE FROM product_color WHERE p_id=" . $p_ids[$i];
        pdo_execute($sql);

        $sql = "DELETE FROM product_size WHERE p_id=" . $p_ids[$i];
        pdo_execute($sql);

        $sql = "DELETE FROM comment WHERE p_id=" . $p_ids[$i];
        pdo_execute($sql);

        $sql = "DELETE FROM product WHERE p_id=" . $p_ids[$i];
        pdo_execute($sql);
    }

    $sql = "delete from category where cate_id=" . $id;
    pdo_execute($sql);
}
function update_danhmuc($id, $tendm)
{
    $sql = "update category set cate_name='" . $tendm . "' where cate_id=" . $id;
    pdo_execute($sql);
}

function check_exist_category($cate_name) {
    $sql = "SELECT * FROM category WHERE cate_name= '$cate_name'";
    $total_row = pdo_query_row_count($sql);
    return  $total_row;
}

?>