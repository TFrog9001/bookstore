<?php 
    if(isset($_GET['action'])){
        $tmp = $_GET['action'];
    }
    else {
        $tmp ='';
    }

    switch($tmp){
        case '':
            include("./modules/quanlydanhmuc/lietke.php");
            break;
        case 'danhmuc':
            include("./modules/quanlydanhmuc/lietke.php");
            break;
        case 'edit_dm':
            include("./modules/quanlydanhmuc/sua.php");
            break;
        case 'them_dm':
            include("./modules/quanlydanhmuc/them.php");
            break;
    }

    switch($tmp){
        case 'sanpham':
            include("./modules/quanlysanpham/search.php");
            break;
        case 'them_sp':
            include("./modules/quanlysanpham/them.php");
            break;
        case 'edit_sp':
            include("./modules/quanlysanpham/sua.php");
            break;
    }

    switch($tmp){
        case 'khachhang':
            include("./modules/quanlyuser/lietke.php");
            break;
        case 'edit_user':
            include("./modules/quanlyuser/sua.php");
            break;
    }

    switch($tmp){
        case 'donhang':
            include("./modules/quanlydonhang/lietke.php");
            break;
        case 'list-dh':
            include("./modules/quanlydonhang/lietke.php");
            break;
        case 'chitiet_dh':
            include("./modules/quanlydonhang/chitiet.php");
            break;
    }

    switch($tmp){
        case 'thoat':
            unset($_SESSION['adminname']);
            echo '
                <script>
                    window.location.href="./admin.php"
                </script>
                ';
            break;
    }

    switch ($tmp){
        case 'ship':
            include("./modules/shipping/lietke.php");
            break;
        case 'chitiet_ship':
            include("./modules/shipping/chitiet.php");
            break;
    }
?>