<?php
function loadall_color()
{
    $sql = "select * from color order by color_id asc";
    $listcolor = pdo_query($sql);
    return  $listcolor;
}
function loadone_color($id)
{
    $sql = "select * from color where color_id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function insert_color($tenmau)
{
    $sql = "insert into color(color_name) values('$tenmau')";
    pdo_execute($sql);
}
function delete_color($id)
{
    $sql1 = "DELETE FROM product_color WHERE color_id=" . $id;
    pdo_execute($sql1);
    $sql = "delete from color where color_id=" . $id;
    pdo_execute($sql);
}
function update_color($id, $tencolor)
{
    $sql = "update color set color_name='" . $tencolor . "' where color_id=" . $id;
    pdo_execute($sql);
}

function check_exist_color($color_name) {
    $sql = "SELECT * FROM color WHERE color_name= '$color_name'";
    $total_row = pdo_query_row_count($sql);
    return  $total_row;
}

?>