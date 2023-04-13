<div class="container">
    <h2 class="text-uppercase col my-4">Đơn hàng của tôi</h2>
    <?php
        $sql_dh = mysqli_query($conn,"select * from cart where id_user = '$_GET[id_order]'");
        if(mysqli_num_rows($sql_dh)>0){
            while($row = $sql_dh->fetch_all(PDO::FETCH_ASSOC)){
                    if($row['tinhtrang_cart'] == 0){
                        $tinhtrang = '<p class="pt-3 text-danger">Đang chờ...</p>';
                    }
                    elseif($row['tinhtrang_cart'] == 1){
                        $tinhtrang = '<p class="pt-3 text-primary">Đã xác nhận</p>';
                    }
                    elseif($row['tinhtrang_cart'] == 2){
                        $tinhtrang = '<p class="pt-3 text-info">Đang giao hàng...</p>';
                    }
                    else{
                        $tinhtrang = '<p class="pt-3 text-success">Hoàn thành!</p>';
                    }
                    $item_dh = '';
                    $sql_cd = mysqli_query($conn,"select * from cart_detail cd join sach s on cd.id_sach = s.id_sach where id_cart = '$row[id_cart]'");
                    $tongtien = 0;
                    while($row_cd = $sql_cd->fetch_all(PDO::FETCH_ASSOC)) {
                        $item_dh = $item_dh.'
                        <li class="list-group-item d-flex justify-content-between">
                            <img width="100" height="auto" src="./admincp/modules/quanlysanpham/upload/'.$row_cd['hinhanh'].'" alt="'.$row_cd['hinhanh'].'">
                            <div  class="mt-3">
                                <h6 class="my-0">' .$row_cd['ten_sach']. '</h6>
                                <small class="text-muted">'
                                    . number_format($row_cd['giaban'], $decimals = 0, $dec_point = ".", $thousands_sep = ",") .
                                    ' x ' . $row_cd['soluong_dh'] . '
                                </small>
                            </div>
                            <span class="text-muted mt-3">' . number_format ($row_cd['giaban'] * $row_cd['soluong_dh'], $decimals = 0, $dec_point = ".", $thousands_sep = ",") . ' VND</span>
                        </li>
                        ';
                        $tongtien += $row_cd['giaban'] * $row_cd['soluong_dh'];
                    }
                
                echo '
                <div class="row">
                    <a href="./index.php?quanly=chitiet_dh&id_order='.$row['id_cart'].'" class="text-decoration-none">
                        <div class="col-md-7 order-md-2 mb-4">
                            <h5 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted text-uppercase">Mã đơn hàng: '.$row['id_cart'].'</span>
                                '.$tinhtrang.'
                            </h5>
                            <ul class="list-group mb-3">'
                                .$item_dh.'        
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Tổng thành tiền :</span>
                                    <strong>
                                    ' . number_format($tongtien, $decimals = 0, $dec_point = ".", $thousands_sep = ",") . ' VND
                                    </strong>
                                    <input type="hidden" name="tongtien" value="">
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                ';
                echo '<hr class="mt-5 mb-3">';
            }    
        }
    ?>
</div>