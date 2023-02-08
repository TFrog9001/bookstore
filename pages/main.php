<?php
    if(isset($_GET['quanly'])){
        $tmp = $_GET['quanly'];
    }
    else {
        $tmp ='';
    }
    if($tmp=='trangchu'){
        include('pages/main/index.php');
    }
    elseif($tmp=='giohang'){
        include('pages/main/giohang.php');
    }          
?>