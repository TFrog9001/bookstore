<?php 
    include('../../config/config.php');
    if(isset($_POST['xoa_dh']) || isset($_POST['huy_dh'])){
        $sql_xoa = "delete from cart where id_cart = '$_POST[id_cart]'";
        mysqli_query($conn,$sql_xoa);
        header('location:../../admin.php?action=donhang');
        exit();
    }
    if(isset($_POST['xacnhan_dh'])){
        $sql_xn = "update cart set tinhtrang_cart = '1' where id_cart = '$_POST[id_cart]'";
		mysqli_query($conn,$sql_xn);
        header('location:../../admin.php?action=donhang');
        exit();
    }
?>