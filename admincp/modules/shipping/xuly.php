<?php 
    include('../../config/config.php');
    if(isset($_POST['ship_dh'])){
        $sql_xn = "update cart set tinhtrang_cart = '2' where id_cart = '$_POST[id_cart]'";
		mysqli_query($conn,$sql_xn);
        header('location:../../admin.php?action=ship');
        exit();
    }

    if(isset($_POST['hoanthanh_dh'])){
        $sql_xn = "update cart set tinhtrang_cart = '3' where id_cart = '$_POST[id_cart]'";
		mysqli_query($conn,$sql_xn);
        header('location:../../admin.php?action=ship');
        exit();
    }
?>