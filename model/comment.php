<?php
function loadall_comment(){
    $sql="select * from comment order by cmt_id asc";
    $listcomment=pdo_query($sql);
    return  $listcomment;
}
function delete_comment($id){
    $sql="delete from comment where cmt_id=".$id;
    pdo_execute($sql);
}
