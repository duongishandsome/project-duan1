<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cập nhật sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="index.php?act=listproduct" class="btn btn-primary btn-md">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (is_array($product)) {
    foreach ($product as $row) {
        $p_id = $row['p_id'];
        $p_name = $row['p_name'];
        $p_old_price = $row['p_old_price'];
        $p_current_price = $row['p_current_price'];
        $p_quantity = $row['p_quantity'];
        $p_featured_photo = $row['p_featured_photo'];
        $p_description = $row['p_description'];
        $p_short_description = $row['p_short_description'];
        $p_is_featured = $row['p_featured'];
        $p_is_active = $row['p_status'];
        $category_id = $row['cate_id'];
    }
}
?>
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
                <form action="index.php?act=updateproduct" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="p_id" value="<?php if (isset($p_id) && ($p_id > 0)) echo $p_id; ?>">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Danh mục <span>*</span></label>
                                <div class="col-sm-4">
                                    <select name="cate_id" class="form-control select2 top-cat">
                                        <?php
                                        foreach ($listdanhmuc as $danhmuc) {
                                            extract($danhmuc);
                                        ?>
                                            <option <?php echo $cate_id == $category_id ? "selected" : "";  ?> value="<?php echo $cate_id;  ?>"><?php echo $cate_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Tên sản phẩm <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="p_name" value="<?php echo $p_name; ?>" class=" form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Giá cũ <br><span style="font-size:12px;font-weight:normal;">(VND)</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="p_old_price" value="<?php echo $p_old_price; ?>" class=" form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Giá hiện tại <span>*</span><br><span style="font-size:12px;font-weight:normal;">(VND)</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="p_current_price" value="<?php echo $p_current_price; ?>" class=" form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Số lượng <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="p_quantity" value="<?php echo $p_quantity; ?>" class=" form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Chọn Size</label>
                                <div class="col-sm-4">
                                    <select name="size[]" class="form-control select2" multiple="multiple">
                                        <?php
                                        $is_select = '';
                                        foreach ($listsize as $size) {
                                            extract($size);
                                            if (isset($list_size)) {
                                                if (in_array($size_id, $list_size)) {
                                                    $is_select = 'selected';
                                                } else {
                                                    $is_select = '';
                                                }
                                            }
                                        ?>
                                            <option value="<?php echo $size_id; ?>" <?php echo $is_select; ?>><?php echo $size_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Chọn màu</label>
                                <div class="col-sm-4">
                                    <select name="color[]" class="form-control select2" multiple="multiple">
                                        <?php
                                        $is_select = '';
                                        foreach ($listcolor as $color) {
                                            extract($color);
                                            if (isset($list_color)) {
                                                if (in_array($color_id, $list_color)) {
                                                    $is_select = 'selected';
                                                } else {
                                                    $is_select = '';
                                                }
                                            }
                                        ?>
                                            <option value="<?php echo $color_id; ?>" <?php echo $is_select; ?>><?php echo $color_name; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Ảnh đại diện cũ</label>
                                <div class="col-sm-4" style="padding-top:4px;">
                                    <img src="../upload/<?php echo $p_featured_photo; ?>" alt="" style="width:150px;">
                                    <input type="hidden" name="current_photo" value="<?php echo $p_featured_photo; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Ảnh đại diện <span>*</span></label>
                                <div class="col-sm-4" style="padding-top:4px;">
                                    <input type="file" name="p_featured_photo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Ảnh khác</label>
                                <div class="col-sm-4" style="padding-top:4px;">
                                    <table id="ProductTable" style="width:100%;">
                                        <tbody>
                                            <?php
                                            foreach ($list_img as $row) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <img src="../upload/product_photos/<?php echo $row['img_name']; ?>" alt="" style="width:150px;margin-bottom:5px;">
                                                    </td>
                                                    <td style="width:28px;">
                                                        <a onclick="return confirm(' Bạn có chắc muốn xóa dữ liệu này không?');" href="index.php?act=delete-other-photo&img_id=<?php echo $row['img_id']; ?>&p_id=<?php echo $p_id; ?>" class="btn btn-danger btn-xs">X</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
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
                                    <textarea name="p_description" class="form-control" cols="30" rows="10" id="p_description"><?php echo $p_description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Miêu tả ngắn</label>
                                <div class="col-sm-8">
                                    <textarea name="p_short_description" class="form-control" cols="30" rows="10" id="p_short_description"><?php echo $p_short_description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Nổi bật?</label>
                                <div class="col-sm-8">
                                    <select name="p_is_featured" class="form-control" style="width:auto;">
                                        <option value="1" <?php echo $p_is_featured == '1' ? "selected" : ""; ?>>Yes</option>
                                        <option value="0" <?php echo $p_is_featured == '0' ? "selected" : ""; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4">Kích hoạt?</label>
                                <div class="col-sm-8">
                                    <select name="status" class="form-control" style="width:auto;">
                                        <option value="1" <?php echo $p_is_active == '1' ? "selected" : ""; ?>>Yes</option>
                                        <option value="0" <?php echo $p_is_active == '0' ? "selected" : ""; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 label-custom text-right pr-4"></label>
                                <div class="col-sm-6">
                                    <input class="btn btn-success pull-left" type="submit" name="capnhat" value="Cập nhật">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>