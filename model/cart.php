 <?php
    function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
    {
        $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values ('$iduser', '$idpro',' $img','$name','$price', '$soluong','$thanhtien','$idbill')";
        return pdo_execute($sql);
    }

    ?>