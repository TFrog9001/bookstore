<?php 
    if(isset($_SESSION['giohang']) && !isset($_SESSION['id_user'])){
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Bạn cần đăng nhập để thực hiện thanh toán!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
    if((!isset($_SESSION['giohang']) || $_SESSION['giohang'] == []) && isset($_SESSION['id_user'])){
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Giỏ hàng của bạn đang trống!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
    if(isset($_POST['dathang'])){
        unset($_SESSION['giohang']);
    }
?>

<main role="main">
    <div class="container">
        <form method="post" action="">
            <div class="py-3 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ hàng</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php 
                            if(isset($_SESSION['giohang'])){
                                $tongtien=0;
                                foreach($_SESSION['giohang'] as $item){
                                    echo '
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">'.$item[1].'</h6>
                                            <small class="text-muted">'
                                            .number_format ( $item[3] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).
                                            ' x '.$item[4].'</small>
                                        </div>
                                        <span class="text-muted">'.number_format ( $item[3]*$item[4], $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND</span>
                                    </li>
                                    ';
                                    $tongtien += $item[3]*$item[4];
                                }
                            }
                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng thành tiền :</span>
                            <strong><?php if(isset($tongtien)){
                                echo number_format ( $tongtien, $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND';
                            }else{
                                echo '0 VND';
                            }
                            ?></strong>
                            <input type="hidden" name="tongtien" value="<?php echo $tongtien; ?>">
                        </li>
                    </ul>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Xác nhận</button>
                        </div>
                    </div>
                </div>
               <?php 
                    if(isset($_SESSION['giohang']) && !($_SESSION['giohang'] == [])  && isset($_SESSION['id_user'])){
                        $id_user = $_SESSION['id_user'];
                        $sql_user = mysqli_query($conn,"select * from user where id_user = $id_user");
                        $row = mysqli_fetch_assoc($sql_user);
                        if($row['tinhtrang'] == 0){
                            echo '
                            <div class="col-md-8 order-md-1">
                                <div class="alert alert-danger" role="alert">
                                    Bạn phải thanh toán các đơn hàng chưa thanh toán trước đó!
                                </div>
                            </div>
                            ';
                        }
                        else{
                            echo '
                            <div class="col-md-8 order-md-1">
                                <h4 class="mb-3">Thông tin khách hàng</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name">Họ tên</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="'.$row['name'].'" disabled>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="'.$row['email'].'" disabled>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="diachi">Địa chỉ</label>
                                        <input required type="text" class="form-control" name="diachi" id="diachi"
                                            placeholder="VD: 130 Xô Viết Nghệ Tỉnh">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="sdt">Điện thoại</label>
                                        <input required type="text" class="form-control" name="sdt" id="sdt"
                                            placeholder="VD: 0948330411">
                                    </div>
                                </div>
            
                                <h4 class="my-3">Hình thức thanh toán</h4>
            
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input checked id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required=""
                                            value="E-Banking">
                                        <label class="custom-control-label" for="httt-1">E-Banking</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required=""
                                            value="Chuyển khoản">
                                        <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required=""
                                            value="Ship COD">
                                        <label class="custom-control-label" for="httt-3">Ship COD</label>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <input class="btn btn-danger btn-lg btn-block mb-3" type="submit" name="dathang" value="Đặt hàng">
                            </div>
                            ';
                        }
                    }
               
               ?>
            </div>
        </form>

    </div>
</main>