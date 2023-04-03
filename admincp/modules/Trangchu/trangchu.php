<?php 
  $tongtien = 0;

  $sqldh = mysqli_query($conn,"select * from cart where tinhtrang_cart=3;");
  $num_dhht = mysqli_num_rows($sqldh);

  $sqldh = mysqli_query($conn,"select * from cart where tinhtrang_cart=2;");
  $num_dhdvc = mysqli_num_rows($sqldh);

  $sqldh = mysqli_query($conn,"select * from cart where tinhtrang_cart=0;");
  $num_dhdc = mysqli_num_rows($sqldh);
  
  $sqlkh = mysqli_query($conn,"select * from user where tinhtrang=1;");
  $num_kh = mysqli_num_rows($sqlkh);


  if(isset($_GET['year'])){
    $year = $_GET['year'];
    $doanhthuthang = array();

    for ($i=1; $i <=12 ; $i++){
        $tmp=0;
        $sql = mysqli_query($conn,"select * from cart where month(date) = $i and year(date) = $year and tinhtrang_cart = 3;");
        while($row = mysqli_fetch_assoc($sql)){
            $tmp += $row['tongtien'];
        }
        $doanhthuthang[] = $tmp;
        $tongtien += $tmp;
    }
    $doanhthuthang = json_encode($doanhthuthang);
  }
?>

<div class="container">
    <div class="row my-3">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget ">
                <div class="row ms-1">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <i class="fas fa-regular fa-bag-shopping icon_db"></i>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?=$num_dhht?></div>
                        <div class="text-muted">Đơn hoàn thành</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row ms-1">
                    <div class="col-sm-3 col-lg-4 widget-left">
                        <i class="fas fa-solid fa-check icon_db"></i>
                    </div>
                    <div class="col-sm-9 col-lg-8 widget-right">
                        <div class="large"><?=$num_dhdvc?></div>
                        <div class="text-muted">Đơn đang chuyển</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-red panel-widget">
                <div class="row mx-2">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <i class="fas fa-duotone fa-spinner icon_db"></i>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?=$num_dhdc?></div>
                        <div class="text-muted">Đơn đang chờ</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row ms-1">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <i class="fas fa-solid fa-user icon_db"></i>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?=$num_kh?></div>
                        <div class="text-muted">Khách hàng</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thống kê doanh thu</div>
                <div class="panel-body">
                    <div class="col-lg-12" style="margin-bottom: 40px">
                        <form method="post" action="./admin.php?action=trangchu">
                            <label>Năm: </label>
                            <select onchange="this.form.submit()" class="form-control" name="year" id="year"
                                style="display: inline-block;max-width: 200px;padding: 5px">
                                <option value='0'>--Chọn năm--</option>
                                <?php
                                for ($i = 2018; $i <= 2035; $i++) {
                                    $selected = ($i == $year) ? 'selected' : '';
                                    echo "
                                            <option value='" . $i . "' " . $selected . ">" . $i . "</option>
                                        ";
                                }
                                ?>
                            </select>
                            <label style="margin-left: 20px">Tổng doanh thu: </label>
                            <span>
                                <?php echo number_format($tongtien); ?> VNĐ
                            </span>
                        </form>

                    </div>
                    <div class="canvas-wrapper mb-5">
                        <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>