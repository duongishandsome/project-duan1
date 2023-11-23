<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Quản lý tài khoản Admin</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="index.php?act=addaccadmin" class="btn btn-primary btn-sm">Thêm Tài khoản</a>
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
              <th>Tên</th>
              <th>Email</th>
              <th>Số ĐT</th>
              <th>Role</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            foreach ($listadmin as $color) {
              $i++;
              extract($color);
              $suaadmin = "index.php?act=suaadmin&admin_id=" . $admin_id;
              $xoaadmin = "index.php?act=xoaadmin&admin_id=" . $admin_id;
              echo '
                    <tr>
                    <td>' . $i . '</td>
                    <td>' . $admin_full_name . '</td>
                    <td>' . $admin_email . '</td>
                    <td>' . $admin_phone . '</td>
                    <td>' . $admin_role . '</td>
                    <td>' . $admin_status . '</td>
                    <td><a href="' . $suaadmin . '"><input type="button" value="Sửa" class="btn btn-primary btn-sm"></a>  
                        <a href="' . $xoaadmin . '"><input type="button" value="Xóa" class="btn btn-danger btn-sm"></a>
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