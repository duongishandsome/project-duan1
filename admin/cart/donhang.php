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
            <thead>
              <tr>
                <th>Khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Color</th>
                <th>Size</th>
                <th>Giá</th>

              </tr>
            </thead>
          <tbody>


            <tr><?php
                if (is_array($ct)) {
                  foreach ($ct as $dh) {
                    extract($dh);
                    $hinh = "../upload/" . $p_featured_photo;
                    echo '<tr>
                      <td>' . $receiver_name . '</td>
                      <td>' . $receiver_phone . '</td> 
                      <td>' . $receiver_address . '</td>  
                      <td>' . $p_name . '</td>
                      <td><img style="height: 120px;width: 120px;" src="' . $hinh . '" alt=""></td>
                      <td>' . $color_name . '</td>
                      <td>' . $size_name . '</td>
                      <td>' . $price . '</td>
                      </tr>';
                  }
                }
                ?>
            </tr>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</section>