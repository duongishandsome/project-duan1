<?php
if (is_array($danhmuc)) {
  extract($danhmuc);
}
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chỉnh sửa danh mục</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="index.php?act=listdm" class="btn btn-primary btn-md">Danh sách danh mục</a>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <?php if ($error_message) { ?>
      <div class="callout callout-danger bg-danger">

        <p>
          <?php echo $error_message; ?>
        </p>
      </div>
    <?php } ?>

    <?php if ($success_message) { ?>
      <div class="callout callout-success bg-success">

        <p><?php echo $success_message; ?></p>
      </div>
    <?php } ?>
    <div class="card card-cus">
      <div class="card-body">
        <form action="index.php?act=updatedm" method="post">
          <input type="hidden" name="cate_id" value="<?php if (isset($cate_id) && ($cate_id > 0)) echo $cate_id; ?>">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Danh mục <span>*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="namedm" value="<?php if (isset($cate_name) && ($cate_name != "")) echo $cate_name; ?>">
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