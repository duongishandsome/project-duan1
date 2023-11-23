<?php
if (is_array($color)) {
  extract($color);
}
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chỉnh sửa màu sắc</h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card card-cus">
      <div class="card-body">
        <form action="index.php?act=updatecolor" method="post">
          <input type="hidden" name="color_id" value="<?php if (isset($color_id) && ($color_id > 0)) echo $color_id; ?>">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Danh mục <span>*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="namecolor" value="<?php if (isset($color_name) && ($color_name != "")) echo $color_name; ?>">
            </div>
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