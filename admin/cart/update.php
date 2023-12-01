<?php
if (is_array($donhang)) {
  extract($donhang);
}
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chỉnh sửa trạng thái đơn hàng</h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card card-cus">
      <div class="card-body">
        <form action="index.php?act=updatedh" method="post">
          <input type="hidden" name="id" value="<?php if (isset($payment_id)) echo $payment_id; ?>">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Trạng thái <span>*</span></label>
            <select class="form-select" aria-label="Default select example" name="status">
              <option value="0">Đơn hàng mới</option>
              <option value="1">Đang xử lý</option>
              <option value="2">Đang giao hàng</option>
              <option value="3">Đã giao hàng</option>
              <option value="4">Hoàn tất đơn hàng</option>
            </select>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <input type="submit" class="btn btn-success pull-left" name="capnhat">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>