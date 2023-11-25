<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Quản lý voucher</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
		<a href="index.php?act=addvoucher" class="btn btn-primary btn-sm">Thêm voucher</a>
	    </div>
      </div>
    </div>
   </div>
</div>


<section class="content">
      <div class="container-fluid">
        <div class="card card-cus">
            <div class="card-body">
            <table id="example2" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên voucher</th>
                        <th>Miêu tả</th>
                        <th>Chiết khấu phần trăm</th>
                        <th>Trạng thái</th>
                        <th>Số lượng</th>
                        <th>Có hiệu lực từ</th>
                        <th>Ngày hết hạn</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($listvoucher as $voucher){
                    extract($voucher);
                    $suavoucher="index.php?act=suavoucher&id=".$id;
                    $xoavoucher="index.php?act=xoavoucher&id=".$id;
                    echo '
                    <tr>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$description.'</td>
                    <td>'.$discount_percent.'</td>
                    <td>'.$status.'</td>
                    <td>'.$quantity.'</td>
                    <td>'.$valid_from.'</td>
                    <td>'.$valid_to.'</td>
                    <td><a href="'.$suavoucher.'"><input type="button" value="Sửa" class="btn btn-primary btn-sm"></a>  
                      <a href="'.$xoavoucher.'"><input type="button" value="Xóa" class="btn btn-danger btn-sm"></a>
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