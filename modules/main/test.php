<?php 
    foreach($_SESSION['giohang'] as $item){
        $id_sach = $item[0];
        $sl = $item[4];
        echo "$id_sach $sl <br>";
    }

?>