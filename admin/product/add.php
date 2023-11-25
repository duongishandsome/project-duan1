<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Thêm sản phẩm</h1>
			</div>
			<div class="col-sm-6">
				<div class="float-sm-right">
					<a href="index.php?act=listproduct" class="btn btn-primary btn-md">Danh sách sản phẩm</a>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<?php if ($error_message) { ?>
			<div class="callout callout-danger bg-danger">

				<p>
					<?php echo $error_message; ?>
				</p>
			</div>
		<?php } ?>

		<?php if ($success_message) { ?>
			<div class="callout callout-success bg-success">

				<p><?php echo $success_message; ?></p>
			</div>
		<?php } ?>
		<div class="card card-cus">
			<div class="card-body">
				<form id="addPdForm" action="index.php?act=addproduct" method="POST" enctype="multipart/form-data">

					<div class="box box-info">
						<div class="box-body">
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Danh mục
									<span>*</span></label>
								<div class="col-sm-4">
									<select name="cate_id" class="form-control select2 top-cat">
										<?php
										foreach ($listdanhmuc as $danhmuc) {
											extract($danhmuc);
										?>
											<option value="<?php echo $cate_id;  ?>"><?php echo $cate_name;  ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Tên sản phẩm
									<span>*</span></label>
								<div class="col-sm-4">
									<input type="text" name="p_name" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Giá cũ <br><span style="font-size:12px;font-weight:normal;">(VND)</span></label>
								<div class="col-sm-4">
									<input type="text" name="p_old_price" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Giá hiện tại
									<span>*</span><br><span style="font-size:12px;font-weight:normal;">(VND)</span></label>
								<div class="col-sm-4">
									<input type="text" name="p_current_price" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Số lượng
									<span>*</span></label>
								<div class="col-sm-4">
									<input type="text" name="p_quantity" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Chọn Size</label>
								<div class="col-sm-4">
									<select name="size[]" class="form-control select2" multiple="multiple">
										<?php
										foreach ($listsize as $size) {
											extract($size);
											echo '<option value="' . $size_id . '">' . $size_name . '</option>';
										};
										?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Chọn màu</label>
								<div class="col-sm-4">
									<select name="color[]" class="form-control select2" multiple="multiple">
										<?php
										foreach ($listcolor as $color) {
											extract($color);
											echo '<option value="' . $color_id . '">' . $color_name . '</option>';
										};
										?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Ảnh đại diện
									<span>*</span></label>
								<div class="col-sm-4" style="padding-top:4px;">
									<input type="file" name="p_featured_photo">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Ảnh khác</label>
								<div class="col-sm-4" style="padding-top:4px;">
									<table id="ProductTable" style="width:100%;">
										<tbody>
											<tr>
												<td>
													<div class="upload-btn">
														<input type="file" name="photo[]" style="margin-bottom:5px;">
													</div>
												</td>
												<td style="width:28px;"><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-sm-3 ">
									<input type="button" id="btnAddNew" value="Thêm ảnh" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn  btn-warning btn-xs">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Miêu tả chi tiết</label>
								<div class="col-sm-8">
									<textarea name="p_description" class="form-control" cols="30" rows="10" id="p_description"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Miêu tả ngắn</label>
								<div class="col-sm-8">
									<textarea name="p_short_description" class="form-control" cols="30" rows="10" id="p_short_description"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 label-custom text-right pr-4">Trạng thái</label>
								<div class="col-sm-8">
									<select name="status" class="form-control" style="width:auto;">
										<option value="1">Hoạt động</option>
										<option value="0">Không hoạt động</option>
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