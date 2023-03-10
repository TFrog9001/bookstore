<?php 
    if(isset($_POST['muangay'])){
        $id_sach = $_POST['id_sach'];
        $sql_sp = mysqli_query($conn,"select * from sach where id_sach = $id_sach limit 1;");
        $row =  mysqli_fetch_array($sql_sp);

        if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

        $flag = 0;

        if(isset($_POST['soluong']) && $_POST['soluong'] > 0){
            $sl = $_POST['soluong'];
        }
        else{
            $sl = 1;
        }
        
        if(isset($_SESSION['giohang'])){
            if(isset($_SESSION['giohang'][$id_sach])){
                $slnew = $_SESSION['giohang'][$id_sach][4] + $sl;
                $_SESSION['giohang'][$id_sach][4] = $slnew;
                $flag = 1;
            }
        }

        $gia = $row['gia'];
        if($row['giagiam'] != 0){
            $gia = $row['giagiam'];
        } 

        if(!$flag){
            $_SESSION['giohang'][$row['id_sach']] = array($row['id_sach'],$row['ten_sach'],$row['hinhanh'], $gia, $sl);
        }  
        echo '
        <script>
            window.location.href="./index.php?quanly=giohang"
        </script>
        ';      
    }

    if(isset($_POST['xoasp'])){
        $id_sach = $_POST['id_sach'];
        if(isset($_SESSION['giohang'])){
            unset($_SESSION['giohang'][$id_sach]);
        }
    }

    if(isset($_POST['plus'])){
        $id_sach = $_POST['id_sach'];
        $sql_sp = mysqli_query($conn,"select * from sach where id_sach = $id_sach limit 1;");
        $row =  mysqli_fetch_array($sql_sp);
        if($_SESSION['giohang'][$id_sach][4] < $row['soluong']){
            if(isset($_SESSION['giohang'][$id_sach])){
                $slnew = $_SESSION['giohang'][$id_sach][4] + 1;
                $_SESSION['giohang'][$id_sach][4] = $slnew;
            }
        } 
    }
    if(isset($_POST['minus'])){
        $id_sach = $_POST['id_sach'];
        $sql_sp = mysqli_query($conn,"select * from sach where id_sach = $id_sach limit 1;");
        $row =  mysqli_fetch_array($sql_sp);

        if($_POST['soluong'] != $_SESSION['giohang'][$id_sach][4]){
            if($_POST['soluong'] <= $row['soluong'] && $_POST['soluong'] > 0){    
                $_SESSION['giohang'][$id_sach][4] = $_POST['soluong'];
            }
            elseif($_POST['soluong'] > $row['soluong']){
                $_SESSION['giohang'][$id_sach][4] = $row['soluong'];
            }
        }
        else{
            if($_SESSION['giohang'][$id_sach][4] > 1){
                if(isset($_SESSION['giohang'][$id_sach])){
                    $slnew = $_SESSION['giohang'][$id_sach][4] - 1;
                    $_SESSION['giohang'][$id_sach][4] = $slnew;
                }
            } 
        }

    }
?>

<div id="main-cart">
    <div class="container">
        <div class="col-12">
            <h2 class="text-uppercase col my-4">Giỏ hàng</h2>
            <div>
                <div id="cart">
                    <div class="cart-thead row py-3 d-sm-flex" hidden>
                        <div style="width: 19%;" class="text-center">Sản phẩm</div>
                        <div style="width: 28%" class="text-center">Tên sách</div>
                        <div style="width: 17%" class="text-center">Đơn giá</div>
                        <div style="width: 18%" class="text-center">Số lượng</div>
                        <div style="width: 5%" class="text-center">Xóa</div>
                        <div style="width: 13%;" class="text-center">Thành tiền</div>
                    </div>
                    <?php

                    if(isset($_SESSION['giohang'])){
                        $i = 0;
                        $sum = 0;
                        $tamtinh = 0;
                        foreach ($_SESSION['giohang'] as $item) {
                            $tamtinh = (int)$item[4] * (int)$item[3];
                            $sum = $sum + $tamtinh;
                            echo '
                                <div class="cart-tbody row">
                                    <div style="width: 19%" class="image">
                                        <a href="./index.php?quanly=chitiet&id_sach='.$item[0].'">
                                            <img width="120" height="auto" src="./admincp/modules/quanlysanpham/upload/'.$item[2].'" alt="'.$item[2].'">
                                        </a>
                                    </div>
                                    <div style="width: 28%;">
                                        <span class="book-name">'.$item[1].'</span>
                                    </div>
                                    <div style="width: 17%" class="d-sm-flex" hidden>
                                        <span class="book-price">'.number_format ( $item[3], $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND</span>
                                    </div>
                                    <div style="width: 17%" class="d-sm-flex">
                                        <div class="row d-flex justify-content-center">
                                            <div class="buy-amount d-flex ms-2">
                                                <form action="" method ="post">
                                                    <input name="minus" type="submit" class="btn btn-light btn-minus" value="-">
                                                    <input class="text-center border border-light-subtle" type="text" name="soluong"
                                                        id="soluong" size="2" value="'.$item[4].'" "
                                                        style="height: 35px;">
                                                    <input type="hidden" name="id_sach" value="'.$item[0].'">    
                                                    <input name="plus" type="submit" class="btn btn-light btn-plus" value="+"> 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 5%" class="text-center">
                                        <i class="fas fa-remove" data-bs-toggle="modal" data-bs-target="#Modal-cart'.$item[0].'"></i>
                                    </div>
                                    <div style="width: 13%;" class="d-sm-flex" hidden>
                                        '.number_format ( $tamtinh , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND
                                    </div>
                                </div>
                            ';
                            
                            echo '
                                <div class="modal fade" id="Modal-cart'.$item[0].'" tabindex="-1" aria-labelledby="Modal-cartLabel'.$item[0].'"
                                aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="Modal-cartLabel'.$item[0].'">
                                                    <i class="fas fa-light fa-circle-exclamation"></i>
                                                    Thông báo
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="h3">Sản phẩm "'.$_SESSION['giohang'][$item[0]][1].'" sẽ bị xóa khỏi giỏ hàng</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="" method="post">
                                                    <input type="hidden" name="id_sach" value="'.$_SESSION['giohang'][$item[0]][0].'">
                                                    <button type="submit" name="xoasp" class="btn btn-primary">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                            $i++;
                        }
                        echo '
                        <form>
                            <div class="cart-tfooter row my-4">
                                <div class="text-end mb-4">
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="h4 me-4" style="margin-bottom: 0;margin-top: 7px;">
                                            Tổng tiền:
                                        </div>
                                        <div id="total-price" class="text-danger">
                                        '.number_format ( $sum , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND
                                        </div>
                                    </div>
                                    <a href="./index.php?quanly=thanhtoan" class="btn btn-danger btn-lg" type="submit">Thanh Toán</a>
                                </div>
                            </div>
                        </form>
                        ';
                    }
                    else{
                        echo '<h1 class="mb-5 text-center">Gio hang trong</h1>';
                    }
                    ?>       
                </div>
            </div>
        </div>
    </div>
</div>