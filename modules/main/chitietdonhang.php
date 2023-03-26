<div class="container">
    <div class="mt-3 px-2 border-none">
        <?php
            $i1 = $i2 = $i3 = $i4 = '';
            $sql_dh = mysqli_query($conn, "select * from cart c join user u on c.id_user = u.id_user where c.id_user = '$_SESSION[id_user]'");
            $row = mysqli_fetch_assoc($sql_dh);
            switch ($row['tinhtrang_cart']) {
                case '0':
                    $i1 = 'active';
                    break;
                case '1':
                    $i1 = $i2 ='active';
                    break;
                case '2':
                    $i1 = $i2 = $i3 = 'active';
                    break;
                case '3':
                    $i1 = $i2 = $i3 = $i4 = 'active';
                    break;
            }
        ?>
        <ul class="order-tracking">
            <li class="step <?=$i1?>">
                <div><i class="fas fa-user"></i></div>
                Đang chờ...
            </li>
            <li class="step <?=$i2?>">
                <div><i class="fas fa-bread-slice"></i></div>
                Đã xác nhận
            </li>
            <li class="step <?=$i3?>">
                <div><i class="fas fa-truck"></i></div>
                Đang giao hàng...
            </li>
            <li class="step <?=$i4?>">
                <div><i class="fas fa-regular fa-star"></i></div>
                Giao hàng thành công!
            </li>
        </ul>
    </div>
    <div class="donhang ">
        <div class="row">
            <div class="offset-1 col-md-10 order-md-2 mb-4">
                <h5 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted text-uppercase">Mã đơn hàng: 1679748728id14</span>
                </h5>
                <ul class="list-group mb-3">
                    <?php
                    $sql_cd = mysqli_query($conn, "select * from cart_detail cd join sach s on cd.id_sach = s.id_sach where id_cart = '$_GET[id_order]'");
                    if (mysqli_num_rows($sql_cd) > 0) {
                        $tongtien = 0;
                        while ($row_cd = mysqli_fetch_assoc($sql_cd)) {
                            echo '
                                <li class="list-group-item d-flex justify-content-between">
                                    <img width="100" height="75" src="./admincp/modules/quanlysanpham/upload/' . $row_cd['hinhanh'] . '" alt="' . $row_cd['hinhanh'] . '">
                                    <div  class="mt-3">
                                        <h6 class="my-0">' . $row_cd['ten_sach'] . '</h6>
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
                    }
                    ?>
                    <br class="my-3">

                    <li class="list-group-item d-flex justify-content-between">
                        <table>
                            <tr>
                                <td>
                                    <span class="me-3">Người nhận :</span>
                                </td>
                                <td>
                                    <?= $row['name'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="me-3">SĐT :</span>
                                </td>
                                <td>
                                    <?= $row['sdt'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="me-3">Địa chỉ :</span>
                                </td>
                                <td>
                                    <?= $row['diachi'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="me-3">Hình thức thanh toán :</span>
                                </td>
                                <td>
                                    <?= $row['thanhtoan'] ?>
                                </td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td>
                                    <span class="me-2">Tiền mua hàng :</span>
                                </td>
                                <td>
                                    <strong class="">
                                        <?php
                                        echo number_format($tongtien, $decimals = 0, $dec_point = ".", $thousands_sep = ",");
                                        ?> VND
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="me-2">Phí vận chuyển :</span>
                                </td>
                                <td>
                                    <strong class="">
                                        30,0000 VND
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="me-2">Tổng thành tiền :</span>
                                </td>
                                <td>
                                    <strong class="text-danger">
                                        <?php if (isset($tongtien)) {
                                            echo number_format($tongtien + 30000, $decimals = 0, $dec_point = ".", $thousands_sep = ",") . ' VND';
                                        } else {
                                            echo '0 VND';
                                        }
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>