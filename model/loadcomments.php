<?php
session_start();
include_once "pdo.php";

function get_comments_by_id($idpro)
{
    $sql = "SELECT comment.cmt_content, comment.cmt_date, user.user_name, user.img FROM `comment`
    LEFT JOIN user ON comment.user_id = user.user_id
    LEFT JOIN product ON comment.p_id = product.p_id WHERE product.p_id=" . $idpro . " order by comment.cmt_date desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $p_id = $_GET['p_id'];

    $comments = get_comments_by_id($p_id);

    ob_start();
    foreach ($comments as $comment) {
        extract($comment);
        $date_time = new DateTime($cmt_date);
        $formatted_datetime = $date_time->format('H:i:s d/m/Y');
        $img_path = $img ? "./upload/$img" : "../../upload/user-1.png";
        ?>
        <div class="single-review col-12">
            <div class="review-img">
                <img src="<?php echo $img_path ?>" alt="img">
            </div>
            <div class="review-content">
                <div class="review-top-wrap">
                    <div class="review-left">
                        <div class="review-name">
                            <h4 class="name-user"><?php echo $user_name ?></h4>
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
    <?php
    }
    $html = ob_get_clean();

    echo $html;
} else {
    echo 'Yêu cầu không hợp lệ';
}