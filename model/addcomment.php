<?php
session_start();
include_once "pdo.php";
function insert_binhluan($idpro,$iduser,$noidung,$ngaybinhluan)
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngaybinhluan = date("Y-m-d H:i:s");
    $sql = "insert into comment(p_id,user_id,cmt_content,cmt_date) values ('$idpro','$iduser','$noidung','$ngaybinhluan')";
    pdo_execute($sql);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noidung = $_POST['noidung'];
      $idpro = $_POST['idpro'];
      $iduser = $_SESSION['user-name']['user_id'];
      $name_user = $_SESSION['user-name']['user_name'];
      $ngaybinhluan = date("Y-m-d H:i:s");
      insert_binhluan($idpro, $iduser, $noidung, $ngaybinhluan);
      echo "bình luận thành công";
} else {
    echo 'Yêu cầu không hợp lệ';
}
?>