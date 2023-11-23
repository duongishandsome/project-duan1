<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Quản lý Size</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="index.php?act=addsize" class="btn btn-primary btn-md">Thêm size</a>
        </div>
      </div>
    </div>
  </div>
</div>


<section class="content">
  <div class="container-fluid">
    <div class="card card-cus">
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>STT</th>
              <th>Size</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $i = 0;
            foreach ($listsize as $color) {
              extract($color);
              $i++;
              $suasize = "index.php?act=suasize&size_id=" . $size_id;
              $xoasize = "index.php?act=xoasize&size_id=" . $size_id;
              echo '
                    <tr>
                    <td>' . $i . '</td>
                    <td>' . $size_name . '</td>
                    <td><a href="' . $suasize . '"><input type="button" value="Sửa" class="btn btn-primary btn-sm"></a>  
                         <a href="#" data-href="' . $xoasize . '" data-toggle="modal" data-target="#confirm-delete">
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
        <p>Bạn có chắc muốn xóa size này không?</p>
        <p style="color:red;">Hãy cẩn thận! Các dữ liệu liên quan liên quan cũng có thể bị xóa.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <a class="btn btn-danger btn-ok">Xóa</a>
      </div>
    </div>
  </div>
</div>