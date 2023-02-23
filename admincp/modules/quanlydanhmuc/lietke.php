<div id="main-cart">
    <div class="container">
        <div class="col-12">
            <h3 class="text-uppercase my-4">Danh sách danh mục</h3>
            <div>
                <div class="cart">
                    <div class="cart-thead row mb-0 py-3 bg-success">
                        <div style="width: 5%;" class="text-center text-white">ID</div>
                        <div style="width: 28%" class="text-center text-white">Tên Danh Mục</div>
                        <div style="width: 17%" class="text-center text-white">Tình Trạng</div>
                        <div style="width: 10%" class="text-center text-white">Xóa</div>
                        <div style="width: 13%;" class="text-center text-white">Chỉnh Sửa</div>
                    </div>
                    <?php
                    $i = 1;
                    $sql_dm = mysqli_query($conn, "select * from danhmucsach order by id_dm");
                    if (mysqli_num_rows($sql_dm) > 0) {
                        while ($row = mysqli_fetch_assoc($sql_dm)) {
                            if ($i % 2 == 0) {
                                echo '
                                    <div class="cart-tbody row mb-0 color-dbe3eb">
                                        <div style="width: 5%" class="ID_DM">
                                            ' . $row['id_dm'] . '
                                        </div>
                                        <div style="width: 28%;">
                                            <span class="tendanhmuc text-capitalize">' . $row['ten_dm'] . '</span>
                                        </div>
                                    ';

                                if ($row['tinhtrang'] == 1) {
                                    echo '
                                        <div style="width: 17%">
                                            <span class="tinhtrang">Kích hoạt</span>
                                        </div>
                                        ';
                                } else {
                                    echo '
                                        <div style="width: 17%">
                                            <span class="tinhtrang">Vô hiệu hóa</span>
                                        </div>
                                        ';
                                }
                                echo '
                                        <div style="width: 10%" class="text-center">
                                            <i class="fa fa-remove" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id_dm'] . '"></i>
                                        </div>
                                        <div style="width: 13%;">
                                            <a href="./admin.php?action=edit_dm" class="text-dark">
                                                <i class="fas fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>    
                                    </div>
                                    ';
                                echo '
                                    <!-- Modal-xoa -->
                                    <div class="modal fade" id="exampleModal' . $row['id_dm'] . '" tabindex="-1" aria-labelledby="exampleModalLabel' . $row['id_dm'] . '"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel' . $row['id_dm'] . '">
                                                        <i class="fas fa-light fa-circle-exclamation"></i>
                                                        Thông báo
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="h3">Danh mục ' . $row['ten_dm'] . ' sẽ bị xóa khỏi dữ liệu</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <a href="./modules/quanlydanhmuc/xuly.php?action=xoa_dm&id=' . $row['id_dm'] . '">
                                                        <button type="button" class="btn btn-primary">Xóa</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                            } else {
                                echo '
                                    <div class="cart-tbody row mb-0 ">
                                        <div style="width: 5%" class="ID_DM">
                                            ' . $row['id_dm'] . '
                                        </div>
                                        <div style="width: 28%;">
                                            <span class="tendanhmuc text-capitalize">' . $row['ten_dm'] . '</span>
                                        </div>
                                    ';

                                if ($row['tinhtrang'] == 1) {
                                    echo '
                                        <div style="width: 17%">
                                            <span class="tinhtrang">Kích hoạt</span>
                                        </div>
                                        ';
                                } else {
                                    echo '
                                        <div style="width: 17%">
                                            <span class="tinhtrang">Vô hiệu hóa</span>
                                        </div>
                                        ';
                                }
                                echo '
                                        <div style="width: 10%" class="text-center">
                                            <i class="fa fa-remove" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id_dm'] . '"></i>
                                        </div>
                                        <div style="width: 13%;">
                                            <a href="./admin.php?action=edit_dm" class="text-dark">
                                                <i class="fas fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>    
                                    </div>
                                    ';
                                echo '
                                <!-- Modal-xoa -->
                                <div class="modal fade" id="exampleModal' . $row['id_dm'] . '" tabindex="-1" aria-labelledby="exampleModalLabel' . $row['id_dm'] . '"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel' . $row['id_dm'] . '">
                                                    <i class="fas fa-light fa-circle-exclamation"></i>
                                                    Thông báo
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="h3">Danh mục ' . $row['ten_dm'] . ' sẽ bị xóa khỏi dữ liệu</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <a href="./modules/quanlydanhmuc/xuly.php?action=xoa_dm&id=' . $row['id_dm'] . '">
                                                    <button type="button" class="btn btn-primary">Xóa</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                            $i++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>