<?php
    include('../../config/config.php');
    
    if(isset($_POST['edit_user'])){
        $id_user = $_GET['id_user'];
        $tinhtrang = $_POST['tinhtrang'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        $sql_sua = "update user set name='$name',email='$email',tinhtrang='$tinhtrang' where id_user = $id_user";
		mysqli_query($conn,$sql_sua);
        header('location:../../admin.php?action=khachhang');
        exit();
    }


    elseif(isset($_POST['xoa_user'])){
        $sql_xoa = "delete from user where id_user = $_POST[id_user]";
        mysqli_query($conn,$sql_xoa);
        header('location:../../admin.php?action=khachhang');
        exit();
    }
?>