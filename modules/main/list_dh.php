<div class="container">
    <h2 class="text-uppercase col my-4">Đơn hàng của tôi</h2>
    <?php
        $sql_dh = mysqli_query($conn,"select * from cart where id_user = '$_SESSION[id_user]'");
        if(mysqli_num_rows($sql_dh)>0){
            while($row = mysqli_fetch_assoc($sql_dh)){
                    $item_dh = '';
                    $sql_cd = mysqli_query($conn,"select * from cart_detail cd join sach s on cd.id_sach = s.id_sach where id_cart = '$row[id_cart]'");
                    $tongtien = 0;
                    while($row_cd = mysqli_fetch_assoc($sql_cd)) {
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
                            <span class="text-muted mt-3">' . number_format($row_cd['giaban'] * $row_cd['soluong_dh'], $decimals = 0, $dec_point = ".", $thousands_sep = ",") . ' VND</span>
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
                                <p class="pt-3 h5 text-danger">Đang chờ...</p>
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
            }    
        }
    ?>
    <!-- nueyn mau -->
    <!-- <div class="row">
        <a href="./index.php?quanly=chitiet_dh&id_order='.$row['id_cart'].'" class="text-decoration-none">
            <div class="col-md-7 order-md-2 mb-4">
                <h5 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted text-uppercase">Mã đơn hàng: '.$row['id_cart'].'</span>
                    <p class="pt-3 h5 text-danger">Đang chờ...</p>
                </h5>
                <ul class="list-group mb-3">
                    <?php
                    $sql_cd = mysqli_query($conn,"select * from cart_detail where id_cart = '$row[id_cart]'");
                    if (isset($_SESSION['giohang'])) {
                        $tongtien = 0;
                        while($row_cd = mysqli_fetch_assoc($sql_cd)){
                            echo '
                            <li class="list-group-item d-flex justify-content-between">
                                <img width="100" height="auto" src="./admincp/modules/quanlysanpham/upload/'.$item[2].'" alt="'.$item[2].'">
                                <div  class="mt-3">
                                    <h6 class="my-0">' . $item[1] . '</h6>
                                    <small class="text-muted">'
                                        . number_format($item[3], $decimals = 0, $dec_point = ".", $thousands_sep = ",") .
                                        ' x ' . $item[4] . '
                                    </small>
                                </div>
                                <span class="text-muted mt-3">' . number_format($item[3] * $item[4], $decimals = 0, $dec_point = ".", $thousands_sep = ",") . ' VND</span>
                            </li>
                            ';
                            $tongtien += $item[3] * $item[4];
                        }
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng thành tiền :</span>
                        <strong>
                            <?php if (isset($tongtien)) {
                                echo number_format($tongtien, $decimals = 0, $dec_point = ".", $thousands_sep = ",") . ' VND';
                            } else {
                                echo '0 VND';
                            }
                            ?>
                        </strong>
                        <input type="hidden" name="tongtien" value="<?php echo $tongtien; ?>">
                    </li>
                </ul>
            </div>
        </a>
    </div> -->
</div>