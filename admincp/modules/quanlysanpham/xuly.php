<?php 
    include("../../config/config.php");

    if(isset($_POST['them_sp']) || isset($_POST['edit_sp'])){
        $ten_sp = $_POST['tensach'];
        $danhmuc = $_POST['danhmuc'];
        $gia = $_POST['gia'];
        $giagiam = $_POST['giagiam'];
        $soluong = $_POST['soluong'];
        $tinhtrang = $_POST['tinhtrang'];
        $mota = $_POST['mota'];

        $hinhanh=$_FILES['hinhanh']['name'];
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];

        move_uploaded_file($hinhanh_tmp,'./upload/'.$hinhanh);

    }

    if(isset($_POST['them_sp'])){
        $hinhanh = rand(1,1000000).time().$hinhanh;
        $sql_them=("insert into sach (ten_sach, id_dm, gia, giagiam, soluong, hinhanh, tinhtrang, mota) 
                                value('$ten_sp','$danhmuc','$gia','$giagiam','$soluong','$hinhanh','$tinhtrang','$mota')");
		mysqli_query($conn,$sql_them);
		header('location:../../admin.php?action=sanpham');
        exit();
    }
    elseif(isset($_POST['edit_sp'])){
        $id_sach = $_GET['id'];
        if($hinhanh != ''){
            $hinhanh = rand(1,1000000).time().$hinhanh;
            $sql_sua = "update sach set ten_sach='$ten_sp', id_dm = '$danhmuc', gia = '$gia', giagiam = '$giagiam',
                                    soluong = '$soluong', hinhanh = '$hinhanh',tinhtrang='$tinhtrang', mota = '$mota'
                                    where id_sach = $id_sach";
        }
        else {
            $sql_sua = "update sach set ten_sach='$ten_sp', id_dm = '$danhmuc', gia = '$gia', giagiam = '$giagiam',
                                    soluong = '$soluong', tinhtrang='$tinhtrang', mota = '$mota'
                                    where id_sach = $id_sach";
        }
		mysqli_query($conn,$sql_sua);
		header('location:../../admin.php?action=sanpham');
        exit();
    }
    elseif(isset($_POST['xoa_sp'])){
        $id_sach = $_POST['id_sach'];
        $sql_xoa = "delete from sach where id_sach = $id_sach";
        mysqli_query($conn,$sql_xoa);
        header('location:../../admin.php?action=sanpham');
        exit();
    }    
?>