<?php
function loadall_thongke()
{
    $sql = "select category.cate_id as madm, category.cate_name as tendm, count(product.p_id) as countsp, min(product.p_current_price) as minprice, max(product.p_current_price) as maxprice, avg(product.p_current_price) as avgprice";
    $sql .= " from product left join category on category.cate_id=product.cate_id";
    $sql .= " group by category.cate_id order by category.cate_id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>
<?php
