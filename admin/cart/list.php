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


                        <tr>
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

                  if ($ttdh == 'Đơn hàng mới !') {
                    $xoadh = "index.php?act=xoabill&id=" . $payment_id;
                  } else {
                    $xoadh = "";
                  }
                  $ctdh = "index.php?act=ctdh&id=" . $payment_id;
                  echo '<tr>
                                 <td>Đơn hàng-' . $bill['id'] . '</td>
                                 <td>' . $bill['payment_date'] . '</td>
                                 <td>' . $kh . '</td>
                                 <td>' . $bill['paid_amount'] . '</td>
                                 <td>' . $ttdh . '</td>
                                 <td><a class="btn btn-primary btn-sm" href="' . $ctdh . '">Chi tiết</a>
                                 <a class="btn btn-primary btn-sm" href="' . $csdh . '">Cập nhật</a></td>
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