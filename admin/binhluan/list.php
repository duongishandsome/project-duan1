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
                  foreach($listbinhluan as $binhluan){
                    $xoacmt = "index.php?act=xoabinhluan&cmt_id=" . $binhluan['cmt_id'];
                  ?>
                  
                    <tr>
                        <td><?php echo $binhluan['cmt_id']?></td>
                        <td><?php echo $binhluan['user_name']?></td>
                        <td><?php echo $binhluan['p_name']?></td>
                        <td><?php echo $binhluan['cmt_content']?></td>
                        <td><?php echo $binhluan['cmt_date']?></td>
                        <td><a class="btn btn-primary btn-sm" href="<?php echo $xoacmt?>">Xóa</a></td>
                    <tr>
                  <?php } ?>
                  
         
                </tbody>
                
            </table>

            </div> 
        </div>
      </div>
</section>
