<?php
session_start();
include_once "../../model/pdo.php";
include_once "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.min.css">
  <style>
    .review-img img {
      width: 58px;
      height: 58px;
      border-radius: 50%;
    }

    .cmt-section {
      max-height: 300px;
      overflow-y: auto;
    }

    .comment-date {
      font-size: 12px;
      color: #999;
    }

    .name-user {
      font-size: 20px !important;
      font-weight: 700 !important;
      color: #333 !important;
    }
  </style>
</head>

<body>
  <div class="row">
    <div class="col-12 cmt-section" id="commentSection"></div>
    <?php if (isset($_SESSION['user-name'])) {
    ?>
      <div class="col-lg-12">
      <div class="ratting-form-wrapper pl-50">
        <h3 class="py-2">Viết bình luận</h3>
        <div class="ratting-form">
          <form id="commentForm" method="POST">
            <input type="hidden" name="idpro" value="<?php echo $idpro ?>">
            <div class="row">
              <div class="col-md-12">
                <div class="rating-form-style form-submit">
                  <textarea placeholder="Nhập bình luận" name="noidung"></textarea>
                  <button class="btn btn-primary btn-cus btn-hover-color-primary" name="guibinhluan" type="submit" value="Submit">Gửi bình luận</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    

  </div>
  <script src="./assets/js/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      loadComments();

      $('#commentForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
          url: './model/addcomment.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            $('#commentForm')[0].reset();
            loadComments();
          }
        });
      });

      function loadComments() {
        $.ajax({
          url: './model/loadcomments.php',
          type: 'GET',
          data: {
            p_id: <?php echo $idpro ?>,
          },
          success: function(response) {
            $('#commentSection').html(response);
          }
        });
      }
    });
  </script>
</body>

</html>