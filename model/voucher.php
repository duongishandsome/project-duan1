<?php
function loadall_voucher(){
    $sql="select * from discount order by id asc";
    $listvoucher=pdo_query($sql);
    return  $listvoucher;
}
function loadone_voucher($id){
    $sql="select * from discount where id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function insert_voucher($name,$description,$discount_percent,$status,$quantity,$valid_from,$valid_to){
    $sql="INSERT INTO `discount`( `name`, `description`, `discount_percent`,`status`,`quantity`,`valid_from`,`valid_to`) VALUES ('$name','$description','$discount_percent',$status,'$quantity','$valid_from','$valid_to');";
    pdo_execute($sql);  
 }
function delete_voucher($id){
    $sql="delete from discount where id=".$id;
    pdo_execute($sql);
}
function update_voucher($id,$name,$description,$discount_percent,$status,$quantity,$created_at,$expiration_date){
    $sql="update discount set name ='".$name."', description='".$description."',discount_percent='".$discount_percent."',
    status='".$status."',quantity='".$quantity."',created_at='".$created_at."',expiration_date='".$expiration_date."' where id=".$id;
   pdo_execute($sql);
}
?>