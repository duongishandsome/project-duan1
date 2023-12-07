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
                <table class="example2 table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Ngày đặt</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng Thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($listbill)) {
                            foreach ($listbill as $bill) {
                                extract($bill);
                                $ttdh = get_ttdh($bill['status']);
                                $csdh = "index.php?act=suadh&id=" . $payment_id;
                                $ctdh = "index.php?act=trangthai_chitiet&id=" . $payment_id;
                                $kh = $bill["receiver_name"] . '
                                 <br>' . $bill["receiver_phone"] . '
                                 <br>' . $bill["receiver_address"];
                                $xoadh = "index.php?act=xoabill&id=" . $payment_id;
                                $ctdh = "index.php?act=ctdh&id=" . $payment_id;
                                $huydon = "index.php?act=huydon&payment_id=" . $payment_id;

                                echo '<tr>
                                    <td>' . $bill['payment_id'] . '</td>
                                    <td>' . $bill['payment_date'] . '</td>
                                    <td>' . $kh . '</td>
                                    <td>' . number_format($bill['paid_amount'], 0, ',', '.')  . '</td>
                                    <td>' . $ttdh . '</td>
                                    <td>
                                        <a style="margin: 0 3px" class="btn px-2 btn-primary btn-sm" href="' . $ctdh . '">Chi tiết</a>';
                                // Hủy thì không hiển thị nút cập nhật
                                if ($bill['status'] != -1) {
                                    echo '<a style="margin: 0 3px" class="btn btn-secondary btn-sm" href="' . $csdh . '">Cập nhật</a>';
                                }
                                // Hoàn thành thì không hiển thị nút Xóa
                                if ($bill['status'] != 4) {
                                    echo '<a style="margin: 0 3px" class="btn btn-danger btn-sm" href="#" data-href="' . $xoadh . '" data-toggle="modal" data-target="#confirm-delete">Xóa</a>';
                                }
                                //Hủy và Hoàn thành thì không hiển thị nút Hủy
                                if ($bill['status'] != 4 && $bill['status'] != -1) {
                                    echo '<a style="margin: 0 3px" class="btn btn-warning btn-sm" href="#" data-href="' . $huydon . '" data-toggle="modal" data-target="#confirm-delete">Hủy</a>';
                                }

                                echo '</td>
                            </tr>';
                            }
                        }
                        ?>

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
                <h4 class="modal-title" id="myModalLabel">Xác nhận</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc muốn tiếp tục hành động này không?</p>
                <p style="color:red;">Hãy cẩn thận!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <a class="btn btn-danger btn-ok">Xóa</a>
            </div>
        </div>
    </div>
</div>