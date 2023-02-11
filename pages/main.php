<?php
    if(isset($_GET['quanly'])){
        $tmp = $_GET['quanly'];
    }
    else {
        $tmp ='';
    }

    switch ($tmp){
        case '':
            include('pages/main/index.php');
            break;
        case 'giohang':
            include('pages/main/giohang.php');
            break;
    }
        
?>