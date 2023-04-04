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
                                <a class="nav-link" href="./index.php?quanly=danhmuc&id_dm='.$row_dm['id_dm'].'&page=1">
                                    <h2 class="text-uppercase ms-3 mb-0">'.$row_dm['ten_dm'].'</h2>
                                </a>
                            </div>
                            <div class="product-list row pb-4">
                        ';
                        $id_dm = $row_dm['id_dm'];
                        $sql_sp = mysqli_query($conn,"select * from sach s join danhmucsach dm 
                                                        on s.id_dm = dm.id_dm 
                                                        where dm.id_dm = $id_dm and s.tinhtrang=1 limit 8;");
                        while($row = mysqli_fetch_assoc($sql_sp)){
                            
                            $gia = number_format ( $row['gia'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
                            if($row['giagiam'] != 0){
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
                                                <img  class="img-fluid mt-2" src="./admincp/modules/quanlysanpham/upload/'.$row['hinhanh'].'" alt="'.$row['hinhanh'].'">
                                            </a>
                                            <div class="card-body">
                                                <h5>'.$row['ten_sach'].'</h5>
                                                <p class="card-text mb-0">'.$giagiam.'
                                                </p>
                                                
                                                <p class="text-decoration-line-through" style="font-size: 13px!important;">
                                                    '.$gia.'
                                                </p>
                    
                                                <form action="./index.php" method="post">
                                                    <input type="hidden" name="id_sach" value="'.$row['id_sach'].'">
                                                    <button type="submit" name="muangay" class="btn btn-success">
                                                        <i class="fas fa-solid fa-cart-plus"></i>
                                                        Mua ngay
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            ';
                                    
                        }
                        echo '    
                            </div>
                        </div>
                        ';
                    }
                }
                $sql_o = mysqli_query($conn,"select * from sach where id_dm is null and tinhtrang=1 limit 8;");
                echo '
                    <div class="sanpham" class="row border border-dark-subtle">
                        <div class="color-53a57f text-white py-2">
                            <a class="nav-link" href="./index.php?quanly=danhmuc&id_dm=other&page=1">  
                                <h2 class="text-uppercase ms-3 mb-0">Thể loại khác</h2>
                            </a>
                        </div>
                        <div class="product-list row pb-4">
                ';
                while($row_o = mysqli_fetch_assoc($sql_o)){
                            
                    $gia = number_format ( $row_o['gia'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
                    if($row_o['giagiam'] != 0){
                        $giagiam = number_format ( $row_o['giagiam'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
                    }
                    else{
                        $giagiam = $gia;
                        $gia='';
                    }
                    echo '
                            <div class="col-md-3 col-6">
                                <div class="card my-2 text-center">
                                    <a href="./index.php?quanly=chitiet&id_sach='.$row_o['id_sach'].'">
                                        <img  class="img-fluid mt-2" src="./admincp/modules/quanlysanpham/upload/'.$row_o['hinhanh'].'" alt="'.$row_o['hinhanh'].'">
                                    </a>
                                    <div class="card-body">
                                        <h5>'.$row_o['ten_sach'].'</h5>
                                        <p class="card-text mb-0">'.$giagiam.'
                                        </p>
                                        
                                        <p class="text-decoration-line-through" style="font-size: 13px!important;">
                                            '.$gia.'
                                        </p>
            
                                        <form action="./index.php" method="post">
                                            <input type="hidden" name="id_sach" value="'.$row_o['id_sach'].'">
                                            <button type="submit" name="muangay" class="btn btn-success">
                                                <i class="fas fa-solid fa-cart-plus"></i>
                                                Mua ngay
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';
                }        
                echo '    
                        </div>
                    </div>
                ';

                // echo '
                //     <div class="sanpham" class="row border border-dark-subtle">
                //         <div class="color-53a57f text-white py-2">
                //             <h2 class="text-uppercase ms-3 mb-0">Thể loại khác</h2>
                //         </div>
                //         <div class="product-list row pb-4">
                //         <div class="col-md-3 col-6">
                //             <div class="card my-2 text-center">
                //                 <a href="./index.php?quanly=chitiet&id_sach=12">
                //                     <img class="img-fluid" src="./images/book-img/book1.png" alt="">
                //                 </a>
                //                 <div class="card-body">
                //                     <h5>Book\'s Name</h5>
                //                     <p class="card-text">100.000vnd</p>
                //                     <a href="" class="btn btn-success">
                //                         <i class="fas fa-solid fa-cart-plus"></i>
                //                         Mua ngay
                //                     </a>
                //                 </div>
                //             </div>
                //         </div>
                //     </div>
                // ';
            ?>
        </div>
    </div>
</div>