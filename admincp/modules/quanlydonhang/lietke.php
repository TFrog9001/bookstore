<div id="main-user">
    <div class="container">
        <div class="col-12">
            <div class="row my-2">
                <div class="col-10">
                    <h3 class="text-uppercase my-3">Danh sách đơn hàng</h3>
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
                    <th>Xóa</th>
                </thead>
                <tbody>
                    <?php 
                        if(isset($_GET['id_user']) && $_GET['id_user'] > 0){
                            $sql_cart = mysqli_query($conn,"select * from cart c join user u on c.id_user=u.id_user where u.id_user = $_GET[id_user]");
                        }
                        else{
                            $sql_cart = mysqli_query($conn,"select * from cart c join user u on c.id_user=u.id_user");
                        }
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
                                elseif($row['tinhtrang_cart'] == 3){
                                    $tinhtrang = '<p class="pt-3 text-success">Đã giao hàng</p>';
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
                                        <p class="text-truncate" style="width: 140px">'.$row['diachi'].'</>
                                    </td>
                                    <td>
                                        '.number_format( $row['tongtien'], $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND
                                    </td>
                                    <td>
                                        '.$tinhtrang.'
                                    </td>
                                    <td>
                                        <a href="./admin.php?action=chitiet&id_cart=' . $row['id_cart'] . '" class="text-dark">     
                                            <i class="fas fa-solid fa-clipboard-list"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <i class="fas fa-remove" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal' . $row['id_cart'] . '"></i>
                                    </td>
                                </tr>
                                ';
                                $modal = $modal . '
                                <!-- Modal-xoa '.$i.'-->
                                <div class="modal fade" id="exampleModal' . $row['id_cart'] . '" tabindex="-1"
                                    aria-labelledby="exampleModalLabel' . $row['id_cart'] . '" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel' . $row['id_cart'] . '">
                                                    <i class="fas fa-light fa-circle-exclamation"></i>
                                                    Thông báo
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="h3">
                                                    Đơn hàng này của
                                                    <strong class="text-capitalize text-decoration-underline"> ' . $row['name'] . '
                                                    </strong>
                                                    sẽ bị xóa khỏi dữ liệu
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="./modules/quanlydonhang/xuly.php" method="post">
                                                    <input value="' . $row['id_cart'] . '" name="id_cart" hidden>
                                                    <button type="submit" name="xoa_dh" class="btn btn-primary">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';  
                                $i++;    
                            }
                        }
                    ?>  
                </tbody>
            </table>
            <?php 
                echo $modal;
            ?>
        </div>
    </div>
</div>