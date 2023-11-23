<?php
if (is_array($size)) {
  extract($size);
}
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chỉnh sửa Size</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="index.php?act=listsize" class="btn btn-primary btn-md">Danh sách size</a>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card card-cus">
      <div class="card-body">
        <form action="index.php?act=updatesize" method="post">
          <input type="hidden" name="size_id" value="<?php if (isset($size_id) && ($size_id > 0)) echo $size_id; ?>">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Danh mục <span>*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="namesize" value="<?php if (isset($size_name) && ($size_name != "")) echo $size_name; ?>">
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