<?php
function loadall_binhluan()
{
    $sql="select comment.cmt_content,comment.cmt_id,comment.cmt_date,product.p_name,user.user_name FROM `comment`
    LEFT JOIN user on comment.user_id = user.user_id
    LEFT JOIN product on comment.p_id = product.p_id";
    $listbl = pdo_query($sql);
    return $listbl;
}
function loadall_binhluan1($idpro)
{
    $sql="select comment.cmt_content,comment.cmt_date,user.user_name, user.img FROM `comment`
    LEFT JOIN user on comment.user_id = user.user_id
    LEFT JOIN product on comment.p_id = product.p_id WHERE product.p_id=".$idpro;
    $listbl = pdo_query($sql);
    return $listbl;
}
function insert_binhluan($idpro,$iduser,$noidung,$ngaybinhluan)
{
    $ngaybinhluan = date("Y-m-d H:i:s");
    $sql = "insert into comment(p_id,user_id,cmt_content,cmt_date) values ('$idpro','$iduser','$noidung','$ngaybinhluan')";
    pdo_execute($sql);
}
function delete_binhluan($id)
{
    $sql = "delete from comment where cmt_id=" . $id;
    pdo_execute($sql);
}