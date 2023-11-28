<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Quản lý danh mục</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="index.php?act=adddm" class="btn btn-primary btn-md">Thêm danh mục</a>
        </div>
      </div>
    </div>
  </div>
</div>


<section class="content">
  <div class="container-fluid">
    <div class="card card-cus">
      <div class="card-body">
        <table class="example2 table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên Danh Mục</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            foreach ($listdanhmuc as $danhmuc) {
              $i++;
              extract($danhmuc);
              $suadm = "index.php?act=suadm&cate_id=" . $cate_id;
              $xoadm = "index.php?act=xoadm&cate_id=" . $cate_id;
              echo '
                    <tr>
                    <td>' . $i . '</td>
                    <td>' . $cate_name . '</td>
                    <td>
                        <a href="' . $suadm . '"><input type="button" value="Sửa" class="btn btn-primary btn-sm"></a>  
                        <a href="#" data-href="' . $xoadm . '" data-toggle="modal" data-target="#confirm-delete">
                          <input type="button" value="Xóa" class="btn btn-danger btn-sm">
                        </a>
                    </td>
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Xác nhận xóa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Bạn có chắc muốn xóa danh mục này không?</p>
        <p style="color:red;">Hãy cẩn thận! Các dữ liệu liên quan như sản phảm, ảnh,... liên quan cũng có thể bị xóa.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <a class="btn btn-danger btn-ok">Xóa</a>
      </div>
    </div>
  </div>
</div>