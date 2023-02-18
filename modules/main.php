<?php
    if(isset($_GET['quanly'])){
        $tmp = $_GET['quanly'];
    }
    else {
        $tmp ='';
    }

    switch ($tmp){
        case '':
            include('modules/main/index.php');
            break;
        case 'giohang':
            include('modules/main/giohang.php');
            break;
        case 'chitiet':
            include('modules/main/chitiet.php');
            break;
        case 'thoat':
            unset($_SESSION['id_user']);
            unset($_SESSION['username']);
            echo '
            <script>
                window.location.href="./index.php"
            </script>
            ';
            break;
    }
        
?>