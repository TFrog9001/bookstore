<?php
    include('../../config/config.php');
    
    if(isset($_POST['edit_dm'])){
        $id_dm = $_GET['id'];
        $tinhtrang = $_POST['tinhtrang'];
        $tendanhmuc = $_POST['tendanhmuc'];

        $sql_sua = "update danhmucsach set ten_dm='$tendanhmuc',tinhtrang='$tinhtrang' where id_dm = $id_dm";
		mysqli_query($conn,$sql_sua);
        header('location:../../admin.php?action=danhmuc');
        exit();
    }

    elseif(isset($_POST['them_dm'])){
        $tinhtrang = $_POST['tinhtrang'];
        $tendanhmuc = $_POST['tendanhmuc'];

        //them
		$sql_them=("insert into danhmucsach (ten_dm,tinhtrang) value('$tendanhmuc','$tinhtrang')");
		mysqli_query($conn,$sql_them);
		header('location:../../admin.php?action=danhmuc');
        exit();
    }

    elseif(isset($_POST['xoa_dm'])){
        $sql_xoa = "delete from danhmucsach where id_dm = $_GET[id]";
        mysqli_query($conn,$sql_xoa);
        header('location:../../admin.php?action=danhmuc');
        exit();
    }
?>