!-- <?php
  if(is_array($voucher)){
    extract($voucher);
  }
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Sửa voucher</h1>
      </div>
    </div>
   </div>
</div>
<section class="content">
      <div class="container-fluid">
        <div class="card card-cus">
            <div class="card-body">
            <form action="index.php?act=updatevoucher" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="form-group">
            <label for="" class="col-sm-2 control-label">Tên Voucher <span>*</span></label>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="name" value="<?php echo $name?>">
            </div>
            <label for="" class="col-sm-2 control-label">Miêu tả <span>*</span></label>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="desc" value="<?php echo $description?>">
            </div>
            <label for="" class="col-sm-2 control-label">Chiết khấu phần trăm <span>*</span></label>
            <div class="col-sm-4">
            <input type="number" class="form-control" name="discount_percent" value="<?php echo $discount_percent?>">
            </div>
            <label for="" class="col-sm-2 control-label">Số lượng <span>*</span></label>
            <div class="col-sm-4">
            <input type="number" class="form-control" name="quantity"value="<?php echo $quantity?>">
            </div>
            <label for="" class="col-sm-2 control-label">Ngày có hiệu lực <span>*</span></label>
            <div class="col-sm-4">
            <input type="date" class="form-control" name="valid_from" value="<?php echo explode(' ', $valid_from)[0];?>">
            </div>
            <label for="" class="col-sm-2 control-label">Ngày hết hạn<span>*</span></label>
            <div class="col-sm-4">
            <input type="date" class="form-control" name="valid_to" value="<?php echo explode(' ', $valid_to)[0];?>">
            </div>
            <label for="" class="col-sm-2 control-label">Status<span>*</span></label>
            <select class="form-control" name="status">
                <option <?php echo $status == "1" ? "selected" : ""  ?> value="1">Active</option>
                <option <?php echo $status == "0" ? "selected" : ""  ?> value="0">Inactive</option>
            </select>
</div>
<div class="form-group">
    <div class="col-sm-6">
    <input class="btn btn-success pull-left" type="submit" name="capnhat" value="Cập nhật">
    <a href="index.php?act=listvoucher"><input  class="btn btn-success pull-left" type="button" value="DANH SÁCH"></a>
    </div>
</div>

            </div> 
            <p style="margin-left:20px; color:red;"><?php
              if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
              }
            ?></p>
            </form>

            </div> 
        </div>
      </div>
</section>