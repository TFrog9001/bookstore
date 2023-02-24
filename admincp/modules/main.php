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
            include("./modules/quanlysanpham/them.php");
            break;
    }
?>