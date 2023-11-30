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
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            

                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img class="img-responsive ml-15px"
                                                src="assets/images/product-image/3.jpg" alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">Product Name</a></td>
                                    <td class="product-price-cart"><span class="amount">$70.00</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal">$90.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    </td>
                                    <td class="d-flex justify-content-around">
                                        <div class="Place-order mt-25">
                                            <p class="btn-hover my-3 text-danger">Chờ xác nhận</p>
                                        </div>
                                        <a href="?act=trangthai_chitiet" class="btn btn-secondary"
                                            style="width:100px;height:50px;">Chi
                                            tiết đơn</a>
                                    </td>
                                    <td>
                                        <p class="fw-bold">Thành tiền: 10tr</p>
                                    </td>
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
                                    <a href="#">Cập nhật đơn hàng</a>
                                    <a href="#">Hủy đơn hàng</a>
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
<?php
} else {
    include_once "view/acount/login.php";
    echo '<script>document.querySelector(".thongbao").innerText = "Đăng nhập để mua hàng !";</script>';
}
?>
<!-- Cart Area End -->