<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản lý tài khoản</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="index.php?act=adduser" class="btn btn-primary btn-md">Thêm tài khoản</a>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="card card-cus">
            <div class="card-body">
                <h3>Tài khoản khách hàng</h3>
                <table  class="example2 table table-bordered ">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>email</th>
                            <th>SĐT</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($list_user as $row) {
                            $i++;
                            $update_user = "index.php?act=suauser&user_id=" . $row['user_id'];
                            $delete_user = "index.php?act=deleteuser&user_id=" . $row['user_id'];
                            $update_status = "index.php?act=updatestatususer&user_id=" . $row['user_id'];
                        ?>
                            <tr class="<?php echo $row['user_status'] == 1 ? 'br-g' : 'br-r' ?>">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_phone']; ?></td>
                                <td>
                                    <?php if ($row['user_status'] == 1) {
                                        echo "<a href='$update_status'><span class='badge badge-success p-2 status' style='font-size:14px'> Hoạt động</span></a>";
                                    } else {
                                        echo "<a href='$update_status'><span class='badge badge-danger p-2 status' style='font-size:14px'>Không hoạt động</span></a>";
                                    } ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm" data-href="<?php echo $delete_user; ?>" data-toggle="modal" data-target="#confirm-delete">Xóa</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card card-cus">
            <div class="card-body">
                <h3>Tài khoản Admin</h3>
                <table  class="example2 table table-borderedr">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>email</th>
                            <th>SĐT</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($list_admin as $row) {
                            $i++;
                            $update_user = "index.php?act=suauser&user_id=" . $row['user_id'];
                            $delete_user = "index.php?act=deleteuser&user_id=" . $row['user_id'];
                            $update_status = "index.php?act=updatestatususer&user_id=" . $row['user_id'];
                        ?>
                            <tr class="<?php echo $row['user_status'] == 1 ? 'br-g' : 'br-r' ?>">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_phone']; ?></td>
                                <td>
                                <?php if ($row['user_status'] == 1) {
                                        echo "<a href='$update_status'><span class='badge badge-success p-2 status' style='font-size:14px'> Hoạt động</span></a>";
                                    } else {
                                        echo "<a href='$update_status'><span class='badge badge-danger p-2 status' style='font-size:14px'>Không hoạt động</span></a> ";
                                    } ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm" data-href="<?php echo $delete_user; ?>" data-toggle="modal" data-target="#confirm-delete">Xóa</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Xác nhận xóa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc muốn xóa danh mục này không?</p>
                <p style="color:red;">Hãy cẩn thận! Các dữ liệu liên quan như sản phảm, ảnh,... liên quan cũng có thể bị xóa.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <a class="btn btn-danger btn-ok">Xóa</a>
            </div>
        </div>
    </div>
</div>