<?php
if (isset($_SESSION['user-name'])) {
?>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Đơn của tôi</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container ">
        <h3 class="cart-page-title">Tất cả đơn hàng</h3>
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
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
                            if(is_array($billct)){
                                foreach($billct as $bill){
                                    extract($bill);
                                    $ttdh=get_ttdh($bill['status']);
                                    $ctdh="index.php?act=ctdh&id=".$payment_id;
                                    $kh=$bill["receiver_name"].'
                                    <br>'.$bill["receiver_phone"].'
                                    <br>'.$bill["receiver_address"];
                                    
                                    if($ttdh=='Đơn hàng mới !'){
                                    $xoadh="index.php?act=xoabill&id=".$payment_id;
                                    } 
                                    else{
                                        $xoadh="";
                                    }
                                    echo'<tr>
                                    <td>Đơn hàng-'.$bill['id'].'</td>
                                    <td>'.$bill['payment_date'].'</td>
                                    <td>'.$kh.'</td>
                                    <td>'.$bill['paid_amount'].'</td>
                                    <td>'.$ttdh.'</td>
                                    <td><a class="" href="'.$ctdh.'"><input type="button" value="Xem chi tiết đơn hàng"></a></td>
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
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <p class="col-lg-4">Vui lòng khi trạng thái "Đang vận chuyển" Bạn sẽ không hủy được đơn
                                    hàng :)
                                </p>

                                <div class="cart-shiping-update">
                                    <a href="#">Cập nhật đơn hàng</a>
                                    <a href="#">Hủy đơn hàng</a>
                                </div>
                            </div>

                        </div>
                    </div> -->
                </form>

            </div>
        </div>

        <div class="cart-shiping-update-wrapper">
            <div class="cart-shiping-update-wrapper">
                <div class="cart-clear">
                    <a href="index.php?act=home">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>

    </div>

</div>
<?php
} else {
    include_once "view/acount/login.php";
    echo '<script>document.querySelector(".thongbao").innerText = "Đăng nhập để mua hàng !";</script>';
}
?>
<!-- Cart Area End -->