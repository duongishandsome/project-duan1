<?php
session_start();
include_once "../../model/pdo.php";
include_once "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
// $name_user=$_REQUEST['user'];
$comments = loadall_binhluan1($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/style.min.css">
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
      width: 500px;
    }

    .boxfooter input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      width: 150px;
      margin-top: 15px;
    }

    .boxfooter input[type="submit"]:hover {
      background-color: #45a049;
    }

    .searbox {
      /* Các thuộc tính khác cho phần search box */
    }

    .comment-date {
      font-size: 12px;
      color: #999;
    }

    .review-img img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
    }

    .btn-cus {
      color: #fff;
      background-color: #ff7004;
      border-color: #ff7004;
      border: 0;
    }

    /* Các lựa chọn khác */
  </style>
</head>

<body>
  <div class="row">
    <?php
    foreach ($comments as $comment) {
      extract($comment);
      $date_time = new DateTime($cmt_date);
      $formatted_datetime = $date_time->format('H:i:s d/m/Y');
      $img_path = $img ? "./upload/$img" : "../../upload/user-1.png"
    ?>
      <div class="single-review col-12">
        <div class="review-img">
          <img src="<?php echo $img_path ?>" alt="img">
        </div>
        <div class="review-content">
          <div class="review-top-wrap">
            <div class="review-left">
              <div class="review-name">
                <h4><?php echo $user_name ?></h4>
              </div>
              <div class="comment-date">
                <?php echo $formatted_datetime ?>
              </div>
            </div>
          </div>
          <div class="review-bottom">
            <p>
              <?php echo $cmt_content ?>
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="col-lg-12">
      <div class="ratting-form-wrapper pl-50">
        <h3 class="py-2">Viết bình luận</h3>
        <div class="ratting-form">
          <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="idpro" value="<?php echo $idpro ?>">
            <div class="row">
              <div class="col-md-12">
                <div class="rating-form-style form-submit">
                  <textarea placeholder="Nhập bình luận" name="noidung"></textarea>
                  <button class="btn btn-primary btn-cus btn-hover-color-primary " name="guibinhluan" type="submit" value="Submit">Gửi bình luận</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <?php
  if (isset($_POST['guibinhluan'])) {
    $noidung = $_POST['noidung'];
    $idpro = $_POST['idpro'];
    $iduser = $_SESSION['user-name']['user_id'];
    $name_user = $_SESSION['user-name']['user_name'];

    // echo "hello". $noidung;

    // $name_user=$_POST['']
    $ngaybinhluan = date("Y-m-d H:i:s");
    insert_binhluan($idpro, $iduser, $noidung, $ngaybinhluan);
    header("location: " . $_SERVER['HTTP_REFERER']);
  }
  ?>
</body>

</html>