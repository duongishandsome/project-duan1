<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm tài khoản admin</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="index.php?act=listaccadmin" class="btn btn-primary btn-md">Danh sách tài khoản</a>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card card-cus">
      <div class="card-body">
        <form action="index.php?act=addaccadmin" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Tên <span>*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="fullname" placeholder="nhập fullname ">
              </div>
              <label for="" class="col-sm-2 control-label">Email <span>*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="email" placeholder="nhập email ">
              </div>
              <label for="" class="col-sm-2 control-label">Điện thoại <span>*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="phone" placeholder="nhập số điện thoại ">
              </div>
              <label for="" class="col-sm-2 control-label">Mật khẩu <span>*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="password" placeholder="nhập mật khẩu ">
              </div>
              <label for="" class="col-sm-2 control-label">Role<span>*</span></label>
              <div class="col-sm-4">
                <select class="form-control" name="role" >
                  <option value="Admin">Admin</option>
                  <option value="Super Admin">Super Admin</option>
                </select>
              </div>
              <label for="" class="col-sm-2 control-label">Trạng thái <span>*</span></label>
              <div class="col-sm-4">
              <select class="form-control"  name="status">
                <option value="1">Hoạt Động</option>
                <option value="0">Không hoạt động</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <input class="btn btn-success pull-left" type="submit" name="themmoi" value="THÊM MỚI">
              </div>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</section>