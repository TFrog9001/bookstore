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
        case 'chitiet':
            include('pages/main/chitiet.php');
            break;
        case 'thoat':
            unset($_SESSION['username']);
            echo '
            <script>
                window.location.href="./index.php"
            </script>
            ';
            break;
    }
        
?>