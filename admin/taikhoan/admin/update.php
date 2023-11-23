<!-- <?php
      if (is_array($admin)) {
        extract($admin);
      }
      $hinhpath = "../upload/" . $img;
      if (is_file($hinhpath)) {
        $hinh = "<img src='" . $hinhpath . "' height='80'>";
      } else {
        $hinh = "no photto";
      }
      ?> -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Update tài khoản admin</h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card card-cus">
      <div class="card-body">
        <form action="index.php?act=updateadmin" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $admin_id ?>">
          <div class="card-body">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Fullname <span>*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="fullname" value="<?php echo $admin_full_name ?>">
              </div>
              <label for="" class="col-sm-2 control-label">Email <span>*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="email" value="<?php echo $admin_email ?>">
              </div>
              <label for="" class="col-sm-2 control-label">Phone <span>*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="phone" value="<?php echo $admin_phone ?>">
              </div>
              <label for="" class="col-sm-2 control-label">Role<span>*</span></label>
              <div class="col-sm-4">
                <select class="form-control" name="role" >
                  <option <?php echo $admin_role == "Admin"  ? "selected" : "" ?> value="Admin">Admin</option>
                  <option <?php echo $admin_role == "Super Admin"  ? "selected" : "" ?> value="Super Admin">Super Admin</option>
                </select>
              </div>
              <label for="" class="col-sm-2 control-label">Trạng thái <span>*</span></label>
              <div class="col-sm-4">
              <select class="form-control"  name="status">
                <option <?php echo $admin_role == "1"  ? "selected" : "" ?> value="1">Hoạt Động</option>
                <option <?php echo $admin_role == "0"  ? "selected" : "" ?> value="0">Không hoạt động</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <input class="btn btn-success pull-left" type="submit" name="capnhat" value="Cập nhật">
                <a href="index.php?act=listaccadmin"><input class="btn btn-success pull-left" type="button" value="DANH SÁCH"></a>
              </div>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</section>