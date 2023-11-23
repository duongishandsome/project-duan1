    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box  align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                            <h2 class="breadcrumb-title">Giỏ hàng</h2>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-md-end">
                                <li class="breadcrumb-item"><a href="index.php">trang chủ</a></li>
                                <li class="breadcrumb-item active">Thanh toán</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Chi tiết thanh toán </h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Tên</label>
                                    <input type="text" name="" id="">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Địa chỉ</label>
                                    <input class="billing-address" placeholder="Số nhà và tên đường" type="text" />
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Phone</label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Email</label>
                                    <input type="text" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <h5>Loại vận chuyển</h5>
                                <div class="form-check">
                                    <input class="form-check-input p-0" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Standard <span>$20.00</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input p-0  " type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Express <span>$30.00
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <h5 class="boxtitle">PHƯƠNG THỨC THANH TOÁN</h5>
                                <div class="form-check">
                                    <input class="form-check-input p-0 btn-rounded" type="radio" name="pttt"
                                        id="payment1" checked>
                                    <label class="form-check-label" for="payment1">Trả tiền khi nhận hàng</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input p-0 btn-rounded" type="radio" name="pttt"
                                        id="payment3">
                                    <label class="form-check-label" for="payment3">Thanh toán online</label>
                                </div>
                            </div>

                        </div>

                        <div class="checkout-account-toggle open-toggle2 mb-30">
                            <input placeholder="Email address" type="email" />
                            <input placeholder="Password" type="password" />
                            <button class="btn-hover checkout-btn" type="submit">register</button>
                        </div>
                        <div class="additional-info-wrap">
                            <h4>Thông tin thêm</h4>
                            <div class="additional-info">
                                <label>Ghi chú đặt hàng</label>
                                <textarea
                                    placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."
                                    name="message"></textarea>
                            </div>
                        </div>
                        <div class="checkout-account mt-25">
                            <input class="checkout-toggle w-auto h-auto" type="checkbox" />
                            <label>Gửi đến một địa chỉ khác?</label>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản phẩm</li>
                                        <li>Tổng cộng</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        <li><span class="order-middle-left">Product Name X 1</span> <span
                                                class="order-price">$329 </span></li>
                                        <li><span class="order-middle-left">Product Name X 1</span> <span
                                                class="order-price">$329 </span></li>
                                    </ul>
                                </div>
                                <div class="your-order-bottom">

                                    <ul>
                                        <li class="your-order-shipping">Phí ship</li>
                                        <li>Free shipping</li>
                                    </ul>
                                </div>
                                <div style="border-top: 1px solid #dee0e4; margin-top:30px;">
                                    <div class="discount-code py-2">
                                        <p class="fw-bold mb-2">Nhập mã phiếu giảm giá của bạn nếu bạn có.</p>
                                        <form class="d-flex align-items-center">
                                            <input type="text" class="form-control me-2" required name="name"
                                                placeholder="Nhập mã phiếu giảm giá">
                                            <button class="btn btn-primary" type="submit">Áp dụng</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="your-order-total">
                                    <div class="sub-total">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-start">Tổng phụ :</td>
                                                    <td class="text-end">$523.30</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start">Phí ship :</td>
                                                    <td class="text-end">$4.52</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start">Mã giảm giá :</td>
                                                    <td class="text-end">$104.66</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <ul>
                                        <li class="order-total">Tổng cộng</li>
                                        <li>$329</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="Place-order mt-25">
                            <a class="btn-hover" href="index.php?act=bill">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 d-flex justify-content-lg-end">
                <div class="cart-shiping-update-wrapper">
                    <div class="cart-shiping-update">
                        <a href="index.php?act=cart">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->