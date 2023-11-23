<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Quản lý bình luận</h1>
      </div>
    </div>
   </div>
</div>
<section class="content">
      <div class="container-fluid">
        <div class="card card-cus">
            <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>NameUser</th>
                        <th>NameProduct</th>
                        <th>Chi tiết bình luận</th>
                        <th>Ngày Bình Luận</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($listcomment as $comment){
                    extract($comment);
                    $xoadm="index.php?act=xoadm&cate_id=".$cmt_id;
                    echo '
                    <tr>
                    <td>'.$cmt_id.'</td>
                    <td>'.$p_id.'</td>
                    <td>'.$user_id.'</td>
                    <td>'.$cmt_content.'</td>
                    <td>'.$cmt_date.'</td>
                    <td><a href="'.$xoadm.'"><input type="button" value="Xóa" class="btn btn-danger btn-xs"></a></td>
                </tr>
                    ';
                }
                ?>
                </tbody>
                
            </table>

            </div> 
        </div>
      </div>
</section>
