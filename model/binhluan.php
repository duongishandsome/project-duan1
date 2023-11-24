<?php
function loadall_binhluan($idpro)
{
    $sql = "SELECT * FROM comment WHERE 1";

    if ($idpro > 0) {
        $sql .= " AND idpro='" . $idpro . "'";
    }
    $sql .= " ORDER BY cmt_id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
function insert_binhluan($idpro,$iduser,$noidung,$ngaybinhluan)
{
    $ngaybinhluan = date('Y/d/m');
    $sql = "insert into comment(p_id,user_id,cmt_content,cmt_date) values ('$idpro','$iduser','$noidung','$ngaybinhluan')";
    pdo_execute($sql);
}
function delete_binhluan($id)
{
    $sql = "delete from comment where id=" . $id;
    pdo_execute($sql);
}
