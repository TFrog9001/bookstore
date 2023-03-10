<?php

if (isset($_GET['id_dm']) && $_GET['id_dm'] != '') {
    $id_dm = $_GET['id_dm'];
    $sql_sp = mysqli_query($conn, "select * from sach s join danhmucsach dm on s.id_dm = dm.id_dm where s.id_dm = $id_dm");
    $sql_dm = mysqli_query($conn, "select * from danhmucsach where id_dm = $id_dm");
    $row_dm = mysqli_fetch_array($sql_dm);
}

?>
<div id="main-product">
    <div class="container">
        <div id="main-breadcrumb" class="border border-light-subtle px-4 my-3 pt-2" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-capitalize"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">
                    <?php echo $row_dm['ten_dm'] ?>
                </li>
            </ol>
        </div>
        <!-- San pham -->
        <div class="sanpham" class="row border border-dark-subtle">
            <div class="color-53a57f text-white py-2">
                <h4 class="text-uppercase ms-3 mb-0">Thanh chúc năng đang phát triển</h4>
            </div>
            <?php 
                if(mysqli_num_rows($sql_sp) > 0){
                    echo '<div class="product-list row pb-4">';
                    while($row_sp = mysqli_fetch_assoc($sql_sp)){
                        $gia = number_format ( $row_sp['gia'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
                        if($row_sp['giagiam'] != 0){
                            $giagiam = number_format ( $row_sp['giagiam'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
                        }
                        else{
                            $giagiam = $gia;
                            $gia='';
                        }
                        echo '
                            <div class="col-md-3 col-6">
                                <div class="card my-2 text-center">
                                    <a href="./index.php?quanly=chitiet&id_sach='.$row_sp['id_sach'].'">
                                        <img class="img-fluid" src="./admincp/modules/quanlysanpham/upload/'.$row_sp['hinhanh'].'" alt="'.$row_sp['hinhanh'].'">
                                    </a>
                                    <div class="card-body">
                                        <h5>'.$row_sp['ten_sach'].'</h5>
                                        <p class="card-text mb-0">'.$giagiam.'
                                        </p>
                                        
                                        <p class="text-decoration-line-through" style="font-size: 13px!important;">
                                            '.$gia.'
                                        </p>
                                        
                                        <form action="./index.php" method="post">
                                            <input type="hidden" name="id_sach" value="'.$row_sp['id_sach'].'">
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
                    echo '</div>';
                }
                else{
                    echo '
                        <div style="height: 200px;">
                            <h3 class="ms-2 my-3 fw-light">Không có sản phẩm nào</h3>
                        </div>
                    ';
                }

            ?>
        </div>
    </div>
</div>