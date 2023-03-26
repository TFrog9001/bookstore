<?php
    if($_SERVER['REQUEST_METHOD'] == "GET"){
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
            case 'test':
                include('modules/main/test.php');
                break;
            case 'giohang':
                include('modules/main/giohang.php');
                break;
            
            case 'chitiet':
                include('modules/main/chitiet.php');
                break;
            case 'danhmuc':
                include('modules/main/danhmucsach.php');
                break;
            case 'thanhtoan':
                include('modules/main/thanhtoan.php');
                break;
            case 'taikhoan':
                include('modules/main/taikhoan.php');
                break;
            // donhang
            case 'list_dh':
                include('modules/main/list_dh.php');
                break;
            case 'chitiet_dh':
                include('modules/main/chitietdonhang.php');
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
    }
       

    elseif($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['muangay']) && $_POST['id_sach'] !=''){
            include('./modules/main/giohang.php');
        }
        
        if((isset($_POST['xoasp']) && $_POST['id_sach'] !='')
        || (isset($_POST['plus']) && $_POST['soluong'] !='')
        || (isset($_POST['minus']) && $_POST['soluong'] !='')
        ){
            include('./modules/main/giohang.php');
        }

        if(isset($_POST['dathang'])){
            if(isset($_POST['sdt']) && isset($_POST['diachi'])){
                $id_user = $_SESSION['id_user'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $tongtien = $_POST['tongtien'];
                $httt_ma = $_POST['httt_ma'];
                $_SESSION['id_cart'] = time().'id'.$id_user;
                $id_cart = $_SESSION['id_cart'];
                $sql_dathang=("insert into cart (id_cart,id_user,sdt, diachi, thanhtoan, tongtien) value('$id_cart','$id_user','$sdt','$diachi', '$httt_ma','$tongtien')");
                mysqli_query($conn,$sql_dathang);
                
                foreach($_SESSION['giohang'] as $item){
                    $sql_cart_detail=("insert into cart_detail (id_cart, id_sach, soluong_dh, giaban) value('$id_cart','$item[0]','$item[4]','$item[3]')");
                    mysqli_query($conn,$sql_cart_detail);
                }
                unset($_SESSION['giohang']);      
            }
            include('./modules/main/donhang.php');
            
        }
        if(isset($_POST['search']) && $_POST['key'] != ''){
            include('./modules/main/search.php');
        }
    }
?>