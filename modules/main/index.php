<div id="main">
    <div class="container">
        <?php include("./modules/main/slides.php") ?>
        <!-- Sản phẩm -->
        <div class="container">
            <?php 
                $sql_dm = mysqli_query($conn, "select dm.id_dm, dm.ten_dm, dm.tinhtrang_dm 
                                                    from danhmucsach dm join sach s 
                                                                        on dm.id_dm = s.id_dm 
                                                    group by dm.id_dm, dm.ten_dm;");
                while($row_dm = mysqli_fetch_assoc($sql_dm)){
                    if($row_dm['tinhtrang_dm'] == 1){
                        echo '
                        <div class="sanpham" class="row border border-dark-subtle">
                            <div class="color-53a57f text-white py-2">
                                <h2 class="text-uppercase ms-3 mb-0">'.$row_dm['ten_dm'].'</h2>
                            </div>
                            <div class="product-list row pb-4">
                        ';
                        $id_dm = $row_dm['id_dm'];
                        $sql_sp = mysqli_query($conn,"select * from sach s join danhmucsach dm 
                                                    on s.id_dm = dm.id_dm having dm.id_dm = $id_dm;");
                        while($row = mysqli_fetch_assoc($sql_sp)){
                            if($row['tinhtrang'] == 1){
                                $gia = number_format ( $row['gia'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
                                if($row['giagiam'] != null){
                                    $giagiam = number_format ( $row['giagiam'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
                                }
                                else{
                                    $giagiam = $gia;
                                    $gia='';
                                }
                                echo '
                                        <div class="col-md-3 col-6">
                                            <div class="card my-2 text-center">
                                                <a href="./index.php?quanly=chitiet&id_sach='.$row['id_sach'].'">
                                                    <img class="img-fluid" src="./admincp/modules/quanlysanpham/upload/'.$row['hinhanh'].'" alt="'.$row['hinhanh'].'">
                                                </a>
                                                <div class="card-body">
                                                    <h5>'.$row['ten_sach'].'</h5>
                                                    <p class="card-text mb-0">'.$giagiam.'
                                                    </p>
                                                    
                                                    <p class="text-decoration-line-through" style="font-size: 13px!important;">
                                                        '.$gia.'
                                                    </p>
                                                    <a href="" class="btn btn-success">
                                                        <i class="fas fa-solid fa-cart-plus"></i>
                                                        Mua ngay
                                                    </a>
                                                </div>
                                            </div>
                                    </div>
                                ';
                            }        
                        }
                        echo '    
                            </div>
                        </div>
                        ';
                    }
                }
            ?>
            <!-- <div class="sanpham" class="row border border-dark-subtle">
                <h3 class="color-53a57f text-white py-2">SÁCH TIẾNG ANH CHO TRẺ EM</h3>
                <div class="product-list row pb-4">
                    <div class="col-md-3 col-6">
                        <div class="card my-2 text-center">
                            <a href="./index.php?quanly=chitiet&id_sach=12">
                                <img class="img-fluid" src="./images/book-img/book1.png" alt="">
                            </a>
                            <div class="card-body">
                                <h5>Book's Name</h5>
                                <p class="card-text">100.000vnd</p>
                                <a href="" class="btn btn-success">
                                    <i class="fas fa-solid fa-cart-plus"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>