    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box  align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                            <h2 class="breadcrumb-title">Tài khoản của tôi</h2>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-md-end">
                                <li class="breadcrumb-item"><a href="index.html">TRang chủ</a></li>
                                <li class="breadcrumb-item active">Tài khoản</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- breadcrumb-area end -->
    <!-- account area start -->
    <div class="checkout-area pt-100px pb-100px">
        <?php
        if (isset($thongbao)) {
            echo '<div class="alert alert-primary" role="alert">' . $thongbao . '</div>';
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse"
                                            class="collapsed" aria-expanded="true" href="#my-account-1">Chỉnh sửa thông
                                            tin tài khoản</a>
                                    </h3>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <div class="account-info-wrapper d-flex justify-content-between">
                                                <div class="text">
                                                    <h4>THÔNG TIN TÀI KHOẢN CỦA TÔI </h4>
                                                    <h5>Thông tin cá nhân của bạn </h5>
                                                </div>
                                            </div>

                                            <?php
                                            $hinh = ""; // Khởi tạo biến $hinh
                                            if (isset($_SESSION['user-name']) && (is_array($_SESSION['user-name']))) {
                                                extract($_SESSION['user-name']);

                                                $hinhpath = "upload/" . $img;
                                                if (is_file($hinhpath)) {
                                                    $hinh = "<img src='" . $hinhpath . "' style='height: 100px;width: 100px; border-radius: 50%;'>";
                                                } else {
                                                    $hinh = "No photo";
                                                }
                                            }
                                            ?>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="row">

                                                    <input type="hidden" name="id" value="<?= $user_id   ?>">

                                                    <input type="hidden" name="user-password" placeholder="Mật khẩu"
                                                        value="<?= $user_password ?>" />

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Tên tài khoản</label>
                                                            <input type="text" name="user-name"
                                                                placeholder="Tên tài khoản" value="<?= $user_name ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div>
                                                            <label>Avata</label>
                                                            <div class="d-flex">
                                                                <input style="width:50%;" type="file" name="hinh" id="">

                                                                <?php
                                                                if (isset($_SESSION['user-name'])) {
                                                                    extract($_SESSION['user-name']);
                                                                    if (!empty($img)) {
                                                                        $hinhpath = "upload/" . $img;
                                                                        if (is_file($hinhpath)) {
                                                                            $hinh = "<img src='" . $hinhpath . "' style='height: 100px; width: 100px; border-radius: 50%;'>";
                                                                        } else {
                                                                            $hinh = "No photo";
                                                                        }
                                                                    } else {
                                                                        $hinh = "<img src='assets/images/avata/avata_null.jpg' alt='' ' style='height: 100px; width: 100px; border-radius: 50%;'>";
                                                                    }
                                                                ?>
                                                                <?php echo $hinh ?>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Địa chỉ</label>
                                                            <input type="text" name="user-adress" placeholder="Địa chỉ"
                                                                value="<?= $user_address     ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Số điện thoại</label>
                                                            <input type="text" name="user-phone"
                                                                placeholder="Số điện thoại"
                                                                value="<?= $user_phone     ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Email</label>
                                                            <input name="user-email" placeholder="Địa chỉ email"
                                                                type="email" value="<?= $user_email     ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="gioitinh">
                                                            <label for="gioi_tinh">Giới tính</label>
                                                            <select class="form-select" name="gender" id="gioi_tinh">
                                                                <option value="Male"
                                                                    <?php if ($user_gender == 'Male') echo 'selected'; ?>>
                                                                    Nam
                                                                </option>
                                                                <option value="Female"
                                                                    <?php if ($user_gender == 'Female') echo 'selected'; ?>>
                                                                    Nữ</option>
                                                                <option value="Other"
                                                                    <?php if ($user_gender == 'Other') echo 'selected'; ?>>
                                                                    Khác</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Ngày sinh</label>
                                                            <input type="date" name="birth" id=""
                                                                value="<?= $user_birth ?>">
                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                    </div>
                                                    <div class="dangky col-lg-3 my-3">
                                                        <input type="submit" value="Cập nhật" name="update_user">
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="400">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>2 .</span> <a data-bs-toggle="collapse"
                                            class="collapsed" aria-expanded="false" href="#my-account-2">Thay đổi
                                            mật
                                            khẩu
                                            của bạn
                                        </a></h3>
                                </div>
                                <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <h4>Đổi mật khẩu</h4>
                                            <form method="post">


                                                <input type="hidden" name="id" value="<?= $user_id ?>">

                                                <input type="hidden" name="user-name" value="<?= $user_name ?>">

                                                <input type="hidden" name="user-password" value="<?= $user_password ?>">


                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Mật khẩu mới</label>
                                                            <input type="password" name="password-new" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Xác nhận mật khẩu</label>
                                                            <input type="password" name="password-new-confirm" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                    </div>
                                                    <div class="dangky col-lg-3 my-3">
                                                        <input type="submit" value="Cập nhật" name="update_pass">
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default single-my-account m-0" data-aos="fade-up"
                                data-aos-delay="800">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>3 .</span> <a href="index.php?act=trangthaidon">Đơn
                                            hàng của
                                            bạn</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account area end -->