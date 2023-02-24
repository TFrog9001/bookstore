<div id="main-cart">
    <div class="container">
        <div class="col-12">
            <div class="row my-2"> 
                <div class="col-10">
                    <h3 class="text-uppercase my-4">Danh sách danh mục</h3>
                </div>
                <div class="col-2">
                    <a href="./admin.php?action=them_dm"> 
                        <button class="btn btn-success mt-4 text-truncate" >
                            <i class="fas fa-solid fa-plus"></i>
                            Thêm danh mục
                        </button>
                    </a>
                </div>
            </div>
            <div>
                <div class="cart">
                    <div class="cart-thead row mb-0 py-3 bg-success">
                        <div class="col-1 text-center text-white">ID</div>
                        <div class="col-3 text-center text-white">Tên Danh Mục</div>
                        <div class="col-2 text-center text-white">Tình Trạng</div>
                        <div class="col-1 text-center text-white">Xóa</div>
                        <div class="col-4 text-white">Chỉnh Sửa</div>
                    </div>
                    <?php
                    $i = 1;
                    $sql_dm = mysqli_query($conn, "select * from danhmucsach order by id_dm");
                    if (mysqli_num_rows($sql_dm) > 0) {
                        while ($row = mysqli_fetch_assoc($sql_dm)) {
                            if ($i % 2 == 0) {
                                echo '
                                    <div class="cart-tbody row mb-0 color-dbe3eb">
                                        <div class="ID_DM col-1">
                                            ' . $row['id_dm'] . '
                                        </div>
                                        <div class="col-3">
                                            <span class="tendanhmuc text-capitalize">' . $row['ten_dm'] . '</span>
                                        </div>
                                    ';

                                if ($row['tinhtrang'] == 1) {
                                    echo '
                                        <div class="col-2">
                                            <span class="tinhtrang">Kích hoạt</span>
                                        </div>
                                        ';
                                } else {
                                    echo '
                                        <div class="col-2">
                                            <span class="tinhtrang">Vô hiệu hóa</span>
                                        </div>
                                        ';
                                }
                                echo '
                                        <div class="text-center col-1">
                                            <i class="fa fa-remove" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id_dm'] . '"></i>
                                        </div>
                                        <div class="col-1">
                                            <a href="./admin.php?action=edit_dm&id=' . $row['id_dm'] . '" class="text-dark">
                                                <i class="fas fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </div>    
                                    </div>
                                    ';
                                echo '
                                    <!-- Modal-xoa 2-->
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
                                                    <form action="./modules/quanlydanhmuc/xuly.php?id=' . $row['id_dm'] . '" method="post">
                                                        <button type="submit" name="xoa_dm" class="btn btn-primary">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                            } else {
                                echo '
                                    <div class="cart-tbody row mb-0 ">
                                        <div class="ID_DM col-1">
                                            ' . $row['id_dm'] . '
                                        </div>
                                        <div class="col-3">
                                            <span class="tendanhmuc text-capitalize">' . $row['ten_dm'] . '</span>
                                        </div>
                                    ';

                                if ($row['tinhtrang'] == 1) {
                                    echo '
                                        <div class="col-2">
                                            <span class="tinhtrang">Kích hoạt</span>
                                        </div>
                                        ';
                                } else {
                                    echo '
                                        <div class="col-2">
                                            <span class="tinhtrang">Vô hiệu hóa</span>
                                        </div>
                                        ';
                                }
                                echo '
                                        <div class="text-center col-1">
                                            <i class="fa fa-remove" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id_dm'] . '"></i>
                                        </div>
                                        <div class="col-1">
                                            <a href="./admin.php?action=edit_dm&id=' . $row['id_dm'] . '" class="text-dark">
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
                                                <form action="./modules/quanlydanhmuc/xuly.php?id=' . $row['id_dm'] . '" method="post">
                                                    <button type="submit" name="xoa_dm" class="btn btn-primary">Xóa</button>
                                                </form>
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