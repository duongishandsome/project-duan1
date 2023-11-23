<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Thêm voucher</h1>
      </div>
    </div>
   </div>
</div>
<section class="content">
      <div class="container-fluid">
      <?php if ($success_message) { ?>
      <div class="callout callout-success bg-success">

        <p><?php echo $success_message; ?></p>
      </div>
    <?php } ?>
        <div class="card card-cus">
            <div class="card-body">
            <form action="index.php?act=addvoucher" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <div class="form-group">
            <label for="" class="col-sm-2 control-label">Tên Voucher <span>*</span></label>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="name" placeholder="Nhập tên voucher ">
            </div>
            <label for="" class="col-sm-2 control-label">Miêu tả <span>*</span></label>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="desc" placeholder="Miêu tả ">
            </div>
            <label for="" class="col-sm-2 control-label">Chiết khấu phần trăm <span>*</span></label>
            <div class="col-sm-4">
            <input type="number" class="form-control" name="discount_percent" placeholder="Chiết khẩu phần trăm ">
            </div>
            <label for="" class="col-sm-2 control-label">Số lượng <span>*</span></label>
            <div class="col-sm-4">
            <input type="number" class="form-control" name="quantity" placeholder="Số lượng">
            </div>
            <label for="" class="col-sm-2 control-label">Ngày có hiệu lực <span>*</span></label>
            <div class="col-sm-4">
            <input type="date" class="form-control" name="valid_from" placeholder="Ngày tạo ">
            </div>
            <label for="" class="col-sm-2 control-label">Ngày hết hạn<span>*</span></label>
            <div class="col-sm-4">
            <input type="date" class="form-control" name="valid_to" placeholder="Ngày hết hạn">
            </div>
            <label for="" class="col-sm-2 control-label">trang thái<span>*</span></label>
            <div class="col-sm-4">
            <select class="form-control"  name="status">
                <option value="1">Hoạt động</option>
                <option value="0">Không hoạt động</option>
            </select>
            </div>
            
</div>
<div class="form-group">
    <div class="col-sm-6">
    <input class="btn btn-success pull-left" type="submit" name="themmoi" value="THÊM MỚI">
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