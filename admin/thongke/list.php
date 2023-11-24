<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Thống kê</h1>
			</div>
		</div>
	</div>
</div>


<section class="content">
	<div class="container-fluid">
		<div class="card card-cus">
			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
						</tr>
					</thead>
					<tbody>
                    <?php
               foreach($listthongke as $thongke){
                extract($thongke);
                echo '
                <tr>
                <td>'.$madm.'</td>
                <td>'.$tendm.'</td>
                <td>'.$countsp.'</td>
                <td>'.$maxprice.'</td>
                <td>'.$minprice.'</td>
                <td>'.$avgprice.'</td>
            </tr>
                ';
               };
            ?>
					</tbody>
				</table>
                <div class="float-sm-left">
					<a href="index.php?act=bieudo" class="btn btn-primary btn-md">Xem biểu đồ</a>
				</div>
			</div>
		</div>
	</div>
</section>
