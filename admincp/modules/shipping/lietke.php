<div id="main-user">
    <div class="container">
        <div class="col-12">
            <div class="row my-2">
                <div class="col-10">
                    <h3 class="text-uppercase my-3">Danh sách đơn hàng ship</h3>
                </div>
            </div>
            <div class="row mb-4">
                <form class="col-5" role="search" method="post" enctype="multipart/form-data">
                    <div class="input-group d-flex flex-row">
                        <input required class="form-control" type="search" placeholder="Tìm đơn hàng"
                            aria-label="Search" name="keyword">
                        <input name="search_book" class="btn btn-success input-group-text" type="submit" value="Tìm">
                    </div>
                </form>
            </div>

            <table id="tbl-user" class="container mb-5">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Họ tên</th>
                    <th>Ngày đặt</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Tổng đơn</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </thead>
                <tbody>
                    <?php 
                        $sql_cart = mysqli_query($conn,"select * from cart c join user u on c.id_user=u.id_user where tinhtrang_cart = '1' or tinhtrang_cart = '2'");
                        $i = 1;
                        $modal='';
                        if (mysqli_num_rows($sql_cart) > 0) {
                            while ($row = mysqli_fetch_assoc($sql_cart)) {

                                if ($i % 2 == 0) {
                                    $color = ' color-dbe3eb ';
                                }
                                else {
                                    $color = '';     
                                }

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
                                echo '
                                <tr class="'.$color.'">
                                    <td class="text-capitalize">
                                        '.$row['id_cart'].'
                                    </td>
                                    <td class="text-capitalize">
                                        '.$row['name'].'
                                    </td>
                                    <td >
                                        '.$row['date'].'
                                    </td>
                                    <td>
                                        '.$row['sdt'].'
                                    </td>
                                    <td>
                                        <p class="text-truncate mt-3" style="width: 140px">'.$row['diachi'].'</>
                                    </td>
                                    <td>
                                        '.number_format( $row['tongtien'], $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND
                                    </td>
                                    <td>
                                        '.$tinhtrang.'
                                    </td>
                                    <td>
                                        <a href="./admin.php?action=chitiet_ship&id_cart=' . $row['id_cart'] . '" class="text-dark">     
                                            <i class="fas fa-solid fa-clipboard-list"></i>
                                        </a>
                                    </td>
                                </tr>
                                '; 
                                $i++;    
                            }
                        }
                    ?>  
                </tbody>
            </table>
        </div>
    </div>
</div>