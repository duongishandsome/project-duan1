<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Quản lý đơn hàng</h1>
      </div>
    </div>
   </div>
</div>


<section class="content">
      <div class="container-fluid">
        <div class="card card-cus">
            <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
            <thead>
                             
                             <tr>
                             <th>Mã Đơn Hàng</th>
                             <th>Ngày đặt</th>
                             <th>Khách hàng</th>
                             <th>Tổng tiền</th>
                             <th>Trạng Thái</th>
                             <th>Action</th>
                             </tr>
                           
                         </thead>
                         <tbody>
                         

                             <tr>
                             <?php
                         if(is_array($listbill)){
                             foreach($listbill as $bill){
                                 extract($bill);
                                 $ttdh=get_ttdh($bill['status']);
                                 $csdh="index.php?act=suadh&id=".$id;
                                 $ctdh="index.php?act=ctdh&id=".$id;
                                 $kh=$bill["receiver_name"].'
                                 <br>'.$bill["receiver_phone"].'
                                 <br>'.$bill["receiver_address"];
                                 $ctdh="index.php?act=ctdh&id=".$id;
                                 echo'<tr>
                                 <td>Đơn hàng-'.$bill['id'].'</td>
                                 <td>'.$bill['payment_date'].'</td>
                                 <td>'.$kh.'</td>
                                 <td>'.$bill['paid_amount'].'</td>
                                 <td>'.$ttdh.'</td>
                                 <td><a class="btn btn-primary btn-sm" href="'.$ctdh.'">Chi tiết</a></td>
                                 <td><a class="btn btn-primary btn-sm" href="'.$csdh.'">Cập nhật</a></td>
                                 </tr>';
                             }
                         }
                         ?>
                             </tr>
                             <tr>
                                 
                                 
                             </tr>
                         </tbody>
                
            </table>
            </div> 
        </div>
      </div>
</section>