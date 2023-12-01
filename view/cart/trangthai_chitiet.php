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
        <div class="col-lg-12 d-flex justify-content-between">
            <h3 class="cart-page-title">Chi tiết đơn hàng</h3>

            <div class="cart-shiping-update-wrapper">
                <div class="cart-shiping-update">
                    <a href="index.php?act=cart">Quay lại</a>
                </div>

            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><?php
                                if(is_array($ct)){
                                foreach($ct as $dh){
                                    extract($dh);
                                    $hinh="upload/".$p_featured_photo;
                                    echo'<tr>
                                    <td>'.$p_name.'</td>
                                    <td><img style="height: 120px;width: 120px;" src="'.$hinh.'" alt=""></td>
                                    <td>'.$color_name.'</td>
                                    <td>'.$size_name.'</td>
                                    <td>'.$price.'</td>
                                    </tr>';
                                }
                            }
                            ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <p class="col-lg-4">Vui lòng khi trạng thái "Đang vận chuyển" Bạn sẽ không hủy được đơn
                                    hàng :)
                                </p>

                                <div class="cart-shiping-update">
                                    <a href="#">Hủy đơn hàng</a>
                                    <!-- <a href="#">Cập nhật đơn hàng</a> -->
                                </div>
                            </div>

                        </div>
                    </div>
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
<!-- Cart Area End -->