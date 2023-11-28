<?php
session_start();
include_once "../../model/pdo.php";
include_once "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
// $name_user=$_REQUEST['user'];
$dsbl = loadall_binhluan1($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* CSS cho đoạn mã bình luận */

.boxtitle {
  font-weight: bold;
}

.boxcontent2 {
  width: 100%;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 10px;
}

table td {
  padding: 5px;
  border: 1px solid #ccc;
}

.boxfooter {
  padding: 10px;
  background-color: #f5f5f5;
}

.boxfooter input[type="text"] {

  border: 1px solid #ccc;
  width:500px;
}

.boxfooter input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  width: 150px;
  margin-top:15px ;
}

.boxfooter input[type="submit"]:hover {
  background-color: #45a049;
}

.searbox {
  /* Các thuộc tính khác cho phần search box */
}

/* Các lựa chọn khác */
    </style>
</head>

<body>
    <div class="container">
        <div class="boxtitle">Bình luận</div>
        <div class="boxcontent2  ">
            <table>
                <thead>
                <tr>
                    <th>Iduser</th>
                    <th>Nội dung bình luận</th>
                    <th>Ngày bình luận</th>
                </tr>
                </thead>
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>' . $user_name. '</td>';
                    echo '<td>' .$cmt_content  . '</td>';
                    echo '<td>' . $cmt_date . '</td></tr>';
                }
                ?>
            </table>
        </div>
        <div class="boxfooter searbox">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="idpro" value="<?php echo $idpro ?>">
                <input type="text" id="" placeholder="Nhập bình luận" name="noidung"> <br>
                <input type="submit" value="Gửi bình luận" name="guibinhluan">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user-name']['user_id'];
        $name_user = $_SESSION['user-name']['user_name'];

        // $name_user=$_POST['']
        $ngaybinhluan = date("Y-m-d H:i:s");
        insert_binhluan($idpro,$iduser,$noidung,$ngaybinhluan);
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
    ?>
    </div>
</body>

</html>