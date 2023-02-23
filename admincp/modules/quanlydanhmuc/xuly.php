<?php
    include('../../config/config.php');
    if(isset($_GET['action']) && $_GET['action'] !=''){
        $tmp = $_GET['action'];
        $id_dm = $_GET['id'];
    }

    if($tmp='xoa_dm'){
        $sql_xoa = "delete from danhmucsach where id_dm = $id_dm";
		mysqli_query($conn,$sql_xoa);
        echo "heloo";
		header('location:../../admin.php?action=danhmuc');
        exit();
    }
?>