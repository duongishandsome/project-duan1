<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm tài khoản</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="index.php?act=listuser" class="btn btn-primary btn-md">Danh sách tài khoản</a>
                </div>
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
                <form id="addUserForm" action="index.php?act=adduser" method="POST" enctype="multipart/form-data">

                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Tên người dùng
                                    <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="user_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Email
                                    <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="user_email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Số điện thoại
                                    <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="user_phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Mật khẩu
                                    <span>*</span></label>
                                <div class="col-sm-4">
                                    <input id="user_password" type="password" name="user_password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Nhập lại mật khẩu
                                    <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Trạng thái <span>*</span></label>
                                <div class="col-sm-8">
                                    <select name="status" class="form-control" style="width:auto;">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Không hoạt động</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Role
                                    <span>*</span></label>
                                <div class="col-sm-4">
                                    <select name="role_id" class="form-control select2 top-cat">
                                        <?php
                                        foreach ($list_role as $item) {
                                            extract($item);
                                        ?>
                                            <option value="<?php echo $role_id;  ?>"><?php echo $role_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4"></label>
                                <div class="col-sm-6">
                                    <input class="btn btn-success pull-left" type="submit" name="themmoi" value="THÊM MỚI">
                                </div>
                            </div>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>