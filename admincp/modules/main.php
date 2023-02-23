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
        case 'themdanhmuc':
            include("./modules/quanlydanhmuc/them.php");
            break;
    }
?>